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
  use DB;

class EscortController extends Controller
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


public function newEscort(){

  return view('admin.escorts.newEscort');
}


public function escortStore(Request $request)
    {

//return $request;

        $users=new User();

        if ($request->hasFile('photo')) {
            $profilephoto = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(('public/uploads'), $profilephoto);
            $users->photo=$profilephoto;
        }
        $users->name=$request->name;
        $users->activation=$request->activation;
        $users->serviceArea=$request->serviceArea;

        $users->whatsup=$request->whatsup;
        $users->snapchat=$request->snapchat;
        $users->instagram=$request->instagram;
        $users->follow_me=$request->follow_me;
        $users->email_me=$request->email_me;
        $users->website=$request->website;
        $users->straight=$request->straight;
        $users->hair=$request->hair;
        $users->bust=$request->bust;
        $users->personal_type=$request->personal_type;
        $users->pet=$request->pet;
        $users->drink=$request->drink;
        $users->food=$request->food;
        $users->service=$request->service;

        $users->age=$request->age;
        $users->nationality=$request->nationality;
        $users->sexuality=$request->sexuality;
        $users->eyes=$request->eyes;
        $users->bodyShape=$request->bodyShape;

        $users->escortType=$request->escortType;
        $users->escortTouring=$request->escortTouring;
        $users->serviceOffer=$request->serviceOffer1.', '.$request->serviceOffer2.', '.$request->serviceOffer3.', '.$request->serviceOffer4.', '.$request->serviceOffer5.', '.$request->serviceOffer6.', '.$request->serviceOffer7.', '.$request->serviceOffer8.', '.$request->serviceOffer9.', '.$request->serviceOffer10.', '.$request->serviceOffer11.', '.$request->serviceOffer12.', '.$request->serviceOffer13.', '.$request->serviceOffer14.', '.$request->serviceOffer15;


        $users->dress=$request->dress;
        $users->height=$request->height;
        $users->price=$request->price;

        $users->gender=$request->gender;
        $users->phone=$request->phone;
        $users->email=$request->email;

        $users->country=$request->country_id;
        $users->city=$request->state_id;
        $users->suburb=$request->city_id;
        $users->code=$request->code;
        $users->roleStatus=2;
        $users->password=bcrypt($request->password);
        $users->save();
        return back()->with('message', 'Escort Created Successfully!');
    }



public function escortList(){

  $users =\App\User::all()->where('roleStatus', 2);
  return view('admin.escorts.escortList',['users'=>$users]);
}
public function activation($id,$activation_id){
    $activation_id = $activation_id == 1 ? 0: 1;
    
    $activation = DB::table('users')
              ->where('id', $id)
              ->update(['activation' => $activation_id]);
    $users = DB::table('users')
              ->select('*')
              ->where('id', $id)
              ->get();
    $activation_details = $users[0]->activation == 1 ? "Active": "Deactive";
    return redirect()->back()->with('status', 'Escort Activation Changed Successfully To '.$activation_details);
}
public function escortModify($id){

    //$escorts=\App\User::all()->where('id', $id);
    $country=\App\Country::all(); //->where('id', $escort->country);
    $escorts = DB::table('users')
                    ->join('countries','users.country','=','countries.id')
                    ->join('states', 'users.state', '=', 'states.id')
                    ->join('cities', 'users.city', '=', 'cities.id')
                    ->select('users.id as id','users.name as name','users.activation as activation','users.country as country_id','users.state as state_id','users.city as city_id','users.serviceArea as serviceArea','users.whatsup as whatsup','users.snapchat as snapchat','users.instagram as instagram','users.follow_me as follow_me','users.email_me as email_me','users.website as website','users.hair as hair','users.bust as bust','users.personal_type as personal_type','users.pet as pet','users.drink as drink','users.food as food','users.service as service','users.age as age','users.nationality as nationality','users.sexuality as sexuality','users.eyes as eyes','users.bodyShape as bodyShape','users.escortType as escortType','users.escortTouring as escortTouring','users.serviceOffer as serviceOffer','users.dress as dress','users.height as height','users.price as price','users.gender as gender','users.phone as phone','users.roleStatus as roleStatus','users.code as code','users.photo as photo','users.email as email','users.email_verified_at as email_verified_at','users.password as password','users.remember_token as remember_token','users.created_at as created_at','users.updated_at as updated_at','users.straight as straight')
                    ->where('users.id', $id)->get();
                    if(empty($escorts->toArray())){
                        $escorts=\App\User::all()->where('id', $id);
                    }
                   /*echo "<pre>";
                    print_r($escorts);
                    exit;*/
    return view('admin.escorts.escortModify',['escorts'=>$escorts,'country'=>$country]);
}

