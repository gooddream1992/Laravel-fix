<?php 
namespace App\Http\Controllers\escortBackEnd;

use Auth;
use DB;
use App\User;
use App\City;
use App\Country;
use App\ProfileRate;
use App\ServiceOffer;
use App\ProfileImage;
use App\EscortDropdown;
use App\ProfileWishlist;
use App\ProfileFavourite;
use App\ServiceOfferAssign;
use App\ProfileDescription; 
use App\ProfileAvailability;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EscortProfileController extends Controller
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
    public function index()
    {
        $services=\App\ServiceOffer::all();

        return view('escort.profile',['services'=>$services]);
    }


    /**
     *  Store Escort Availability
     * 
     * @param   \Illuminate\Http\Request
     */
    public function profileAvailabilityStore(Request $request)
    {
        $from = $request->hour_from;
        $to = $request->hour_to;
        $mon = $request->mon;

        foreach ($mon as $key => $value) {
            $from_hrs = $from[$key];
            $to_hrs = $to[$key];
            echo $week_day  = $value;
            echo "<br>";            
        }
    }

    
    /**
     * Store Escort Servie Offer
     * 
     * @param   \Illuminate\Http\Request
     */
    public function profileServiceOfferStore(Request $request)
    {
        print_r($request->service);
    }


    // SMPEDIT 13-10-2020
    /**
     * 
     */
    public function getUserId($id = null) {
        if (!is_null($id)) {
            if (User::find(Auth::user()->id)->roleStatus == 1) {
                return $id;
            }
        } 
        return Auth::user()->id;
    }

    /**
     * STEP 1 - Profile Stats 
     * Route name : profile.stats.index
     */
    public function getProfileStats($id = null)
    {   
        $id = $this->getUserId($id);

        $cities = City::all();
        $countries = Country::all();
        $escort = User::find($id);

        $dropdown_status = [
            'eyes' => 1, 
            'body_shape' => 2, 
            'nationality' => 4, 
            'hair' => 5,
            'test' => 10,
        ];

        $escort_dropdowns = [];

        foreach ($dropdown_status as $name => $status) {
            $escort_dropdowns[$name] = EscortDropdown::where('status', $status)->get();
        }

        return view('frontend.escort_dashboard.new.profile.profileStats', 
            compact('id', 'escort', 'countries', 'cities', 'escort_dropdowns'));
    }


    /**
     * STEP 1 - Profile Stats
     * 
     * @param  \Illuminate\Http\Request
     * 
     * @return  \Illuminate\Http\Response
     */
    public function updateProfileStats(Request $request, $id = null)
    {
        $id = $this->getUserId($id);

        User::find($id)->update([
            // Basic Information
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'country'   => $request->country,
            'city'      => $request->city,

            // Social Information
            'whatsup'   => $request->whatsapp,
            'snapchat'  => $request->snapchat,
            'instagram' => $request->instagram,
            'website'   => $request->website,

            // Other Information
            'state'     => $request->suburb,
            'gender'    => $request->gender,
            'straight'  => $request->straight,
            'height'    => $request->height,

            'age'       => $request->age,
            'hair'      => $request->hair,
            'eyes'      => $request->eyes,
            'dress'     => $request->dress,
            
            'bust'          => $request->bust,
            'bodyShape'     => $request->body_shape,
            'nationality'   => $request->nationality,
            'personal_type' => $request->personality_type,
            
            'pet'       => $request->services_offering,
            'drink'     => $request->drink,
            'food'      => $request->food,
            'service'   => $request->service_provider,
        ]);

        return back()->with('message', 'Profile Stats updated successfully');
    }


    /**
     * STEP 2 - Biography 
     * Route name : profile.biography.index
     */
    public function getProfileBiography($id = null)
    {
        $id = $this->getUserId($id);

        $about_me = ProfileDescription::where('escortId', Auth::user()->id)
            ->where('status', 2)->pluck('description')->first();

        $favourite = ProfileFavourite::where('escortId', Auth::user()->id)->first();

        $wishlist = ProfileWishlist::where('escortId', Auth::user()->id)->get();

        return view('frontend.escort_dashboard.new.profile.profileBiography', 
            compact('id', 'about_me', 'favourite', 'wishlist'));
    }


    /**
     * STEP 2 - Biography Update
     * 
     * @param  \Illuminate\Http\Request
     * 
     * @return  \Illuminate\Http\Response
     */
    public function updateProfileBiography(Request $request, $id = null)
    {
        $id = $this->getUserId($id);

        // About Me
        $profile_description = ProfileDescription::where('escortId', $id)->where('status', 2)->first();
        if ($profile_description) {
            $profile_description->update(['description' => $request->about_me]);
        } else {
            ProfileDescription::create([
                'status'        => 2,
                'escortId'      => $id,
                'description'   => $request->about_me
            ]);
        }

        // Favourite Things 
        $profile_favourite = ProfileFavourite::where('escortId', $id)->first();
        if ($profile_favourite) {
            $profile_favourite->tags = $request->tags;
            $profile_favourite->description = $request->description;
            $profile_favourite->save();
        } else {
            ProfileFavourite::create([
                'escortId'      => $id,
                'tags'          => $request->tags,
                'description'   => $request->description
            ]);
        }

        // Wishlist
        $images = $request->images;        

        // Images to Retain
        $retain_id = [];
        $retain_image = [];
        foreach ($images as $image) {
            if (array_key_exists('id', $image)) {
                if ( ! is_null($image['id'])) {
                    array_push($retain_id, $image['id']);  
                    array_push($retain_image, ProfileWishlist::find($image['id'])->image);
                }
            }
        }

        // Images to Remove
        $remove = ProfileWishlist::where('escortId', $id)
            ->whereNotIn('id', $retain_id)->get();
        foreach($remove as $remove_item) {
            File::delete(base_path('public/profile/' . $remove_item->image));
            ProfileWishlist::find($remove_item->id)->delete();
        }

        // Upload Create & Update
        for ($i = 0; $i < count($images); $i++) {
            $image_name = null;

            if (array_key_exists('id', $images[$i]) && isset($image['id'])) {
                if ( ! is_null($image['id'])) {

                    $wishlist_item = ProfileWishlist::find($images[$i]['id']);

                    if (array_key_exists('image', $images[$i])  && !is_null($images[$i]['image'])) {
                        $image_name = $images[$i]['image']->getClientOriginalName();
                        if ( ! in_array($wishlist_item->image, $retain_image)) {
                            File::delete(base_path('public/profile/' . $wishlist_item->image));
                        }
                        $images[$i]['image']->move('public/profile/', $image_name);

                        $wishlist_item->image = $image_name;
                    }

                    $wishlist_item->image_url = $images[$i]['url'];
                    $wishlist_item->save();
                }
            }

            if (array_key_exists($i, $images)) {
                if (array_key_exists('image', $images[$i]) && !is_null($images[$i]['image'])) {
                    $image_name = $images[$i]['image']->getClientOriginalName();
                    
                    $existing = ProfileWishlist::where('escortId', $id)
                        ->where('image', $image_name)
                        ->first();
                    
                    if (!$existing) {
                        $images[$i]['image']->move('public/profile/', $image_name);
                        ProfileWishlist::create([
                            'image'     => $image_name,
                            'escortId'  => $id,
                            'image_url' => $images[$i]['url'],
                        ]);
                        continue;
                    }
                }
            }
        }

        return back()->with('message', 'Biography updated successfully');
    }


    /**
     * STEP 3 - Services
     * Route name : profile.services.index
     */
    public function getProfileServices()
    {
        $id = Auth::user()->id;

        // Availability
        $week_days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        $availability = [];

        foreach ($week_days as $week_day) {
            $availability[$week_day] = ProfileAvailability::where('escortId', $id)
                ->where('weekday', ucfirst($week_day))
                ->first();
        }

        foreach ($availability as $week_day) {
            if ( ! is_null($week_day)) {
                $week_day->fromIndicator = Str::contains(Str::upper($week_day->fromDate), 'AM') ? 'AM' : 'PM';
                $week_day->untilIndicator = Str::contains(Str::upper($week_day->untilDate), 'AM') ? 'AM' : 'PM';
                $week_day->fromDate = trim(str_ireplace($week_day->fromIndicator, '', $week_day->fromDate));
                $week_day->untilDate = trim(str_ireplace($week_day->untilIndicator, '', $week_day->untilDate));
            }
        }

        // Services
        $services_available = ServiceOffer::orderBy('service')->get();

        // Services Offered
        $services_offered = ServiceOfferAssign::where('escortId', $id)->pluck('service');

        // Service Keywords
        $service_tags = ServiceOfferAssign::where('escortId', $id)
            ->where('service', 'LIKE', '%;T;%')->first();
        $tags_description = '';
        if ($service_tags) {
            $tags_description = $service_tags->description;
            $service_tags = implode(',', explode(';T;', $service_tags->service));
        } 

        // Rates
        $call_types = ['in_call' => 1, 'out_call' => 2];
        $rates = [];
        foreach ($call_types as $call_type => $status) {
            $profile_rates = ProfileRate::where('escortId', $id)
                ->where('status', $status)->latest()->get();

            foreach($profile_rates as $profile_rate) {
                $profile_rate->hours = str_replace(' Hours', '', $profile_rate->time);
                $rates[$call_type][] = $profile_rate;
            }
        }
        
        return view('frontend.escort_dashboard.new.profile.profileServices', 
            compact('week_days', 'availability', 'services_available', 'services_offered',
                'service_tags','tags_description', 'rates'));
    }


    /**
     * STEP 3 - Services
     * 
     * @param  \Illuminate\Http\Request
     * 
     * @return  \Illuminate\Http\Response
     */
    public function updateProfileServices(Request $request)
    {
        $id = Auth::user()->id;

        // Availability
        foreach ($request->availability as $day => $dayData) {
            $available24 = (array_key_exists('available24', $dayData) && $dayData['available24'] == 'on') ? true : false;

            $from = $available24 ? '1:00' : $dayData['from'];
            $from_indicator = $available24 ? 'AM' : $dayData['from_indicator'];
            $until = $available24 ? '1:00' : $dayData['until'];
            $until_indicator = $available24 ? 'AM' : $dayData['until_indicator'];
            
            $profile_availability = ProfileAvailability::where('escortId', $id)
                ->where('weekday', $day)->first();

            if ($profile_availability) {
                $profile_availability->fromDate     = $from . ' ' . $from_indicator;
                $profile_availability->untilDate    = $until . ' ' . $until_indicator;
                $profile_availability->available24  = $available24 ? 1 : 0;
                $profile_availability->description  = $dayData['description'];
                $profile_availability->save();
            } else {
                ProfileAvailability::create([
                    'escortId'      => $id,
                    'weekday'       => ucfirst($day),
                    'fromDate'      => $from . ' ' . $from_indicator,
                    'untilDate'     => $until . ' ' . $until_indicator,
                    'available24'   => $available24 ? 1 : 0,
                    'description'   => $dayData['description'],
                ]);
            }
        }

        // Services Offered
        $retain = [];
        foreach ($request->services_selected as $service => $status) {
            if ($status == 'on') {
                array_push($retain, $service);
                ServiceOfferAssign::firstOrCreate([
                    'escortId'  => $id,
                    'service'   => $service
                ]);
            }
        }

        $remove = ServiceOfferAssign::where('escortId', $id)
            ->whereNotIn('service', $retain)->get();
        foreach ($remove as $service) {
            $service->delete();
        }

        // Service Keywords
        // Tags are distinguised by ;T; in the service text
        $service_tags = implode(';T;', explode(',', $request->service_tags));
        $service_offer_assign = ServiceOfferAssign::where('escortId', $id)
            ->where('service', 'LIKE', '%;T;%')->first();

        if ($service_offer_assign) {
            $service_offer_assign->service = $service_tags;
            $service_offer_assign->description = $request->tags_description;
            $service_offer_assign->save();
        } else {
            ServiceOfferAssign::create([
                'escortId'      => $id,
                'service'       => $service_tags,
                'description'   => $request->tags_description,
            ]);
        }

        // Rates
        $retain_ids = [];
        foreach ($request->rates as $rates) {
            foreach ($rates as $rate) {
                if (!is_null($rate['hours']) && !is_null($rate['hours']) && !is_null($rate['hours'])) {
                    if (array_key_exists('id', $rate)) {                       
                        array_push($retain_ids, $rate['id']);
                        ProfileRate::find($rate['id'])->update([
                            'time'          => $rate['hours'] . ' Hours',
                            'price'         => $rate['price'],
                            'description'   => $rate['description'],
                        ]);
                    } else {
                        $new = ProfileRate::create([
                            'escortId'      => $id,
                            'status'        => $rate['status'],
                            'time'          => $rate['hours'] . ' Hours',
                            'price'         => $rate['price'],
                            'description'   => $rate['description']
                        ])->id;
                        array_push($retain_ids, (string) $new);
                    }
                }
            }
        }

        $remove = ProfileRate::where('escortId', $id)
            ->whereNotIn('id', $retain_ids)->get();
        foreach ($remove as $rate) {
            $rate->delete();
        }

        return back()->with('message', 'Services updated successfully');
    }
    /**
     * STEP 4 - Photos
     * Route name : profile.photos.index
     */
    public function getProfilePhotos()
    {
        $id = Auth::user()->id;

        $status = ['slider' => 1, 'gallery' => 2, 'video' => 3, 'selfie' => 4];
        $images = [];

        foreach ($status as $name => $code) {
            $images[$name] = ProfileImage::where('escortId', $id)
                ->where('status', $code)
                ->orderBy('updated_at', 'desc')
                ->get();
        }

        $thumbnail = User::find($id);

        return view('frontend.escort_dashboard.new.profile.profilePhotos', compact('images', 'thumbnail'));
    }

        
    /**
     * STEP 4 - Photos
     * Show Selected Photo
     *
     * @param  Integer $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function showProfilePhoto($id)
    {
        $image = ProfileImage::find($id);

        return view('frontend.escort_dashboard.new.profile.profilePhotosUpdate', compact('image'));
    }

    
    /**
     * STEP 4 - Photos
     * Route name : profile.photos.store
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function storeProfilePhoto(Request $request)
    {
        $id = Auth::user()->id;

        if ( ! is_null($request->status) && $request->hasFile('uploaded_image')) {
            $image = '9' . time() . '.' . $request->uploaded_image->getClientOriginalExtension();
            $request->uploaded_image->move('public/uploads' , $image);
            
            if ($request->status == 'thumbnail') {
                $old_image = User::find($id)->photo;
                File::delete(base_path('/public/uploads/' . $old_image));
                
                User::find($id)->update(['photo' => $image]);
            } else {
                ProfileImage::create([
                    'escortId'  => $id,
                    'status'    => $request->status,
                    'image'     => $image
                ]);
            }
            DB::table('notification')->insert([
                'notification_title'=>Auth::user()->name." uploaded a new profile image",
                'notification_content'=>Auth::user()->name." uploaded a new profile image",
                'user_id'=>$id
            ]);
            return redirect()->back()->with('message', 'Image uploaded successfully');
        }

        return back()->with('message', 'Failed to upload image!');
    }


    /**
     * STEP 4 - Photos 
     * Route name : profile.photos.update
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  Integer $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateProfilePhoto(Request $request, $id)
    {
        if ($request->hasFile('uploaded_image')) {
            $old_image = ProfileImage::find($id)->image;
            
            $new_image = '9' . time() . '.' . $request->uploaded_image->getClientOriginalExtension();
            $request->uploaded_image->move('public/uploads' , $new_image);

            ProfileImage::find($id)->update(['image' => $new_image]);

            File::delete(base_path('/public/uploads/' . $old_image));

            return redirect()->route('profile.photos.index')->with('message', 'Image updated successfully');
        }        
        return back()->with('message', 'Failed to update image!');
    }

    
    /**
     * STEP 4 - Photos
     * Route name : profile.photos.delete
     *
     * @param  Integer $id
     */
    public function deleteProfilePhoto($id)
    {
        $image = ProfileImage::find($id);
        File::delete(base_path('/public/uploads/' . $image->image));
        $image->delete();

        return redirect()->route('profile.photos.index')->with('message', 'Image deleted successfully');
    }

    
    /**
     * STEP 5 - Verification
     * Route name : profile.verification.index
     */
    public function getVerification()
    {
        $id = Auth::user()->id;

        $escort = User::find($id);
        $country = Country::find($escort->country);
        $city = City::find($escort->city);

        return view('frontend.escort_dashboard.new.profile.profileVerification', compact('escort', 'country', 'city'));
    }

    
    /**
     * STEP 5 - Verifcation
     * Route name : profile.verification.update
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateVerification(Request $request, $id)
    {   
        if ($request->has('terms_conditions') && $request->terms_conditions == 'on') {
            User::find($id)->update(['activation' => 1]);
            return back()->with('message', 'Account activated successfully');
        }

        return back()->with('error', 'Failed to activate account');
    }
    // SMPEDIT 13-10-2020 END
}