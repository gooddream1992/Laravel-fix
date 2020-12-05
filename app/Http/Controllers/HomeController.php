<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $escorts = DB::table('users')->join('countries', 'users.country', '=', 'countries.id')
            ->join('states', 'users.state', '=', 'states.id')
            ->join('cities', 'users.city', '=', 'cities.id')
            ->select('users.id as id', 'users.name as name', 'users.activation as activation', 'users.country as country_id', 'users.state as state_id', 'users.city as city_id', 'users.serviceArea as serviceArea', 'users.whatsup as whatsup', 'users.snapchat as snapchat', 'users.instagram as instagram', 'users.follow_me as follow_me', 'users.email_me as email_me', 'users.website as website', 'users.hair as hair', 'users.bust as bust', 'users.personal_type as personal_type', 'users.pet as pet', 'users.drink as drink', 'users.food as food', 'users.service as service', 'users.age as age', 'users.nationality as nationality', 'users.sexuality as sexuality', 'users.eyes as eyes', 'users.bodyShape as bodyShape', 'users.escortType as escortType', 'users.escortTouring as escortTouring', 'users.serviceOffer as serviceOffer', 'users.dress as dress', 'users.height as height', 'users.price as price', 'users.gender as gender', 'users.phone as phone', 'users.roleStatus as roleStatus', 'users.code as code', 'users.photo as photo', 'users.email as email', 'users.email_verified_at as email_verified_at', 'users.password as password', 'users.remember_token as remember_token', 'users.created_at as created_at', 'users.updated_at as updated_at', 'users.straight as straight', 'cities.city as city', 'states.state as state')
            ->where([['users.roleStatus', 2], ['activation', 1]])
            ->inRandomOrder()
            ->limit(10)
            ->get();
            
        $States = \App\State::all();
        $indpnts = \App\Independent::all();
        $provresrcs = \App\ProviderResource::all();
        $professionals = \App\Professional::all();
        $hedfoots = \App\HeaderFooter::orderBy('id', 'desc')->first();
        $abouts = \App\About::all();
        $country = \App\Country::inRandomOrder()->limit(8)
            ->get();
        $slider = \App\Slider::orderBy('id', 'desc')->where('category', 1)
            ->first();
        $data = array(
            'escorts' => $escorts,
            'States' => $States,
            'indpnts' => $indpnts,
            'provresrcs' => $provresrcs,
            'professionals' => $professionals,
            'hedfoots' => $hedfoots,
            'abouts' => $abouts,
            'country' => $country,
            'slider' => $slider
        );
        /*echo "<pre>";
                    print_r($data);
                    exit;*/
        //$escorts= \App\User::inRandomOrder()->limit(10)->get()->where('roleStatus', 2);
        return view('welcome', $data);
    }
    public function index()
    {

        if (Auth::user()->roleStatus == 1)
        {
            return view('home');
        }
        elseif (Auth::user()->roleStatus == 2)
        {
            // return view('escort.notifications');
            return redirect()->action('escortBackEnd\EscortProfileController@getProfileStats');
        }
        elseif (Auth::user()->roleStatus == 3)
        {
            // return view('client.profile.index');
            // return view('homeClient');
            return redirect()->action('clientBackEnd\ClientFriendsController@newProfiles');
        }
        else
        {
            return view('home');
        }

        //return view('home');
        
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect('/');
    }

    public function logoutClient()
    {
        Auth::logout();
        return redirect('/');
    }

}