public function state(Request $request){
    $state_id = $request->state_id;
    $statecount=\App\State::all()->where('country_id', $request->country);
    $html = '';
     
        $html .= "<option value=''>Select State</option>";

    foreach($statecount as $value){
        
        $html .= "<option value='".$value->id."' ";
        $html .= $value->id == $state_id ? 'selected': ''; 
        $html .= '>'.$value->state;
        $html .= "</option>";
        
    }
    return $html;
}

public function city(Request $request){
    $city = $request->city;
    $citycount=\App\City::all()->where('state_id', $request->state);
    $html = '';
        $html .= "<option value=''>Select City</option>";
     
    foreach($citycount as $value){
        $html .= "<option value='".$value->id."' ";
        $html .= $value->id == $city ? 'selected': ''; 
        $html .= '>'.$value->city;
        $html .= "</option>";
    }
    return $html;
}

public function escortUpdate(Request $request)
    {

//return $request;
        $users=User::find($request->id);
        if ($request->hasFile('photo')) {
            $profilephoto = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(('public/uploads'), $profilephoto);
            $users->photo=$profilephoto;
        }
         
        $users->name = empty($request->name) ? "Null" : $request->name;
        $users->activation=$request->activation;
        $users->serviceArea=$request->serviceArea;


        $users->whatsup=$request->whatsup;
        $users->snapchat=$request->snapchat;
        $users->instagram=$request->instagram;
        $users->follow_me=$request->follow_me;
        $users->email_me=$request->email_me;
        $users->website=$request->website;
        $users->straight=$request->straight;
        $users->hair=$request->hair;
        $users->bust=$request->bust;
        $users->personal_type=$request->personal_type;
        $users->pet=$request->pet;
        $users->drink=$request->drink;
        $users->food=$request->food;
        $users->service=$request->service;
        
        $users->age=$request->age;
        $users->nationality=$request->nationality;
        $users->sexuality=$request->sexuality;
        $users->eyes=$request->eyes;
        $users->bodyShape=$request->bodyShape;

         $users->escortType=$request->escortType;
        $users->escortTouring=$request->escortTouring;
        $users->serviceOffer=$request->serviceOffer1.', '.$request->serviceOffer2.', '.$request->serviceOffer3.', '.$request->serviceOffer4.', '.$request->serviceOffer5.', '.$request->serviceOffer6.', '.$request->serviceOffer7.', '.$request->serviceOffer8.', '.$request->serviceOffer9.', '.$request->serviceOffer10.', '.$request->serviceOffer11.', '.$request->serviceOffer12.', '.$request->serviceOffer13.', '.$request->serviceOffer14.', '.$request->serviceOffer15;


        $users->dress=$request->dress;
        $users->height=$request->height;
        $users->price=$request->price;

        $users->gender=$request->gender;
        $users->phone=$request->phone;
        $users->email=$request->email;
       /* if($request->state==NULL){
           $state=$request->state;
        }else{
           $state=$request->state;
        }
         if($request->city==NULL){
           $city=$request->city;
        }else{
           $city=$request->city;
        }*/
        $users->country = $request->country_id;
        $users->state = $request->state;
        $users->city = $request->city;
        $users->code = $request->code;
        $users->roleStatus=2;
        $users->password=bcrypt($request->password);
        $users->save();
        return redirect('escort/list')->with('message', 'Escort Update Successfully!');
    }








public function escortDropdown(){

  return view('admin.escorts.escortDropdown');
}




