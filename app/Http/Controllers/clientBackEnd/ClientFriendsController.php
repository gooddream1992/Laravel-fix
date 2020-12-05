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

class ClientFriendsController extends Controller {
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
		$follows = DB::table('friend_list')
					->join('users','users.id','friend_list.escortId')
					->where('cust_id', Auth::user()->id)
					->where('status', '1')
					->get();
		return view('client.friendlist',compact('follows'));
	}
	
	public function unfriend()
	{
		$user_id = $_POST['current_user_id'];
		$escort_id = $_POST['escort_id'];
		$affected = DB::table('friend_list')
              ->where('escortId', $escort_id)
              ->where('cust_id', $user_id)
			  ->delete();
		// $affected = DB::table('follows')
    //           ->where('escortId', $escort_id)
    //           ->where('custId', $user_id)
		// 	  ->update(['status' => '0']);
		DB::table('notification')->insert([
			'notification_title'=>"You lost a follower.",
			'url'=> "profile/".$user_id,
			'type'=> "escort",
			'notification_content'=>Auth::user()->name." unfollowed you.",
			'client_id'=>$user_id,
			'user_id'=>$escort_id
	]);
		echo json_encode($affected);exit;
	}

	public function newProfiles()
	{	
		$current_date = date("Y-m-d");
		$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($current_date)));
		$from = $days_ago;
		$to = $current_date;

		$or_where_conds = array();
		if(Auth::user()->interested_in_male == '1')
		{
			$or_where_conds[] = Auth::user()->interested_in_male;
		}
		if(Auth::user()->interested_in_female == '2')
		{
			$or_where_conds[] = Auth::user()->interested_in_female;
		}
		if(Auth::user()->interested_in_trans == '3')
		{
			$or_where_conds[] = Auth::user()->interested_in_trans;
		}
		if(Auth::user()->interested_in_gay == '4')
		{
			$or_where_conds[] = Auth::user()->interested_in_gay;
		}
		// echo Auth::user()->id;
		// echo "<pre>";
		// print_r($or_where_conds);
		// exit;
		// DB::enableQueryLog();
		$new_profiles = DB::table('users')
						->select('id','name','photo','created_at')
						->whereBetween(
							'created_at',
							[
								$from.' 00:00:00',
								$to.' 23:59:59'
							]
						)
						->where([
							['roleStatus','2'],
							['state',Auth::user()->state],
							['request','1']
						])
						->whereIn('gender',$or_where_conds)
						->orderBy('created_at','desc')
						->get();
		// dd(DB::getQueryLog());
		return view('client.newprofiles',compact('new_profiles'));
	}

	public function newEscortTours() {

		$getTours= DB::table('profile_tours')
		->select('escortId','startDate','endDate','city')
		->where('city',Auth::user()->state)
		->where('endDate','>=',date('Y-m-d'))
		->get();
		$tourEscort = array();
		if(count($getTours) > 0)
		{
			foreach ($getTours as $tour_details) 
			{
				$tourEscort[] = $tour_details->escortId;
			}
		}
		$or_where_conds = array();
		if(Auth::user()->interested_in_male == '1') {

			$or_where_conds[] = Auth::user()->interested_in_male;

		}
		if(Auth::user()->interested_in_female == '2') {

			$or_where_conds[] = Auth::user()->interested_in_female;

		}
		if(Auth::user()->interested_in_trans == '3') { 

			$or_where_conds[] = Auth::user()->interested_in_trans;

		}
		if(Auth::user()->interested_in_gay == '4') {

			$or_where_conds[] = Auth::user()->interested_in_gay;

		}

		$new_profiles = DB::table('users')
						->select('id','name','photo','created_at')
						->whereIn('id',$tourEscort)
						->whereIn('gender',$or_where_conds)
						->orderBy('created_at','desc')
						->get();
		return view('client.tour_escort',compact('new_profiles'));
	}
}