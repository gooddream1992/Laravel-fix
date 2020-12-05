<?php
  namespace App\Http\Controllers\adminBackEnd;
  use App\BecomeEscort;
  use App\Blog;
  use App\Country;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Illuminate\Support\Facades\Mail;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Carbon;
  use App\Mail\SendMail;
  use App\ProfileTour;
  use App\ProfileBlog;
  use App\User;
  use App\Testimonial;
  use App\BlogComment;
  use Auth;
  use DB;

class EscortProfileRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = DB::table('users')      
        ->where([
            ['roleStatus','=',2],
            ['request','=',0],
            
            ])->select('users.id as id','users.name as name','users.gender as gender','users.phone as phone','users.email as email','users.request as request')->get();
       return view('admin.escorts.escortRequest.index',['user'=>$user]);
    }
    public function accept($id,$name,$request){
        $msg = ($request == 1 ? "Accepted" : ($request == 2 ? "Deny" : ($request == 3 ? "Rejected" : "unknown")));
        $accept = DB::table('users')->where('id','=',$id)->update(['request'=>$request]);

        /* Request Accepted Code for email Start Here */
        if($request == 1){
          $email_accept = DB::table('users')->where('id','=',$id)->select()->get();         
          foreach ($email_accept as $key => $value) {

                  $data = array(
                    'name' => $value->name,
                    'email' => $value->email,
                );

                Mail::send('requestAccepted', $data, function ($message) use ($data)
                {
                    $message->to($data['email'], 'Honey Luxe')->subject('Request Accepted');
                    $message->from('irishcharmer192@gmail.com', 'Honey Luxe');
                });

          }     

        }
        /* Request Accepted Code for email End Here */
        if($request == 2) {
            $deny = DB::table('users')->where('id','=',$id)->select('email')->get();
            foreach($deny as $value){
                $email =  $value->email;
                return redirect()->route('admin.escort.profile.request.deny',[$id,$email,$name]);    
            }
        }else{

            return redirect()->route('admin.escort.profile.request')->with('message',$name."'s Request ".$msg);

        }

    }

    public function deny($id,$email,$name){
        return view('admin.escorts.escortRequest.reason',['id'=>$id,'email'=>$email,'name'=>$name]);
    }

    public function denyReason(Request $request){
         
         DB::table('request_deny')->insert(['escort_id'=>$request->id,'reason'=>$request->reason]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'reason' => $request->reason
        );

            Mail::send('denyReason', $data, function ($message) use ($data)
            {
                $message->to($data['email'], 'Honey Luxe')->subject('Deny Reason');
                $message->from('irishcharmer192@gmail.com', 'Honey Luxe');
            });
            return redirect()->route('admin.escort.profile.request')->with('message',$request->name."'s Request Deny");
    }

    public function denyList(){
      $user_deny = DB::table('users')
        //->leftJoin('request_deny','users.id','request_deny.escort_id')
        ->join('request_deny','users.id','request_deny.escort_id')
        ->where([
            ['activation','=',0],
            ['roleStatus','=',2]
            ])->select('users.id as id','users.name as name','users.gender as gender','users.phone as phone','users.email as email','request_deny.reason as reason','users.request as request')->get();
      return view('admin.escorts.escortRequest.denyReason',['user_deny'=>$user_deny]);
    }

    // public function rejectList(){
    //   $user_reject = DB::table('users')
    //   ->where('request','3')
    //   ->select('name','email')
    //   ->get();
    //  return view('admin.escorts.escortRequest.rejectedList',['user_reject'=>$user_reject]);
    // }
}