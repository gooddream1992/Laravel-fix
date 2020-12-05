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

class AvailableNowController extends Controller {
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

    public function index(){
      $city = Auth::user()->state;
      $user = DB::table('users')
      ->leftjoin('profile_images', 'users.id', '=', 'profile_images.escortId')
      ->where([
        ['activation','=',1],
        ['request','=',1],
        ['roleStatus','=',2],
        ['state','=',$city],
        ['profile_images.status', 5],
      ])
      ->select('users.id as id','users.name as name','users.gender as gender','users.interested_in_male as interested_in_male','users.interested_in_female as interested_in_female','users.interested_in_trans as interested_in_trans','users.interested_in_gay as interested_in_gay','profile_images.image as photo')
      ->get();
      // echo "<pre>";
      // print_r($user);
      // foreach ($user as $key => $value) {
        
      //   if(($value->gender == Auth::user()->interested_in_male && Auth::user()->interested_in_male != 0) || ($value->gender == Auth::user()->interested_in_female && Auth::user()->interested_in_female != 0) || ($value->gender == Auth::user()->interested_in_trans && Auth::user()->interested_in_trans != 0) || ($value->gender == Auth::user()->interested_in_gay && Auth::user()->interested_in_gay != 0)) {
      //     echo $value->id."<br>";

      //   }
      // }
      // exit;
      return view('client.availableNow.index',['user'=>$user]);
    }

}