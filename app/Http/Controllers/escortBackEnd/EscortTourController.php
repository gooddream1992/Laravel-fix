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
       $city = DB::table('cities')->select('*')->get();
       $profile_tours = DB::table('profile_tours')->where('escortId','=',$user_role)->select('*')->get();
       /*echo "<pre>";
       print_r($profile_tours[0]->startDate);
       exit;*/
       $data = array('city'=>$city,'profile_tours'=>$profile_tours);
       return view('frontend/escort_dashboard/new.tour.index',$data);
    }

    public function store(Request $request) {
      /*echo "<pre>";
      print_r($request->all());
      exit;*/
      $validatedData = $request->validate([
        'domestic_city' => 'required',
        'domestic_from' => 'required',
        'domestic_to' => 'required',
        'domestic_description' => 'required',
      ],[
        'domestic_description.required'=> "* Please Fill Required Fields",
        'domestic_city.required'=> "* Please Fill Required Fields",
      ]);
      $domestic_city['domestic_city'] = $request->domestic_city;
      $domestic_from['domestic_from'] = $request->domestic_from;
      $domestic_description = $request->domestic_description;
      $status = $request->status;
      $user  = Auth::user()->id;
      $insert_arr = array();
      foreach ($request->domestic_city as $master_key => $desctination_val) 
      {
        $insert_arr[] = array('domestic_city'=>$request->domestic_city[$master_key],'domestic_from'=>$request->domestic_from[$master_key],'domestic_to'=>$request->domestic_to[$master_key],'domestic_booked_two'=>@$request->domestic_booked_two[$master_key]);
      }
      foreach ($insert_arr as $insert_val) 
      {
        /*echo "City  == ".$insert_val['domestic_city']."<br>";
        echo "From == ".$insert_val['domestic_from']."<br>";
        echo "To == ".$insert_val['domestic_to']."<br>";
        echo "booked == ".$insert_val['domestic_booked_two']."<br>";*/
        DB::table('profile_tours')->insert([
          'city'=>$insert_val['domestic_city'],
          'startDate'=>$insert_val['domestic_from'],
          'endDate' =>$insert_val['domestic_to'],
          'booked' =>$insert_val['domestic_booked_two'],
          'description' => $domestic_description,
          'escortId' =>$user,
          'status'=>$status
        ]);
      }
      return redirect()->route('escort.tour')->with('message','Tour Add Successfully');
    }

    public function delete($id){
      DB::table('profile_tours')->where('id','=',$id)->delete();
      return redirect()->route('escort.tour')->with('message','Tour Deleted Successfully');
    }
}