public function escortDropdownStore(Request $request)
    {

//return $request;

        $escortdropdowns= new EscortDropdown;
        $escortdropdowns->dropdownTitle=$request->dropdownTitle;
        $escortdropdowns->status=$request->status;
        $escortdropdowns->save();


        return back()->with('message', 'Escort Dropdown Added Successfully!');
    }

public function escortDropdownUpdate(Request $request)
    {

        $escortdropdowns= EscortDropdown::find($request->id);
        $escortdropdowns->dropdownTitle=$request->dropdownTitle;
        $escortdropdowns->status=$request->status;
        $escortdropdowns->save();


        return back()->with('message', 'Escort Dropdown Updated Successfully!');
    }



public function serviceOffer(){

  return view('admin.escorts.serviceOffer');
}

// SMPEDIT 15-10-2020
public function serviceOfferAssignList()
{
    $servicesassigns = DB::table('service_offer_assigns')
        ->join('users', 'service_offer_assigns.escortId', 'users.id')
        ->select('service_offer_assigns.*', 'users.name as escortName')
        ->get();

    return view('admin.escorts.serviceOfferAssignList', compact('servicesassigns'));
}
// SMPEDIT 15-10-2020


public function serviceOfferStore(Request $request)
    {

        $services= new ServiceOffer;
        $services->service=$request->service;
        $services->save();


        return back()->with('message', 'Service Added Successfully!');
    }

public function serviceOfferUpdate(Request $request)
    {

        $services= ServiceOffer::find($request->id);
        $services->service=$request->service;
        $services->save();


        return back()->with('message', 'Service Updated Successfully!');
    }


public function serviceOfferDelete($id)
    {

        $services= ServiceOffer::find($id)->delete();


        return back()->with('error', 'Service Deleted Successfully!');
    }


public function serviceOfferAssignStore(Request $request)
    {
        DB::table('service_offer_assigns')->where('escortId','=',$request->escortId)->delete();
        $time=\Carbon\Carbon::now()->toDateTimeString();
        $time2=\Carbon\Carbon::now()->toDateTimeString();
        foreach ($request->service as $key => $value) {
        $data=array(
        'escortId'=>$request->escortId,
        'service'=>$request->service [$key],
        'created_at'=>$time,
        'updated_at'=>$time2);
       ServiceOfferAssign::insert($data);
}


        return back()->with('message', 'Assign Service Added Successfully!');
    }

public function serviceOfferAssignUpdate(Request $request)
    {
//return $request;

        $services= ServiceOfferAssign::find($request->id);
        $services->escortId=$request->escortId;
        $services->save();

        return back()->with('message', 'Assign Service Updated Successfully!');
    }
public function serviceOfferAssignDelete($id)
    {

        $services= ServiceOfferAssign::find($id)->delete();


        return back()->with('error', 'Service Assign Deleted Successfully!');
    }





public function escortFeeds(){

  return view('admin.escorts.escortFeeds');
}


public function escortFeedsStore(Request $request)
    {

        $feeds= new Feed;
        $feeds->escortId=$request->escortId;
        $feeds->date=date('yy-m-d');
        $feeds->title=$request->title;
        $feeds->description=$request->description;
        if ($request->hasFile('image')) {
            $icons = '1'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('public/uploads'), $icons);
            $feeds->image=$icons;
        }
        $feeds->url=$request->url;
         $feeds->status=$request->status;
        $feeds->save();


        return back()->with('message', 'Feeds Added Successfully!');
    }



    public function escortFeedsUpdate(Request $request)
    {

        $feeds= Feed::find($request->id);
        $feeds->escortId=$request->escortId;
        $feeds->date=date('yy-m-d');
        $feeds->title=$request->title;
        $feeds->description=$request->description;
        if ($request->hasFile('image')) {
            $icons = '1'.time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(('public/uploads'), $icons);
            $feeds->image=$icons;
        }
        $feeds->url=$request->url;
        $feeds->status=$request->status;
        $feeds->save();


        return back()->with('message', 'Feeds Updated Successfully!');
    }
}