<?php 
namespace App\Http\Controllers\escortBackEnd;

use Auth;
use DB;
use App\EscortDropdown;
use App\ServiceOffer;
use App\ServiceOfferAssign;
use App\Feed;
use App\Follow;
use App\User;
use App\City;
use App\Country;
use App\ProfileDescription; 
use App\ProfileAvailability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EscortNotificationController extends Controller {
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
    public function index()
    {
		$user_id = (Auth::user())->id;
    $notifications = DB::table('notification')->where('user_id',$user_id)->get();
    $notification_count = count($notifications);
		return view('frontend/escort_dashboard/new.notification.notifications',compact('notifications'));
    }

    public function data()
    {
		$user_id = (Auth::user())->id;
    $notifications = DB::table('notification')->where('user_id',$user_id)->get();
    $notification_count = count($notifications);
		echo $notification_count;
    }
    
    public function friendRequestData()
    {
      // $frequest = DB::table('follows')
      // ->join('users','users.id','follows.custId')
      // ->select('*','follows.id as follow_id')
      // ->where('escortId', Auth::user()->id)
      // ->where('status', 1)
      // ->get();
      $follows = DB::table('friend_list')
				->join('users','users.id','friend_list.cust_id')
				->select('*','friend_list.id as follow_id')
				->where('escortId', Auth::user()->id)
				->where('status', '0')
				->get();
      $frequest_count = count($follows);
      echo $frequest_count;
    }

}