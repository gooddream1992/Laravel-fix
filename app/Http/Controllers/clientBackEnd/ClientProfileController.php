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
use App\City;
use App\EscortDropdown;
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
        $countries = DB::table('countries')->select('*')->get();
        $cities = City::all();
        $nationalities = EscortDropdown::where('status', 4)->get();
        $client_profile = DB::table('users')->where('id','=',$user_role)->select()->get();
        return view('client.profile.index', compact('client_profile', 'countries', 'cities', 'nationalities'));
    }

    public function upgrade(Request $request) {

      $id = $request->id;
      $name = $request->name;
      $age = $request->age;
      $gender = $request->gender;
      $email = $request->email;
      $profession = $request->profession;
      $country = $request->country;
      $city = $request->city; 
      $nationality = $request->nationality;
      $single_couple = $request->single_couple;
      $personal_type = $request->personal_type;
      $biography = $request->biography;
      $instagram = $request->instagram;
      $facebook = $request->facebook;
      $photo = $request->imageurl;
      $interested_in_male = empty($request->interested_in_male) ? 0 : $request->interested_in_male;
      $interested_in_female = empty($request->interested_in_female) ? 0 : $request->interested_in_female;
      $interested_in_trans = empty($request->interested_in_trans) ? 0 : $request->interested_in_trans;
      $interested_in_gay = empty($request->interested_in_gay) ? 0 : $request->interested_in_gay;

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
        'state'    => $city,
        'nationality' => $nationality,
        'single_couple'	=> $single_couple,
        'personal_type'	=> $personal_type,
        'biography'		=> $biography,
        'instagram'		=> $instagram,
        'facebook'		=> $facebook,
        'photo'			=> $photo,
        'interested_in_male' => $interested_in_male,
        'interested_in_female' => $interested_in_female,
        'interested_in_trans' => $interested_in_trans,
        'interested_in_gay' => $interested_in_gay,
      ]);
      return redirect()->route('client.profile')->with('message','Your Profile Has Been Updated');
    }
}