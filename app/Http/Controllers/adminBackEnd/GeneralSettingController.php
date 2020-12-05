<?php
namespace App\Http\Controllers\adminBackEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;
use App\Country;
use App\State;
use App\Slider;
use App\HeaderFooter;
use App\City;
use File;
use Illuminate\Filesystem\Filesystem;

class GeneralSettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['country', 'state', 'getCities']); // SMPEDIT 29-09-2020
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function locationAdd()
    {
        //$countries =\App\Country::paginate(1);
        //  $countries = DB::table('countries')->paginate(10);
        $countries = DB::table('countries')->get();
        $countries_table = DB::table('countries')->paginate(10);
        return view('admin.general_setting.locationAdd', ['countries' => $countries, 'countries_table' => $countries_table]);
    }

    public function locationstate($id)
    {
        //$states =\App\State::where('country_id','=',$id)->get();
        $states = DB::table('states')->join('countries', 'states.country_id', '=', 'countries.id')
            ->where('country_id', '=', $id)->select('states.id as stateid', 'states.state as state', 'countries.country as  country', 'states.*')
            ->paginate(10);
        $country = \App\Country::get();
        return view('admin.general_setting.locationState', ['states' => $states, 'country' => $country, 'id' => $id]);

    }

    public function locationstateadd($id)
    {
        return view('admin.general_setting.locationStateadd', ['id' => $id]);
    }

    public function statebulk(Request $request)
    {
        if ($request->hasFile('statelist'))
        {
            $file = $_FILES['statelist']['name'];
            $request
                ->statelist
                ->move(('public/statelist') , $file);
            $filepath = url('public/statelist', $file);
            $fileopen = fopen($filepath, "r");
            while (($emapData = fgetcsv($fileopen, 10000, ",")) !== false)
            {
                DB::table('states')->insert(['state' => $emapData[0], 'country_id' => $request->id]);
            }
            $file = new Filesystem;
            $file->cleanDirectory('public/statelist');
            return back()
                ->with('message', 'State Bulk List Added Successfully!');
        }
        else
        {
            return Redirect::back()
                ->withErrors(['msg', 'State List Fail to Add']);
        }
    }

    public function locationcity($id)
    {
        $cities = DB::table('states')->leftJoin('cities', 'cities.state_id', '=', 'states.id')
            ->where('states.id', '=', $id)->select('cities.id as cityId', 'cities.city as city', 'states.state as state', 'states.country_id as country_id', 'cities.*')
            ->paginate(10);
        $states = \App\State::where('country_id', '=', $cities[0]->country_id)
            ->get();
        return view('admin.general_setting.locationCity', ['cities' => $cities, 'states' => $states, 'id' => $id, 'country_id' => $cities[0]->country_id]);
    }

    public function locationcityadd($id)
    {
        $state = DB::table('states')->leftJoin('cities', 'cities.state_id', '=', 'states.id')
            ->where('states.id', '=', $id)->select()
            ->get();
        // $state = DB::table('cities')->where('state_id','=',$id)->select()->get();
        return view('admin.general_setting.locationCityadd', ['id' => $id, 'state' => $state]);
    }

    public function citybulk(Request $request)
    {
        if ($request->hasFile('citylist'))
        {
            $file = $_FILES['citylist']['name'];
            $request
                ->citylist
                ->move(('public/citylist') , $file);
            $filepath = url('public/citylist', $file);
            $fileopen = fopen($filepath, "r");
            while (($emapData = fgetcsv($fileopen, 10000, ",")) !== false)
            {
                DB::table('cities')->insert(['city' => $emapData[0], 'country_id' => $request->country_id, 'state_id' => $request->id]);
            }
            $file = new Filesystem;
            $file->cleanDirectory('public/citylist');
            return back()
                ->with('message', 'City Bulk List Added Successfully!');
        }
        else
        {
            return Redirect::back()
                ->withErrors(['msg', 'City List Fail to Add']);
        }
    }

    public function countryStore(Request $request)
    {
        $countries = new Country();
        $countries->country = $request->country;

        if ($request->hasFile('image'))
        {
            $images = time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $countries->image = $images;
        }

        $countries->save();
        return back()
            ->with('message', 'Country Added Successfully!');
    }

    public function countryUpdate(Request $request)
    {
        $countries = Country::find($request->id);
        $countries->country = $request->country;
        if ($request->hasFile('image'))
        {
            $images = time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $countries->image = $images;
        }
        $countries->save();
        return back()
            ->with('message', 'Country Updated Successfully!');
    }

    public function countryDelete($id)
    {
        // echo $id;
        // exit;
        $countries = Country::find($id)->delete();
        State::where('country_id', $id)->delete();
        City::where('country_id', $id)->delete();
        return back()
            ->with('message', 'Country Deleted Successfully!');
    }

    public function stateStore(Request $request)
    {

        $states = new State();
        $states->country_id = $request->country_id;
        $states->state = $request->state;
        if ($request->hasFile('image'))
        {
            $images = time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $states->image = $images;
        }
        $states->save();
        return back()
            ->with('message', 'State Added Successfully!');
    }

    public function stateUpdate(Request $request)
    {
        $states = State::find($request->id);
        $states->country_id = $request->country_id;
        $states->state = $request->state;

        if ($request->hasFile('image'))
        {
            $images = time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $states->image = $images;
        }
        $states->save();
        return back()
            ->with('message', 'State Updated Successfully!');
    }

    public function stateDelete($id)
    {
        $states = State::find($id)->delete();
        City::where('state_id', $id)->delete();

        return back()
            ->with('message', 'State Deleted Successfully!');
    }

    public function cityStore(Request $request)
    {
        $contryids = State::orderBy('id', 'desc')->where('id', $request->state_id)
            ->first();
        $countryid = $contryids->country_id;

        $cities = new City();
        $cities->country_id = $countryid;
        $cities->state_id = $request->state_id;
        $cities->city = $request->city;
        $cities->save();
        return back()
            ->with('message', 'City Added Successfully!');

    }

    public function cityUpdate(Request $request)
    {
        $contryids = State::orderBy('id', 'desc')->where('id', $request->state_id)
            ->first();
        $countryid = $contryids->country_id;

        $cities = City::find($request->id);
        $cities->country_id = $countryid;
        $cities->state_id = $request->state_id;
        $cities->city = $request->city;
        $cities->save();
        return back()
            ->with('message', 'City Updated Successfully!');
    }

    public function cityDelete($id)
    {
        $cities = City::find($id)->delete();

        return back()
            ->with('message', 'City Deleted Successfully!');
    }

    public function country(Request $request)
    {
        $states = State::where([['country_id', $request
            ->country_id]])
            ->get();
        return response()
            ->json(['states' => $states]);
    }
    public function state(Request $request)
    {
        $citys = City::where([['state_id', $request
            ->state_id]])
            ->get();
        return response()
            ->json(['citys' => $citys]);
    }

    // SMPEDIT 30-09-2020
    public function getCities(Request $request)
    {
        $cities = State::where([['country_id', $request
            ->country_id]])
            ->select('id', 'country_id', 'state as city')
            ->get();
        return response()
            ->json(['cities' => $cities], 200);
    }

    public function getCity(Request $request)
    {
        $city_name = $request->city_name;
        $cities = State::where([['country_id', $request
            ->country_id]])
            ->select('id', 'country_id', 'state as city')
            ->get();
        $html = "<option value=''>Select City</option>";
        foreach ($cities as $key => $value)
        {
            $select = $city_name == $value->id ? 'selected' : '';
            $html .= "<option value='$value->id' " . $select . " >$value->city</option>";
        }
        return $html;

    }
    // SMPEDIT 30-09-2020 END
    public function newUserCreate()
    {
        return view('admin.general_setting.register');
    }
    public function newUserCreateStore(Request $request)
    {

        $users = new User();
        $users->name = $request->name;
        $users->activation = 1;
        $users->gender = $request->gender;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->country = $request->country_id;
        $users->city = $request->state_id;
        $users->suburb = $request->city_id;
        $users->code = $request->code;
        $users->roleStatus = $request->roleStatus;
        $users->password = bcrypt($request->password);
        $users->save();
        return back()
            ->with('message', 'User Created Successfully!');
    }
    public function userList()
    {
        DB::enableQueryLog();
        $users = \App\User::where('roleStatus', '!=', 1)->select('*')
            ->get();
        //dd(DB::getQueryLog());
        // foreach ($users as $value) {
        //   echo $value->id."<br>";
        // }
        // exit;
        return view('admin.general_setting.userList', ['users' => $users]);
    }
    public function userListDelete($id, $name)
    {
        // echo "hello";
        // exit;
        DB::table('users')->where('id', '=', $id)->delete();
        DB::table('blogs')
            ->where('publishBy', '=', $id)->delete();
        DB::table('profile_blogs')
            ->where('escortId', '=', $id)->delete();
        DB::table('blog_comments')
            ->where('user_id', '=', $id)->delete();
        DB::table('feeds')
            ->where('escortId', '=', $id)->delete();
        DB::table('feed_update')
            ->where('cust_id', '=', $id)->delete();
        DB::table('follows')
            ->where('escortId', '=', $id)->delete();
        DB::table('follows')
            ->where('custId', '=', $id)->delete();
        DB::table('friend_list')
            ->where('escortId', '=', $id)->delete();
        DB::table('friend_list')
            ->where('cust_id', '=', $id)->delete();
        DB::table('like_comments')
            ->where('escortId', '=', $id)->delete();
        DB::table('like_comments')
            ->where('userId', '=', $id)->delete();
        DB::table('profile_availabilities')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_descriptions')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_favourites')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_images')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_lists')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_rates')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_tours')
            ->where('escortId', '=', $id)->delete();
        DB::table('profile_wishlists')
            ->where('escortId', '=', $id)->delete();
        return redirect()
            ->back()
            ->with('message', $name . "'s Account Deleted Successfully");

    }

    public function testimonialApprove($id)
    {
        $updated_row = DB::table('testimonials')->where('id', $id)->update(['status' => '1']);
        //Route::redirect('testimonial.list');
        return redirect()
            ->route('testimonial.list');
    }
    public function testimonialReject($id)
    {
        $updated_row = DB::table('testimonials')->where('id', $id)->update(['status' => '2']);
        // Route::redirect('testimonial.list');
        return redirect()
            ->route('testimonial.list');
    }
    public function testimonialList()
    {
        return view('admin.general_setting.testimonialList');
    }
    public function testimonialDeletePage(){
        return view('admin.general_setting.testimonialdelete');
    }
    public function testimonialDelete($id){
        DB::table('testimonials')->where('id','=',$id)->delete();
        return redirect()->back()->with('message','Testimonial Deleted Successfully');
    }

    public function userProfileEdit($id)
    {
        $users = User::all()->where('id', $id);
        return view('admin.general_setting.userProfileEdit', ['users' => $users]);
    }
    public function userProfileUpdated(Request $request)
    {
        $users = User::find($request->id);
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->shift = $request->shift;
        $users->address = $request->address;
        $users->save();
        return back()
            ->with('message', 'User Updated Successfully!');
    }
    public function sliderAdd()
    {
        return view('admin.general_setting.sliderAdd');
    }

    public function sliderStore(Request $request)
    {
        //return $request;
        $sliders = new Slider();
        if ($request->hasFile('slider'))
        {
            $sliderimage = '1' . time() . '.' . $request
                ->slider
                ->getClientOriginalExtension();
            $request
                ->slider
                ->move(('public/uploads') , $sliderimage);
            $sliders->slider = $sliderimage;
        }
        if ($request->hasFile('slider1'))
        {
            $slider1image = '2' . time() . '.' . $request
                ->slider1
                ->getClientOriginalExtension();
            $request
                ->slider1
                ->move(('public/uploads') , $slider1image);
            $sliders->slider1 = $slider1image;
        }
        if ($request->hasFile('slider2'))
        {
            $slider2image = '3' . time() . '.' . $request
                ->slider2
                ->getClientOriginalExtension();
            $request
                ->slider2
                ->move(('public/uploads') , $slider2image);
            $sliders->slider2 = $slider2image;
        }
        $sliders->category = $request->category;
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->save();
        return back()
            ->with('message', 'Slider Uploaded Successfully!');
    }

    public function sliderUpdate(Request $request)
    {
        //return $request;
        $sliders = Slider::find($request->id);
        if ($request->hasFile('slider'))
        {
            $sliderimage = '1' . time() . '.' . $request
                ->slider
                ->getClientOriginalExtension();
            $request
                ->slider
                ->move(('public/uploads') , $sliderimage);
            $sliders->slider = $sliderimage;
        }
        if ($request->hasFile('slider1'))
        {
            $slider1image = '2' . time() . '.' . $request
                ->slider1
                ->getClientOriginalExtension();
            $request
                ->slider1
                ->move(('public/uploads') , $slider1image);
            $sliders->slider1 = $slider1image;
        }
        if ($request->hasFile('slider2'))
        {
            $slider2image = '3' . time() . '.' . $request
                ->slider2
                ->getClientOriginalExtension();
            $request
                ->slider2
                ->move(('public/uploads') , $slider2image);
            $sliders->slider2 = $slider2image;
        }
        $sliders->category = $request->category;
        $sliders->title = $request->title;
        $sliders->description = $request->description;
        $sliders->save();
        return back()
            ->with('message', 'Slider Updated Successfully!');
    }

    public function sliderDelete(Request $request)
    {
        //return $request;
        $sliders = Slider::find($request->id)
            ->delete();
        return back()
            ->with('message', 'Slider Deleted Successfully!');
    }

    public function headerFooter()
    {
        return view('admin.general_setting.headerFooter');
    }

    public function headerFooterStore(Request $request)
    {
        //return $request;
        $headerfooters = new HeaderFooter();

        if ($request->hasFile('headerLogo'))
        {
            $headerlogos = '1' . time() . '.' . $request
                ->headerLogo
                ->getClientOriginalExtension();
            $request
                ->headerLogo
                ->move(('public/uploads') , $headerlogos);
            $headerfooters->headerLogo = $headerlogos;
        }

        if ($request->hasFile('footerLogo'))
        {
            $footerlogos = '2' . time() . '.' . $request
                ->footerLogo
                ->getClientOriginalExtension();
            $request
                ->footerLogo
                ->move(('public/uploads') , $footerlogos);
            $headerfooters->footerLogo = $footerlogos;
        }
        if ($request->hasFile('facebook'))
        {
            $facebooks = '3' . time() . '.' . $request
                ->facebook
                ->getClientOriginalExtension();
            $request
                ->facebook
                ->move(('public/uploads') , $facebooks);
            $headerfooters->facebook = $facebooks;
        }
        if ($request->hasFile('youtube'))
        {
            $youtubes = '4' . time() . '.' . $request
                ->youtube
                ->getClientOriginalExtension();
            $request
                ->youtube
                ->move(('public/uploads') , $youtubes);
            $headerfooters->youtube = $youtubes;
        }
        if ($request->hasFile('linkedin'))
        {
            $linkedins = '5' . time() . '.' . $request
                ->linkedin
                ->getClientOriginalExtension();
            $request
                ->linkedin
                ->move(('public/uploads') , $linkedins);
            $headerfooters->linkedin = $linkedins;
        }
        if ($request->hasFile('tweeter'))
        {
            $tweeters = '6' . time() . '.' . $request
                ->tweeter
                ->getClientOriginalExtension();
            $request
                ->tweeter
                ->move(('public/uploads') , $tweeters);
            $headerfooters->tweeter = $tweeters;
        }
        if ($request->hasFile('instagram'))
        {
            $instagrams = '7' . time() . '.' . $request
                ->instagram
                ->getClientOriginalExtension();
            $request
                ->instagram
                ->move(('public/uploads') , $instagrams);
            $headerfooters->instagram = $instagrams;
        }

        $headerfooters->facebookurl = $request->facebookurl;
        $headerfooters->youtubeurl = $request->youtubeurl;
        $headerfooters->linkedinurl = $request->linkedinurl;
        $headerfooters->tweeterurl = $request->tweeterurl;
        $headerfooters->instagramurl = $request->instagramurl;
        $headerfooters->footerTitle = $request->footerTitle;
        $headerfooters->footerInfo = $request->footerInfo;
        $headerfooters->copyrights = $request->copyrights;
        $headerfooters->save();
        return back()
            ->with('message', 'Header and Footer Logos Uploaded Successfully!');
    }

    public function headerFooterUpdate(Request $request)
    {
        //return $request;
        $headerfooters = HeaderFooter::find($request->id);

        if ($request->hasFile('headerLogo'))
        {
            $headerlogos = '1' . time() . '.' . $request
                ->headerLogo
                ->getClientOriginalExtension();
            $request
                ->headerLogo
                ->move(('public/uploads') , $headerlogos);
            $headerfooters->headerLogo = $headerlogos;
        }

        if ($request->hasFile('footerLogo'))
        {
            $footerlogos = '2' . time() . '.' . $request
                ->footerLogo
                ->getClientOriginalExtension();
            $request
                ->footerLogo
                ->move(('public/uploads') , $footerlogos);
            $headerfooters->footerLogo = $footerlogos;
        }
        if ($request->hasFile('facebook'))
        {
            $facebooks = '3' . time() . '.' . $request
                ->facebook
                ->getClientOriginalExtension();
            $request
                ->facebook
                ->move(('public/uploads') , $facebooks);
            $headerfooters->facebook = $facebooks;
        }
        if ($request->hasFile('youtube'))
        {
            $youtubes = '4' . time() . '.' . $request
                ->youtube
                ->getClientOriginalExtension();
            $request
                ->youtube
                ->move(('public/uploads') , $youtubes);
            $headerfooters->youtube = $youtubes;
        }
        if ($request->hasFile('linkedin'))
        {
            $linkedins = '5' . time() . '.' . $request
                ->linkedin
                ->getClientOriginalExtension();
            $request
                ->linkedin
                ->move(('public/uploads') , $linkedins);
            $headerfooters->linkedin = $linkedins;
        }
        if ($request->hasFile('tweeter'))
        {
            $tweeters = '6' . time() . '.' . $request
                ->tweeter
                ->getClientOriginalExtension();
            $request
                ->tweeter
                ->move(('public/uploads') , $tweeters);
            $headerfooters->tweeter = $tweeters;
        }
        if ($request->hasFile('instagram'))
        {
            $instagrams = '7' . time() . '.' . $request
                ->instagram
                ->getClientOriginalExtension();
            $request
                ->instagram
                ->move(('public/uploads') , $instagrams);
            $headerfooters->instagram = $instagrams;
        }

        $headerfooters->facebookurl = $request->facebookurl;
        $headerfooters->youtubeurl = $request->youtubeurl;
        $headerfooters->linkedinurl = $request->linkedinurl;
        $headerfooters->tweeterurl = $request->tweeterurl;
        $headerfooters->instagramurl = $request->instagramurl;
        $headerfooters->footerTitle = $request->footerTitle;
        $headerfooters->footerInfo = $request->footerInfo;
        $headerfooters->copyrights = $request->copyrights;
        $headerfooters->save();
        return back()
            ->with('message', 'Header and Footer Logos Updated Successfully!');
    }

    public function headerFooterDelete($id)
    {
        $headerfooters = HeaderFooter::find($id);
        $headerfooters->delete();

        return back()
            ->with('error', 'Header and Footer Deleted Successfully!!');

    }

    public function seoIndex($id, $gender, $city)
    {
        // echo $city;
        // exit;
        // echo "City = ".$id."<br>";
        // echo "Gender = ".$gender."<br>";
        // echo "Country = ".$city;
        // echo "<prE>";
        $cities = DB::table('states')->where('id', '=', $id)->select()
            ->get();
        $countries = DB::table('countries')->where('id', '=', $city)->select()
            ->get();
        $seoList = DB::table('seo_city')->join('states', 'seo_city.city_id', '=', 'states.id')
            ->join('countries', 'states.country_id', 'countries.id')
            ->where([['seo_city.city_id', '=', $id], ['seo_city.gender', '=', $gender]])->select('seo_city.id as id', 'states.state as city', 'countries.country as country', 'seo_city.gender as gender', 'seo_city.description as description', 'seo_city.id', 'states.id as cityId')
            ->get();

        return view('admin.general_setting.seoCity.edit', ['seoList' => $seoList, 'city' => $city, 'id' => $id, 'gender' => $gender, 'cities' => $cities, 'countries' => $countries]);
    }

    public function seoUpdate(Request $request)
    {
        $ciytID = $request->cityid;
        $id = $request->id;
        $gender = $request->gender;
        $description = $request->description;
        $city = $request->city;
        DB::table('seo_city')
            ->where([['gender', '=', $gender], ['city_id', '=', $ciytID]])->update(['description' => $description]);
        return redirect()->route('admin.location.state', $city)->with('message', 'Manage City SEO Updated Successfully');
    }

    public function seoStore(Request $request)
    {
        $ciytID = $request->cityid;
        $gender = $request->gender;
        $description = $request->description;
        $city = $request->city;

        DB::table('seo_city')
            ->insert(['description' => $description, 'gender' => $gender, 'city_id' => $ciytID]);

        return redirect()->route('admin.location.state', $city)->with('message', 'Manage City SEO Updated Successfully');
    }

}

