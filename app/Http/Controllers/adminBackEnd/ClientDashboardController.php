<?php
  namespace App\Http\Controllers\adminBackEnd;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;
  use App\EscortDropdown;
  use App\ServiceOffer;
  use App\ServiceOfferAssign;
  use App\Feed;
  use App\Follow;
  use DB;

class ClientDashboardController extends Controller
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


public function clientProfileSettings($id){

  return view('frontend.client_dashboard.clientProfileSettings', compact('id'));
}






public function clientProfileSettingsUpdate(Request $request)
    {

//return $request;

        $users=User::find($request->id);

        if ($request->hasFile('photo')) {
            $profilephoto = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(('public/uploads'), $profilephoto);
            $users->photo=$profilephoto;
        }
        $users->name=$request->name;


        $users->whatsup=$request->whatsup;
        $users->snapchat=$request->snapchat;
        $users->instagram=$request->instagram;
        $users->follow_me=$request->follow_me;
        $users->email_me=$request->email_me;
        $users->website=$request->website;
        $users->personal_type=$request->personal_type;
        $users->age=$request->age;
        $users->nationality=$request->nationality;
        $users->height=$request->height;

        $users->gender=$request->gender;
        $users->phone=$request->phone;
        $users->email=$request->email;
        if($request->state_id==NULL){
           $state=$request->state_id1;
        }else{
           $state=$request->state_id;
        }
         if($request->city_id==NULL){
           $city=$request->city_id1;
        }else{
           $city=$request->city_id;
        }
        $users->country=$request->country_id;
        $users->city=$state;
        $users->suburb=$city;
        $users->code=$request->code;
        $users->save();
        return back()->with('message', 'Client Update Successfully!');
    }





public function followStore(Request $request){

 // return $request;

  $follows= new Follow;
  $follows->escortId=$request->escortId;
  $follows->custId=$request->custId;
  $follows->status=$request->status;
  $follows->save();


  return back()->with('message', 'Followed Successfully!');
}

public function followUpdate(Request $request){

 // return $request;

  $follows= Follow::find($request->id);
  $follows->status=$request->status;
  $follows->save();


  return back()->with('message', 'Unfollowed Successfully!');
}



public function notification(){

  return view('frontend.client_dashboard.notification');
}





}