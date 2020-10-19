<?php
namespace App\Http\Controllers;

use App\BecomeEscort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\User;
use App\Mail\SendMail;
use Auth;
use DB;

class FrontEndController extends Controller
{

    public function exploreCities()
    {
        $countries = \App\Country::all();
        return view('frontend.pages.exploreCities', ['countries' => $countries]);
    }
    public function exploreState(Request $request)
    {
        $state_id = $request->state_id;
        $statecount = \App\State::all()->where('country_id', $request->country);
        $html = '';

        $html .= "<option value=''>Select State</option>";

        foreach ($statecount as $value)
        {

            $html .= "<option value='" . $value->id . "' ";
            $html .= $value->id == $state_id ? 'selected' : '';
            $html .= '>' . $value->state;
            $html .= "</option>";

        }
        return $html;
    }
    public function exploreCity(Request $request){
        $city = $request->city;
        $citycount=\App\City::all()->where('state_id', $request->state);
        $html = '';
            $html .= "<option value=''>Select City</option>";
         
        foreach($citycount as $value){
            $html .= "<option value='".$value->id."' ";
            $html .= $value->id == $city ? 'selected': ''; 
            $html .= '>'.$value->city;
            $html .= "</option>";
        }
        return $html;
    }

    public function businessEtiquete()
    {
        $business_etiquetes = DB::table('business_etiquetes')->select()->get();
        return view('frontend.pages.businessEtiquete',['business_etiquetes'=>$business_etiquetes]);
    }

    public function ourStory()
    {

        return view('frontend.pages.ourStory');
    }
    public function termsCondition()
    {
        $terms = DB::table('terms')->select()->get();
        return view('frontend.pages.termsCondition',['terms'=>$terms]);
    }

    public function privacystatement(){
        $privacy_statement = DB::table('privacy_statement')->select()->get();
     return view('frontend.pages.privacystatement',['privacy_statement'=>$privacy_statement]);   
    }

    public function copyright(){
        $copyright = DB::table('copy')->select()->get();
     return view('frontend.pages.copyright',['copyright'=>$copyright]);   
    }

    public function acceptable(){
        $acceptable = DB::table('acceptable')->select()->get();
     return view('frontend.pages.acceptable',['acceptable'=>$acceptable]);   
    }

    

    public function disclaimer(){
        $disclaimer = DB::table('disclaimer')->select()->get();
        return view('frontend.pages.disclaimer',['disclaimer'=>$disclaimer]);   
    }

    public function faq()
    {

        return view('frontend.pages.faq');
    }
    public function clientMembership()
    {

        return view('frontend.pages.clientMembership');
    }

    public function clientLogin()
    {

        return view('frontend.pages.clientLogin');
    }
    public function forgotpassword(){
        return view('frontend.pages.clientforgotpwd');
    }
    public function forgotpasswordsentemail(Request $request){
        $email = $request->email;
        $users = DB::table('users')->where('email','=',$email)->select('id','name','email','roleStatus')->get();
        $users[0]->id;
        $data = array(
                'name' => $users[0]->name,
                'email' => $users[0]->email,
                'usersId' => $users[0]->id,
                'role'=>$users[0]->roleStatus
            );
            Mail::send('clientforgotpassword', $data, function ($message) use ($data)
            {
                $message->to($data['email'], 'Honey Luxe')->subject('Reset Password');
                $message->from('ashishp@alakmalak.com', 'Honey Luxe');
            });
            return redirect('/')
                ->with('message', "We have sent an email with a link to your email address for Forgot Password. In order to Reset Your Password.");
    }

    public function resetpasswordbyemail($id,$name){
        return view('frontend.pages.newpassword',['id'=>$id,'name'=>$name]);
    }

