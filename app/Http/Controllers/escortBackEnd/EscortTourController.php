<?php 
namespace App\Http\Controllers\escortBackEnd;
use Auth;
use App\Feed;
use App\User;
use App\City;
use App\Follow;
use App\Country;
use App\ProfileRate;
use App\ServiceOffer;
use App\ProfileImage;
use App\EscortDropdown;
use App\ProfileWishlist;
use App\ProfileFavourite;
use App\ServiceOfferAssign;
use App\ProfileDescription; 
use App\ProfileAvailability;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;

class EscortTourController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
       $user_role = Auth::user()->id;

       $city = DB::table('states')->where('country_id','=',Auth::user()->country)->select('*')->get();

       $countries = DB::table('countries')->select()->get();

       $profile_tours = DB::table('profile_tours')->where('escortId','=',$user_role)->select('*')->get();

       $dom_profile_tours = DB::table('profile_tours')->where('escortId','=',$user_role)->where('status','=','1')->select('*')->get();

       $int_profile_tours = DB::table('profile_tours')->where('escortId','=',$user_role)->where('status','=','2')->select('*')->get();
       
       $international_city = DB::table('states')->select('*')->get();

       $data = array('city'=>$city,'profile_tours'=>$profile_tours,'countries'=>$countries,"dom_profile_tours"=>$dom_profile_tours,"int_profile_tours"=>$int_profile_tours,'international_city'=>$international_city);
       return view('frontend.escort_dashboard.new.tour.index',$data);
    }

    public function store(Request $request) {

      $validatedData = $request->validate([
        'domestic_city' => 'required',
        'domestic_from' => 'required',
        'domestic_to' => 'required',
      ],[
        'domestic_city.required'=> "* Please Fill Required Fields",
      ]);
      $domestic_city['domestic_city'] = $request->domestic_city;
      $domestic_from['domestic_from'] = $request->domestic_from;
      $domestic_description = $request->domestic_description;
      $domestic_country['domestic_country'] = $request->domestic_country;
      $status = $request->status;
      $user  = Auth::user()->id;
      $insert_arr = array();
      $country = Auth::user()->country;
      foreach ($request->domestic_city as $master_key => $desctination_val) {
        $insert_arr[] = array(
            'domestic_city'=>$request->domestic_city[$master_key],
            'domestic_from'=>$request->domestic_from[$master_key],
            'domestic_to'=>$request->domestic_to[$master_key],
            // 'domestic_booked_two'=>@$request->domestic_booked_two[$master_key],
            'domestic_booked_two' => isset($request->domestic_booked_two[$master_key]) ? $request->domestic_booked_two[$master_key] : NULL,
            'domestic_country'=>isset($request->domestic_country[$master_key]) && $request->domestic_country[$master_key]!='' ? $request->domestic_country[$master_key] : $country
        );
      }
      
      foreach ($insert_arr as $insert_val) {
        
        DB::table('profile_tours')->insert([
          'city'=>$insert_val['domestic_city'],
          'startDate'=>$insert_val['domestic_from'],
          'endDate' =>$insert_val['domestic_to'],
          'booked' =>$insert_val['domestic_booked_two'],
          'description' => $domestic_description,
          'country' => $insert_val['domestic_country'],
          'escortId' =>$user,
          'status'=>$status
        ]);
      }
      DB::table('notification')->insert([
          'notification_title'=>Auth::user()->name." added a tour.",
          'url'=> "profile/".$user,
          'notification_content'=>Auth::user()->name." added a tour.",
          'user_id'=>$user
      ]);
      return redirect()->route('escort.tour')->with('message','Tour Add Successfully');
    }

    public function delete($id){
      DB::table('profile_tours')->where('id','=',$id)->delete();
      return redirect()->route('escort.tour')->with('message','Tour Deleted Successfully');
    }

    public function update(Request $request,$id){
      $domestic_country = !empty($request->domestic_country) ? $request->domestic_country : '';
      $domestic_city =  $request->domestic_city;
      $domestic_from =  $request->domestic_from;
      $domestic_to =  $request->domestic_to;
      $domestic_booked =  $request->domestic_booked;
      if(!empty($domestic_country)){
        DB::table('profile_tours')->where('id','=',$id)->update([
          'city'=>$domestic_city,
          'startDate'=>$domestic_from,
          'endDate'=>$domestic_to,
          'booked'=>$domestic_booked,
          'country'=>$domestic_country
        ]);  
      }else{
        DB::table('profile_tours')->where('id','=',$id)->update([
          'city'=>$domestic_city,
          'startDate'=>$domestic_from,
          'endDate'=>$domestic_to,
          'booked'=>$domestic_booked,
          
        ]);  
      }
      
      
     return redirect()->route('escort.tour')->with('message','Tour Updated Successfully');

    }
}