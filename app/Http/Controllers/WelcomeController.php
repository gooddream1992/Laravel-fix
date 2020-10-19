<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WelcomeController extends Controller
{
	public function home(){
        $escorts = DB::table('users')
                    ->leftjoin('countries','users.country','=','countries.id')
                    ->leftjoin('states', 'users.state', '=', 'states.id')
                    ->leftjoin('cities', 'users.city', '=', 'cities.id')
                    ->select('users.id as id','users.name as name','users.activation as activation','users.country as country_id','users.state as state_id','users.city as city_id','users.serviceArea as serviceArea','users.whatsup as whatsup','users.snapchat as snapchat','users.instagram as instagram','users.follow_me as follow_me','users.email_me as email_me','users.website as website','users.hair as hair','users.bust as bust','users.personal_type as personal_type','users.pet as pet','users.drink as drink','users.food as food','users.service as service','users.age as age','users.nationality as nationality','users.sexuality as sexuality','users.eyes as eyes','users.bodyShape as bodyShape','users.escortType as escortType','users.escortTouring as escortTouring','users.serviceOffer as serviceOffer','users.dress as dress','users.height as height','users.price as price','users.gender as gender','users.phone as phone','users.roleStatus as roleStatus','users.code as code','users.photo as photo','users.email as email','users.email_verified_at as email_verified_at','users.password as password','users.remember_token as remember_token','users.created_at as created_at','users.updated_at as updated_at','users.straight as straight','cities.city as city','states.state as state')
                    ->where([
                        ['users.roleStatus', 2],
                        ['activation',1]
                    ])->inRandomOrder()->limit(10)->get();
        // echo "<pre>";
        // print_r($escorts);
        // exit;
        $States=\App\State::all();
        $indpnts= \App\Independent::all();
        $provresrcs= \App\ProviderResource::all();
        $professionals= \App\Professional::all();
        $hedfoots=\App\HeaderFooter::orderBy('id','desc')->first();
        $abouts= \App\About::all(); 
        // $country=\App\Country::inRandomOrder()->limit(8)->get();
        $country=\App\State::where('image','!=','')->limit(8)->get();
        $slider=\App\Slider::orderBy('id','desc')->where('category', 1)->first(); 
        $data = array(
                      'escorts'=>$escorts,
                      'States'=>$States,
                      'indpnts'=>$indpnts,
                      'provresrcs'=>$provresrcs,
                      'professionals'=>$professionals,
                      'hedfoots'=>$hedfoots,
                      'abouts'=>$abouts,
                      'country'=>$country,
                      'slider'=>$slider
                  );
                   /*echo "<pre>";
                    print_r($data);
                    exit;*/
        //$escorts= \App\User::inRandomOrder()->limit(10)->get()->where('roleStatus', 2);
        return view('welcome',$data);
    }

    public function suburb(Request $request){
     $req = $_POST['query'];
     $data_res=array();
     $data_qry = DB::table('cities')->select('id','city')->where('city','like',"%".$req."%")->get();
     foreach ($data_qry as $city) {
        $data_res[]=array('value'=>$city->city,'id'=>$city->id);
      }
      if(count($data_res)){
        return $data_res;
      }else{
        return ['value'=>'No Patient Found','id'=>''];
      }
    }

    public function escortsAjaxData(Request $request){
      $city = DB::table('cities')->select('id','city')->where('city','=',$request->city_id)->get();
       $escorts = DB::table('users')
       ->join('countries','users.country','=','countries.id')
       ->join('states', 'users.state', '=', 'states.id')
       ->join('cities', 'users.city', '=', 'cities.id')
       ->select('users.id as id','users.name as name','users.activation as activation','users.country as country_id','users.state as state_id','users.city as city_id','users.serviceArea as serviceArea','users.whatsup as whatsup','users.snapchat as snapchat','users.instagram as instagram','users.follow_me as follow_me','users.email_me as email_me','users.website as website','users.hair as hair','users.bust as bust','users.personal_type as personal_type','users.pet as pet','users.drink as drink','users.food as food','users.service as service','users.age as age','users.nationality as nationality','users.sexuality as sexuality','users.eyes as eyes','users.bodyShape as bodyShape','users.escortType as escortType','users.escortTouring as escortTouring','users.serviceOffer as serviceOffer','users.dress as dress','users.height as height','users.price as price','users.gender as gender','users.phone as phone','users.roleStatus as roleStatus','users.code as code','users.photo as photo','users.email as email','users.email_verified_at as email_verified_at','users.password as password','users.remember_token as remember_token','users.created_at as created_at','users.updated_at as updated_at','users.straight as straight','cities.city as city','states.state as state')
       ->where('users.city','=',$city[0]->id)
       ->inRandomOrder()
       ->limit(10)
       ->get();
       return $escorts;
    }
}