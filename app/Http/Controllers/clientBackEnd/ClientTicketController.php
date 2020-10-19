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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ClientTicketController extends Controller {
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
    public function index() {
       $user_role = Auth::user()->id;
       return view('client.ticket.index',['id'=>$user_role]);
    }

    public function ticketSubmit(Request $request){
        $id = $request->id;
        $subject = $request->subject;
        $description = $request->description;
        /*DB::table('ticket')->insert([
            'client_id'     =>  $id,
            'subject'       =>  $subject,
            'description'   =>  $description,
            'status'        =>  0
        ]);*/
        session()->flash('message','Your Ticket Submited Successfully');
        return redirect()->back();
    }
}