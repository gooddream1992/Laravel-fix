<?php
namespace App\Http\Controllers\adminBackEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\EscortDropdown;
use App\ServiceOffer;
use App\ServiceOfferAssign;
use App\Feed;
use DB;
use Carbon\Carbon;


class EscortDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profileSettings($id)
    {
        $countries=\App\Country::all();
        return view('frontend.escort_dashboard.profileSettings',['id'=>$id,'countries'=>$countries]);
    }

    public function profileCountry(Request $request){
        $state_id = $request->state_id;
        $states = DB::table('states')->where('country_id','=',$request->country)->select()->get();
        $html = '<option>Select Home Location</option>';
        foreach ($states as $value) {
            $html .= "<option value='" . $value->id . "' ";
            $html .= $value->id == $state_id ? 'selected' : '';
            $html .= '>' . $value->state;
            $html .= "</option>";
        }
        return $html;
    }
    public function profileSuburb(Request $request){
        $state = $request->state;
        if(empty($state)){
            $html = "Please Select Home Location";
        }else{
            $req = $_POST['query'];
            $cities = DB::table('cities')
            ->select('id','city')
            ->where([
                ['city','like',"%".$req."%"],
                ['state_id','=',$state]
            ])
            ->get();
            $data_res=array();
            foreach ($cities as $city) {
                $data_res[]=array('value'=>$city->city,'id'=>$city->id);
            }
            if(count($data_res)){
                return $data_res;
            }else{
                return ['value'=>'No Patient Found','id'=>''];
            }
        }
    }

    public function escortactivationajax(Request $request){
        $profile_id = $request->profile_id;
        $switchStatus = $request->switchStatus;
        $todayDT = $request->todayDT;
        DB::table('users')
                ->where('id', $profile_id)
                ->update(
                    ['timerStatus' => $switchStatus,'timer'=>$todayDT]
                );
    }

    public function deactivationajax(Request $request){
        echo $current = Carbon::now();
        $users = DB::table('users')->where([
            ['roleStatus','=',2],
            ['timer','!=',"0000-00-00 00:00:00"],
            ['timer', '<=', $current]
        ])->select()->get();
        //DB::table('users')->where([['id','=',84],['timer', '<=', $current],])->select()->get();
        foreach ($users as $value) {
            echo "<br>DB  ".$value->id."<br>";
        }
    }
    public function profileAvailability()
    {
        $users = Auth::user();
        $profile_availabilities = DB::table('profile_availabilities')
            ->join('users', 'profile_availabilities.escortId', '=', 'users.id')
            ->where('profile_availabilities.escortId','=',$users->id)
            ->select('users.id as userid','users.name as name','profile_availabilities.weekday as weekday','profile_availabilities.id as id','profile_availabilities.fromDate as fromDate','profile_availabilities.untilDate as untilDate')
            ->get();
        return view('frontend.escort_dashboard.profileAvailability',['profile_availabilities'=>$profile_availabilities]);
    }

    public function profileBlog()
    {

        return view('frontend.escort_dashboard.profileBlog');
    }

    public function profileDescription()
    {
        $users = Auth::user();
        $profile_descriptions = DB::table('profile_descriptions')
            ->join('users', 'profile_descriptions.escortId', '=', 'users.id')
            ->where('profile_descriptions.escortId','=',$users->id)
            ->select('users.id as userid','users.name as name','profile_descriptions.status as status','profile_descriptions.id as id','profile_descriptions.description as description')
            ->get();
            /*echo "<pre>";
            print_r($profile_descriptions);
            exit;*/
        return view('frontend.escort_dashboard.profileDescription',['profile_descriptions'=>$profile_descriptions]);
    }

    public function profileImage()
    {
        $users = Auth::user();
        $profile_images = DB::table('profile_images')
            ->join('users', 'profile_images.escortId', '=', 'users.id')
            ->where('profile_images.escortId','=',$users->id)
            ->select('users.id as userid','users.name as name','profile_images.status as slider','profile_images.id as id','profile_images.image as image','profile_images.url as url')
            ->get();

            $gallery = DB::table('profile_images')
            ->join('users','profile_images.escortId','users.id')
            ->where([['status','=',2],['escortId',Auth::user()->id]])
            ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
            ->get();
        return view('frontend.escort_dashboard.profileImage',['profile_images'=>$profile_images,'gallery'=>$gallery]);
    }

    public function profilegalleryview($id){
        $gallery = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',2],
            ['profile_images.escortId',Auth::user()->id],
            ['profile_images.id','=',$id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.galleryEdit',['gallery'=>$gallery]);
    }

    public function addgallery(){
        $gallery = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['status','=',2],
            ['escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        $users = DB::table('users')->where('id','=',Auth::user()->id)->select()->get();
        return view('frontend.escort_dashboard.addgallery',['gallery'=>$gallery,'users'=>$users]);
    }

     public function slider(){
        $slider = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',1],
            ['profile_images.escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.sliderview',['slider'=>$slider]);
    }

    public function slideredit($id){
        $slider = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',1],
            ['profile_images.escortId',Auth::user()->id],
            ['profile_images.id','=',$id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.sliderEdit',['slider'=>$slider]);
    }

    public function addsilder(){
         $slider = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['status','=',2],
            ['escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        $users = DB::table('users')->where('id','=',Auth::user()->id)->select()->get();
        return view('frontend.escort_dashboard.addsilder',['slider'=>$slider,'users'=>$users]);
    }

    public function videoView(){
         $video = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',3],
            ['profile_images.escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.videoView',['video'=>$video]);
    }

    public function videoedit($id){
        $video = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',3],
            ['profile_images.escortId',Auth::user()->id],
            ['profile_images.id','=',$id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.videoEdit',['video'=>$video]);
    }

    public function addvideo(){
        $video = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['status','=',2],
            ['escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        $users = DB::table('users')->where('id','=',Auth::user()->id)->select()->get();
        return view('frontend.escort_dashboard.addvideo',['video'=>$video,'users'=>$users]);
    }

    public function selfieview(){
        $selfie = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',4],
            ['profile_images.escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.selfieView',['selfie'=>$selfie]);
    }

    public function selfieEdit($id){
         $selfie = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['profile_images.status','=',4],
            ['profile_images.escortId',Auth::user()->id],
            ['profile_images.id','=',$id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        return view('frontend.escort_dashboard.selfieEdit',['selfie'=>$selfie]);
    }
    public function addselfie(){
         $addselfie = DB::table('profile_images')
        ->join('users','profile_images.escortId','users.id')
        ->where([
            ['status','=',4],
            ['escortId',Auth::user()->id]
        ])
        ->select('profile_images.id as id','profile_images.status as status','profile_images.image as image','profile_images.url as url','profile_images.escortId as escortId','users.name as escortname')
        ->get();
        $users = DB::table('users')->where('id','=',Auth::user()->id)->select()->get();
        return view('frontend.escort_dashboard.addselfie',['addselfie'=>$addselfie,'users'=>$users]);
    }

    public function profileListLine()
    {
        $users = Auth::user();
        $profile_lists = DB::table('profile_lists')
            ->join('users', 'profile_lists.escortId', '=', 'users.id')
            ->where('profile_lists.escortId','=',$users->id)
            ->select('users.id as userid','users.name as name','profile_lists.status as status','profile_lists.id as id','profile_lists.description as description')
            ->get();
        return view('frontend.escort_dashboard.profileListLine',['profile_lists'=>$profile_lists]);
    }

    public function profileRates()
    {
        $users = Auth::user();
        $profile_rates = DB::table('profile_rates')
            ->join('users', 'profile_rates.escortId', '=', 'users.id')
            ->where('profile_rates.escortId','=',$users->id)
            ->select('users.id as userid','users.name as name','profile_rates.status as status','profile_rates.time as time','profile_rates.price as price','profile_rates.description as description','profile_rates.id as id')
            ->get();
            /*echo "<pre>";
            print_r($profile_rates);
            exit;*/
        return view('frontend.escort_dashboard.profileRates',['profile_rates'=>$profile_rates]);
    }

    public function profileTour()
    {

        return view('frontend.escort_dashboard.profileTour');
    }

    public function escortBlog()
    {

        return view('frontend.escort_dashboard.escortBlog');
    }
    public function escortFeeds()
    {

        return view('frontend.escort_dashboard.escortFeeds');
    }

    public function hoursAvailable()
    {

        return view('frontend.escort_dashboard.3hoursAvailable');
    }
    public function escortUpdates()
    {

        return view('frontend.escort_dashboard.escortUpdates');
    }

    public function escortServiceLocation($id){
        $countries=\App\Country::all();
        $users= Auth::user();
        $service_location = DB::table('service_location')
        ->join('cities','service_location.city_id','cities.id')
        ->where('escort_id','=',$users->id)
        ->select('service_location.*','cities.city as city')->get();
        return view('frontend.escort_dashboard.escortServiceLocation',['countries'=>$countries,'users'=>$users,'service_location'=>$service_location]);
    }

    public function escortServiceLocationadd(Request $request){
        $escort_id = $request->usersId;
        $country = $request->country;
        $city = $request->city;
        $suburb = $request->suburb;
        $suburb_arr = explode(',',$suburb);
        foreach ($suburb_arr as $key => $value) {
            $cities = DB::table('cities')->where('city','=',$value)->select()->get();
            foreach ($cities as $key => $value) {
                DB::table('service_location')->insert([
                    'escort_id'=>$escort_id,
                    'country_id'=>$country,
                    'state_id'=>$city,
                    'city_id'=>$value->id
                ]);
            }
        }
        return redirect()->back()->with('message', Auth::user()->name.' Your Service Location Has Been Added');
    }

    public function escortServiceOfferAdd($id){
        $services=\App\ServiceOffer::all();
        $services_update= DB::table('service_offer_assigns')->where('escortId','=',$id)->select('*')->get();
        return view('frontend.escort_dashboard.escortServiceOfferAdd',['id'=>$id,'services'=>$services,'services_update'=>$services_update]);
    }
}

