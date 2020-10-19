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
class EscortTicketController extends Controller
{
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
       $user_role = Auth::user()->id;
       return view('frontend/escort_dashboard/new.ticket.index',['id'=>$user_role]);
    }
    public function ticketSubmit(Request $request){
        $id = $request->id;
        $subject = $request->subject;
        $description = $request->description;
        DB::table('ticket')->insert([
            'client_id'     =>  $id,
            'subject'       =>  $subject,
            'description'   =>  $description,
            'status'        =>  0
        ]);
        session()->flash('message','Your Ticket Submited Successfully');
        return redirect()->back();
    }
}