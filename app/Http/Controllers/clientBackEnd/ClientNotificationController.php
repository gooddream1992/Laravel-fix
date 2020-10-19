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
    $notifications = DB::table('notification')
                    ->join('users','notification.user_id','users.id')
                    ->where('notification.user_id',$user_id)
                    ->get();
		return view('client.notifications',compact('notifications'));
    }
}