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
		$follows = DB::table('follows')
					->join('users','users.id','follows.escortId')
					->where('custId', Auth::user()->id)
					->where('status', 2)
					->get();
		return view('client.friendlist',compact('follows'));
	}
	
	public function unfriend()
	{
		$user_id = $_POST['current_user_id'];
		$escort_id = $_POST['escort_id'];
		$affected = DB::table('follows')
              ->where('escortId', $escort_id)
              ->where('custId', $user_id)
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
		return view('client.newprofiles',compact('new_profiles'));
	}
}