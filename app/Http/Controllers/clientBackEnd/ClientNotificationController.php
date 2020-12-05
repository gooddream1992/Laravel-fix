<?php 
namespace App\Http\Controllers\clientBackEnd;

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

class ClientNotificationController extends Controller {
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
    
      $user_id = (Auth::user())->id;
      $data = DB::table('follows')->where([['custId',$user_id],['status','1']])->get();
      $id_arr = array();
      $notifications = array();
      if(count($data)>0)
      {
        foreach ($data as $follow_details) 
        {
          $id_arr[] = $follow_details->escortId;
        }
        $notifications = DB::table('notification')
          ->join('users','notification.user_id','users.id')
          ->select('*','notification.id as notification_id')
          ->whereNull('notification.type')
          ->whereIn('notification.user_id',$id_arr)
          ->orderBy('notification.created_on','desc')
          ->get();
          
          foreach($notifications as $value){
            if($value->is_readed=='0')
            {
              // echo $value->notification_id."<br>";
              DB::table('notification')->where('id','=',$value->notification_id)->update(['is_readed'=>'1']);
            }
          }
      }
		return view('client.notifications',compact('notifications'));
    }

    public function data()
    {
      $user_id = (Auth::user())->id;
      $data = DB::table('follows')->where([['custId',$user_id],['status','1']])->get();
      $id_arr = array();
      $notifications = array();
      if(count($data)>0)
      {
        foreach ($data as $follow_details) 
        {
          $id_arr[] = $follow_details->escortId;
        }
        $notifications = DB::table('notification')->join('users','notification.user_id','users.id')->whereNull('notification.type')->where('notification.is_readed','0')->whereIn('notification.user_id',$id_arr)->orderBy('notification.created_on','desc')->get();
      }
      $notification_count = count($notifications);
      echo $notification_count;
    }
}