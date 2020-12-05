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

class EscortFriendsController extends Controller {
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
					->join('users','users.id','friend_list.cust_id')
					->where('escortId', Auth::user()->id)
					->where('status', '1')
					->get();
		return view('frontend/escort_dashboard/new.friendlist.friendlist',compact('follows'));
	}
	public function friendRequest()
	{
	$follows = DB::table('friend_list')
				->join('users','users.id','friend_list.cust_id')
				->select('*','friend_list.id as follow_id')
				->where('escortId', Auth::user()->id)
				->where('status', '0')
				->get();
	return view('frontend/escort_dashboard/new.friendlist.friendrequestlist',compact('follows'));
}

	public function myProfiles()
	{
	$my_profiles = DB::table('users')
				->where('parent_id', Auth::user()->id)
				->get();
	return view('frontend/escort_dashboard/new.other_profiles.profiles',compact('my_profiles'));
}



	public function changeRequestStatus()
	{
		$id = $_POST['request_id'];
		$status = $_POST['status'];
		$affected = DB::table('friend_list')
		->where('id', $id)
		->update(['status' => $status]);
		if($status=='1')
		{
			$follows = DB::table('friend_list')
			->join('users','users.id','friend_list.cust_id')
			->select('users.*')
			->where('friend_list.id', $id)
			->get();
					DB::table('notification')->insert([
							'notification_title'=>"You got a new follower.",
							'url'=> "profile/".$follows[0]->id,
							'type'=> "escort",
							'notification_content'=>$follows[0]->name." started following you.",
							'client_id'=>$follows[0]->id,
							'user_id'=>Auth::user()->id
					]);
				}
		echo json_encode($affected);exit;
	}
		
	public function unfriend()
	{
		$user_id = $_POST['current_user_id'];
		$escort_id = $_POST['escort_id'];
		$affected = DB::table('friend_list')
              ->where('escortId', $escort_id)
              ->where('cust_id', $user_id)
			  ->update(['status' => '0']);
		echo json_encode($affected);exit;
	}

	public function newProfiles()
	{
		$current_date = date("Y-m-d");		
		$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($current_date)));
		$from = $days_ago;
		$to = $current_date;
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
							['request','1']
						])
						->orderBy('created_at','desc')
						->limit(5)
						->get();
		// echo "<pre>";
		// print_r($new_profiles);
		// exit;
		return view('frontend/escort_dashboard/new.newprofiles.newprofiles',compact('new_profiles'));
	}
}