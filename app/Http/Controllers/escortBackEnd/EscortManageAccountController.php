<?php 
namespace App\Http\Controllers\escortBackEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Auth;
use App\User;  
use\App\SexTrafficking;
use\App\LocalResource;
use\App\PurchaseMarketing;
use\App\BecomeEscort;
use\App\Blog;
use DB;
class EscortManageAccountController extends Controller
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
        return view('frontend.escort_dashboard.new.manageAccount.index');
    }

    public function checkPassword(Request $request)
	{
		if(Auth::Check())
		{
		  	$request_data = $request->old_password;
			if(Hash::check($request_data,Auth::user()->password))
			{
			  	echo json_encode("same");
		  	}
		  	else
		  	{
				echo json_encode("not_same");
			}
		}
    }
    
    public function changePassword() {
		$user_id = Auth::user()->id;
		$new_password = Hash::make($_POST['new_password']);
		$affected = DB::table('users')
			->where('id', $user_id)
			->update(['password' => $new_password]);
        echo json_encode($affected);
        
    }
    
    public function emailNotification(Request $request){
        $notification_data =  $request->notification;
        $user_id = Auth::user()->id;
       $notification =  DB::table('users')->where('id','=',$user_id)->update(['email_notification'=>$notification_data]);
        if($notification_data == 1){
            echo "Your Email Notification Has been Activated";
        }else{
            echo "Your Email Notification Has been Deactivated";
        }
    }

    public function activationORdeactivation(Request $request){
        $user_id = Auth::user()->id;
        if(Auth::user()->request == 1){
            $pro_act = 0;
        }else{
            $pro_act = 1;
        }
        // $user = DB::table('users')->where('id','=',$user_id)->update(['profile_activate_or_not'=>$pro_act]);
        $user = DB::table('users')->where('id','=',$user_id)->update(['request'=>$pro_act]);
        echo $pro_act;
    }
}