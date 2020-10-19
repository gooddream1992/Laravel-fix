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

	public function changeRequestStatus()
	{
		$id = $_POST['request_id'];
		$status = $_POST['status'];
		$affected = DB::table('friend_list')
              ->where('id', $id)
			  ->update(['status' => $status]);
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
		$new_profiles = DB::table('users')
						->select('id','name','photo','created_at')
						->where('roleStatus','2')
						->orderBy('created_at','desc')
						->get();
		return view('frontend/escort_dashboard/new.newprofiles.newprofiles',compact('new_profiles'));
	}
}