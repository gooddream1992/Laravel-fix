<?php 
namespace App\Http\Controllers\clientBackEnd;

  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;  
  use\App\SexTrafficking;
  use\App\LocalResource;
  use\App\PurchaseMarketing;
  use\App\BecomeEscort;
  use\App\Blog;
  use DB;

class LocationGetController extends Controller {
    /**
     * Create a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }    
    /**
     * Escort Profile Index
     * 
     * @return  \Illuminate\Http\Response
     */
    public function city(Request $request){
      $country = $request->country;
      $city_id = $request->city_id;
      $city = DB::table('states')->where('country_id','=',$country)->select('*')->get();
      $html = '<option>Select City</option>';
      foreach ($city as $cityValue) {
        $html .= '<option value="'.$cityValue->id.'"';
        $html .= $cityValue->id == $city_id ? 'selected': ''; 
        $html .= '>'.$cityValue->state.'</option>';
      }
      return $html;
    }

    public function suburb(Request $request){
      $city = $request->city;
      $suburb_id = $request->suburb_id;
      $suburb = DB::table('cities')->where('state_id','=',$city)->select('*')->get();
      $html = '<option>Select Suburb</option>';
      foreach ($suburb as $suburbValue) {
        $html .= '<option value="'.$suburbValue->id.'"';
        $html .= $suburbValue->id == $suburb_id ? 'selected': ''; 
        $html .= '>'.$suburbValue->city.'</option>';
      }
      return $html; 
    }
}