    public function storenewpassword(Request $request){
        $id = $request->id;
        $name = $request->name;
        $password = Hash::make($request->password);

        $validatedData = $request->validate([
                'password' => 'required',
                'cpassword' => 'required | same:password'
        ],
        [
            'password.required'=>"* Please Enter Your Password",
            'cpassword.required'=>"* Please Enter Your Confirm Password",
            'cpassword.same'=>"Password And Confirm Password Doesn't Match"
        ]);
        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['password' => $password]);
        return redirect('/')->with('message', "Your Password is Reset.");
    }

    public function clientSignup()
    {

        return view('frontend.pages.clientSignup');
    }
    public function escortLogin()
    {

        return view('frontend.pages.escortLogin');
    }
    public function escortSignup()
    {

        return view('frontend.pages.escortSignup');
    }

    public function profile($id)
    {
        //echo Auth::user()->id;
        $escorts= \App\User::all()->where('id', $id);
        $feedsimages= \App\Feed::orderBy('id','desc')->where('status', 0)->limit(1)->get();
        $feedsvideotext= \App\Feed::orderBy('id','desc')->where('status', 2)->limit(1)->get();
        $feedstext= \App\Feed::orderBy('id','desc')->where('status', 1)->limit(1)->get();
        $pfsliders= \App\ProfileImage::all()->where('escortId', $id)->where('status', 1); 
        $feed_data= DB::table('feeds')->where([['escortId', $id],['status', 1]])->get(); 
        $friend_data = array();
        if(isset(Auth::user()->id)){
            $friend_data= DB::table('friend_list')
                ->where([
                    ['escortId', $id],
                    ['cust_id', Auth::user()->id]
                ])
                ->get(); 

        }
        $pfsliders1= \App\ProfileImage::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first(); 
        $profile_favourites = \App\ProfileFavourite::where('escortId', $id)->first(); // SMPEDIT 15-10-2020
        $wish_lists = \App\ProfileWishlist::where('escortId', $id)->get(); // SMPEDIT 15-10-2020
        $data = array(
            'escorts'=>$escorts,
            'id'=>$id,
            'feedsimages'=>$feedsimages,
            'feed_data'=>$feed_data,
            'feedsvideotext'=>$feedsvideotext,
            'feedstext'=>$feedstext,
            'pfsliders'=>$pfsliders,
            'friends_data'=>$friend_data,
            'pfsliders1'=>$pfsliders1,
            'profile_favourites' => $profile_favourites ? explode(',', $profile_favourites->tags) : [], // SMPEDIT 15-10-2020
            'wish_lists' => $wish_lists // SMPEDIT 15-10-2020
        );
        return view('frontend.pages.profile', $data);
    }

    public function SendFriendRequest($id)
    {
        DB::table('friend_list')->insert([
            'escortId'=>$id,
            'cust_id'=>Auth::user()->id
        ]);
        return redirect()->action('FrontEndController@profile',$id);
    }
    
    public function frontBecomeEscort()
    {
        $total_stauses = BecomeEscort::max('status');
        for ($i = 1; $i <= $total_stauses; $i++) {
            $section[$i] = BecomeEscort::where('status', $i)->first();
        }

        return view('frontend.provider.frontBecomeEscort', compact('section'));
    }

    public function frontBlog()
    {

        return view('frontend.provider.frontBlog');
    }

    public function frontBlogDetails($id)
    {

        return view('frontend.provider.frontBlogDetails', compact('id'));
    }

    public function frontLocalResources()
    {
        $resources2 =\App\LocalResource::all()->where('status', 2);
        $escorts =\App\User::all()->where('roleStatus', 2);
        $health = DB::table('local_resorces_data')->where('section','=','healthcare')->select('*')->get();
        $legal = DB::table('local_resorces_data')->where('section','=','Legal Advice')->select('*')->get();
        $photographers = DB::table('local_resorces_data')->where('section','=','Photographers')->select('*')->get();
        return view('frontend.provider.frontLocalResources',['resources2'=>$resources2,'escorts'=>$escorts,'health'=>$health,'legal'=>$legal,'photographers'=>$photographers]);
    }

    public function frontPurchaseMarketing()
    {
        $data = DB::table('purchasemarketingData')->select('*')->get();
        /*foreach ($data as $key => $value) {
            echo $value->id."<br>";
            echo "<br>";
            echo $out = strlen($value->description) > 450 ? substr($value->description,0,450)."..." : $value->description;

        }
        exit;*/
        return view('frontend.provider.frontPurchaseMarketing',['data'=>$data]);
    }
    public function readmore_purchase($id){
        $data = DB::table('purchasemarketingData')->where('id','=',$id)->select('*')->get();
     return view('frontend.provider.readmore_purchase',['data'=>$data]);   
    }

    public function frontSexTrafficking()
    {

        return view('frontend.provider.frontSexTrafficking');
    }

    public function multiPage()
    {

        return view('frontend.provider.multiPage');
    }

    public function clientEscoertSignupStore(Request $request) {

        $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'cpassword' => 'required | same:password'
        ],
        [
            'name.required'=>"* Please Enter Your Name",
            'email.required'=>"* Please Enter Your Email",
            'email'=>"Please Enter Valid Email",
            'password.required'=>"* Please Enter Your Password",
            'cpassword.required'=>"* Please Enter Your Confirm Password",
            'cpassword.same'=>"Password And Confirm Password Doesn't Match"
        ]);
        
        $emailcount = User::all()->where('email', $request->email);

        if ($emailcount->count() < 1)
        {
            $oldemail = "none";
        }
        else
        {
            $oldemails = User::orderBy('id', 'desc')->where('email', $request->email)
                ->first();
            $oldemail = $oldemails->email;
        }

        if ($oldemail == $request->email)
        {
            return back()
                ->with('error', 'Ohps! This Email is already Exist!');
        }
        else
        {
            $users = new User();
            $users->name = $request->name;
            $users->activation = 0;
            $users->gender = 1;
            $users->phone = 0;
            $users->email = $request->email;
            $users->roleStatus = $request->roleStatus;

            //$users->password=bcrypt($request->password);
            $users->password = Hash::make($request->password);

            $users->save();
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'usersId' => $users->id,
                'role'=>$request->roleStatus
            );
            Mail::send('mail', $data, function ($message) use ($data)
            {
                $message->to($data['email'], 'Honey Luxe')->subject('Confirm Registration');
                $message->from('ashishp@alakmalak.com', 'Honey Luxe');
            });
            /*return back()->with("message",);*/
            return redirect()
                ->back()
                ->with('message', "We have sent an email with a confirmation link to your email address. In order to complete the sign-up process.");
        }
    }

    public function confirmation($id, $name)
    {
        $affected = DB::table('users')->where('id', $id)->update(['activation' => 1]);  
        return redirect('client/login')
            ->with('status', $name . ' Your Activation is Done Successfully');
    }

    public function countryListEscort($country)
    {
        $countries=\App\Country::all();
        $data = array('countries'=>$countries,'country'=>$country,'country_id'=>$country);
        return view('frontend.pages.countryListEscort', $data);
    }

    public function statelist(Request $request){
        $country = $request->country;
        $statecount=\App\State::all()->where('country_id', $country);
        /*echo "<pre>";
        print_r($statecount);
        exit;*/
        $html = '';     
        $html .= "<option value=''>Select State</option>";

        foreach($statecount as $value){
            
            $html .= "<option value='".$value->id."' ";
            $html .= '>'.$value->state;
            $html .= "</option>";
            
        }
        return $html;
    }

    public function citylist(Request $request){
        $state = $request->state;
        $citycount=\App\City::all()->where('state_id', $state);
        $html = '';
        $html .= "<option value=''>Select City</option>";
     
        foreach($citycount as $value){
            $html .= "<option value='".$value->id."' ";
            $html .= '>'.$value->city;
            $html .= "</option>";
        }
        return $html;
    }

    public function countryCityListEscort(Request $request)
    {

        $country = $request->country_id;
        $city = $request->state_id;
        return view('frontend.pages.countryCityListEscort', compact('country', 'city'));
    }

    // SMPEDIT 30-09-2020
    public function filterSearchEscort(Request $request)
    {
        // dd($request->all());
        $gender = $request->gender;
        $keyword = $request->keyword;
        $city_id = $request->city_id;
        $country_id = $request->country_id;
        $service_type = $request->service_type;
        $with_reviews = $request->with_reviews;
        $available_now = $request->available_now;
        $touring_escorts = $request->touring_escorts;
        $couples_service = $request->couples_service;
        
        return view('frontend.pages.filterSearchEscort', 
            compact(
                'gender', 
                'keyword',
                'city_id', 
                'country_id', 
                'service_type',
                'with_reviews', 
                'available_now', 
                'couples_service', 
                'touring_escorts', 
            )
        );
    }  
    // SMPEDIT 30-09-2020 END

    public function advanceSearchEscort(Request $request)
    {

        $country = $request->country_id;
        $city = $request->state_id;
        $suburb = $request->city_id;
        $gender = $request->gender;
        return view('frontend.pages.advanceSearchEscort', compact('country', 'city', 'suburb', 'gender'));
    }

    public function searchCityEscort(Request $request)
    {
        $city = $request->city_id;
        $tab_value = $request->tab_value;
        $city_id = DB::table('cities')->where('city','=',$city)->select('id')->get()[0];

        $data = DB::table('local_resorces_data')->where([
            ['suburb','=',$city_id->id],
            ['section','=',$tab_value]
        ])->select('*')->get();
        return $data;
    }
    public function searchMultiPageBlog(Request $request)
    {

      $country=$request->country_id;
      $city=$request->city_id;
      $gender=$request->gender;

    return view('frontend.provider.searchMultiPageBlog', compact('country', 'city', 'gender'));
    }

    public function cronjob(){
        $users = DB::table('users')->where('id','=',84)->whereDate('timer', '>=', Carbon::now())->get();
        echo "hello";
    }

}

