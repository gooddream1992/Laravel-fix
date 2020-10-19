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

class ClientProfileController extends Controller {
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
        $country = DB::table('countries')->select('*')->get();
        $client_profile = DB::table('users')->where('id','=',$user_role)->select()->get();
        return view('client.profile.index',['client_profile'=>$client_profile,'country'=>$country]);
    }

    public function upgrade(Request $request){
		$id = $request->id;
		$name = $request->name;
		$age = $request->age;
		$gender = $request->gender;
		$email = $request->email;
		$profession = $request->profession;
		$country = $request->country;
		$single_couple = $request->single_couple;
		$personal_type = $request->personal_type;
		$biography = $request->biography;
		$instagram = $request->instagram;
		$facebook = $request->facebook;
		$photo = $request->imageurl;
		if ($request->hasFile('imageurl')) {
			$photo = time().'.'.$request->imageurl->getClientOriginalExtension();
			$destinationPath = 'public/uploads/'; // upload path
			$request->imageurl->move($destinationPath,$photo);
		}
		DB::table('users')->where('id','=',$id)->update([
			'name'			=> $name,
			'age'			=> $age,
			'gender'		=> $gender,
			'email'			=> $email,
			'profession'	=> $profession,
			'country'		=> $country,
			'single_couple'	=> $single_couple,
			'personal_type'	=> $personal_type,
			'biography'		=> $biography,
			'instagram'		=> $instagram,
			'facebook'		=> $facebook,
			'photo'			=> $photo
		]);
		return redirect()->route('client.profile');
    }
}