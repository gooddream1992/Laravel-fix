<?php 
namespace App\Http\Controllers\escortBackEnd;

use Auth;
use DB;
use App\User;
use Session;
use App\City;
use App\State;
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
        if ($id && (User::find(Auth::user()->id)->roleStatus == 1)) {
            return $id;
        }
        return Auth::user()->id;
    }

    /**
     * STEP 1 - Profile Stats 
     * Route name : profile.stats.index
     */
    public function getProfileStats($id = null) {
        $user = User::find($id);
        if($id!=null)
        {
            Auth::login($user);
            if(!Session::has('main_login_type'))
            {
                Session::put('main_login_type', Auth::user()->roleStatus);
            }
        }
        $id = ($id==null) ? $this->getUserId($id) : $id;

        $cities = State::select('id', 'country_id', 'state as city')->get();
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
        $social_media = DB::table('social_media')->select('*')->get();
        foreach ($dropdown_status as $name => $status) {
            $escort_dropdowns[$name] = EscortDropdown::where('status', $status)->get();
        }

        return view('frontend.escort_dashboard.new.profile.profileStats', 
            compact('id', 'escort', 'countries', 'cities', 'escort_dropdowns','social_media'));
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
        // $id = $this->getUserId($id);
        $id = ($id==null) ? $this->getUserId($id) : $id;
        $socail_media1 = $request->social_mediaVal1; 
        $socail_media2 = $request->social_mediaVal2;
        $socail_media3 = $request->social_mediaVal3;
        $social1 = $request->social1;
        $social2 = $request->social2;
        $social3 = $request->social3;
        // echo $request->service_provider;
        // exit;
        DB::table('users')->where('id','=',$id)->update([
            // Basic Information
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'country'   => $request->country,
            'state'     => $request->city,

            // Social Information
            'snapchat'   => $social1,
            'facebook'  => $social2,
            'whatsup'   => $social3,
            'sm_label_one'   => $socail_media1,
            'sm_label_two'  => $socail_media2,
            'sm_label_three'   => $socail_media3,

            // Other Information
            'city'      => $request->suburb,
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
            // 'food'      => $request->food,
            'serviceArea' =>$request->serviceArea,
            'service'   => $request->service_provider,
            'website'   => $request->website
         ] );
        // User::find($id)->update([
        //     // Basic Information
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'phone'     => $request->phone,
        //     'country'   => $request->country,
        //     'city'      => $request->city,

        //     // Social Information
        //     $socail_media1   => $social1,
        //     $socail_media2  => $social2,
        //     $socail_media3   => $social3,

        //     // Other Information
        //     'state'     => $request->suburb,
        //     'gender'    => $request->gender,
        //     'straight'  => $request->straight,
        //     'height'    => $request->height,

        //     'age'       => $request->age,
        //     'hair'      => $request->hair,
        //     'eyes'      => $request->eyes,
        //     'dress'     => $request->dress,
            
        //     'bust'          => $request->bust,
        //     'bodyShape'     => $request->body_shape,
        //     'nationality'   => $request->nationality,
        //     'personal_type' => $request->personality_type,
            
        //     'pet'       => $request->services_offering,
        //     'drink'     => $request->drink,
        //     'food'      => $request->food,
        //     'service'   => $request->service_provider,
        // ]);

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
        // $id = $this->getUserId($id);
        $id = ($id==null) ? $this->getUserId($id) : $id;
        // echo $request->about_me;
        // exit;
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

                DB::table('notification')->insert([
                    'notification_title'=>Auth::user()->name." updated their wishlist.",
                    'url'=> "profile/".$id,
                    'notification_content'=>Auth::user()->name." updated their wishlist.",
                    'user_id'=>$id
                ]);
            }
        }

        return back()->with('message', 'Biography updated successfully');
    }


    /**
     * STEP 3 - Services
     * Route name : profile.services.index
     */
    public function getProfileServices($id = null)
    {
        $id = $this->getUserId($id);

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
                $profile_rate->hours = $profile_rate->time;
                // $profile_rate->hours = str_replace(' Hours', '', $profile_rate->time);
                $rates[$call_type][] = $profile_rate;
            }
        }
        
        return view('frontend.escort_dashboard.new.profile.profileServices', 
            compact('id', 'week_days', 'availability', 'services_available', 'services_offered',
                'service_tags','tags_description', 'rates'));
    }


    /**
     * STEP 3 - Services
     * 
     * @param  \Illuminate\Http\Request
     * 
     * @return  \Illuminate\Http\Response
     */
    public function updateProfileServices(Request $request, $id = null)
    {
        
        // $id = $this->getUserId($id);
        $id = ($id==null) ? $this->getUserId($id) : $id;
        // echo "<pre>";
        // print_r($request->availability);
        // exit;
        // Availability
        foreach ($request->availability as $day => $dayData) {
            $available24 = (array_key_exists('available24', $dayData) && $dayData['available24'] == 'on') ? true : false;
            // echo "<prE>";
            // print_r($available24);
            $from = $available24 ? '1:00' : $dayData['from']; 
            //echo "<br>";
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
                // DB::table('notification')->insert([
                //     'notification_title'=>Auth::user()->name." changed their availability.",
                //     'url'=> "profile/".$id,
                //     'notification_content'=>Auth::user()->name." changed their availability.",
                //     'user_id'=>$id
                // ]);
        //exit;
        // Services Offered
        $retain = [];
        $selected_services = isset($request->services_selected) && !empty($request->services_selected) ? $request->services_selected : array();
        foreach ($selected_services as $service => $status) {
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
                            'time'          => ($rate['hours'] !='wyo') ? $rate['hours'] : $rate['hours_own'],
                            'price'         => $rate['price'],
                            'description'   => $rate['description'],
                        ]);
                    } else {
                        $new = ProfileRate::create([
                            'escortId'      => $id,
                            'status'        => $rate['status'],
                            'time'          => ($rate['hours'] !='wyo') ? $rate['hours'] : $rate['hours_own'],
                            'price'         => $rate['price'],
                            'description'   => $rate['description']
                        ])->id;
                        array_push($retain_ids, (string) $new);
                    }
                }
            }

            // DB::table('notification')->insert([
            //     'notification_title'=>Auth::user()->name." updated their rates",
            //     'url'=> "profile/".$id,
            //     'notification_content'=>Auth::user()->name." updated their rates",
            //     'user_id'=>$id
            // ]);
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
     * 
     * @param  Integer $id
     */
    public function getProfilePhotos($id = null)
    {
        $id = $this->getUserId($id);

        $status = ['slider' => 1, 'gallery' => 2, 'video' => 3, 'selfie' => 4, 'thumbnail' => 5];
        $images = [];

        foreach ($status as $name => $code) {
            $images[$name] = ProfileImage::where('escortId', $id)
                ->where('status', $code)
                ->orderBy('updated_at', 'desc')
                ->get();
                
        }

        $thumbnail = User::find($id);
        
        return view('frontend.escort_dashboard.new.profile.profilePhotos', compact('id', 'images', 'thumbnail'));
    }

        
    /**
     * STEP 4 - Photos
     * Show Selected Photo
     *
     * @param  Integer $id
     * @param  Integer $imageId
     * 
     * @return \Illuminate\Http\Response
     */
    public function showProfilePhoto($id = null, $imageId)
    {
        $image = ProfileImage::find($imageId);

        return view('frontend.escort_dashboard.new.profile.profilePhotosUpdate', compact('id', 'image'));
    }

    
    /**
     * STEP 4 - Photos
     * Route name : profile.photos.store
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integer $id
     */
    public function storeProfilePhoto(Request $request, $id = null)
    {
        $id = $this->getUserId($id);

        $files = $request->file('uploaded_image');
        
        if ( ! is_null($request->status) && $request->hasFile('uploaded_image')) {            
            if ($request->status == 'thumbnail') {
                if(isset($request->old_photo) && !empty($request->old_photo)){
                    DB::table('profile_images')->where([
                        ['escortId','=',$id],
                        ['status','=',5]
                    ])->delete();
                    File::delete(base_path('/public/uploads/'.$request->old_photo));
                }                
                // User::find($id)->update(['photo' => $old_image]);
                $i = 0;

                foreach($files as $value){
                    $image = $i++ . time() . '.' . $value->getClientOriginalExtension();                   
                    $value->move('public/uploads' , $image);
                    ProfileImage::create([
                        'escortId'  => $id,
                        'status'    => 5,
                        'image'     => $image
                    ]);
                }
            } else {
                $i = 0;

                foreach($files as $value){
                    $image = $i++ . time() . '.' . $value->getClientOriginalExtension();                   
                    $value->move('public/uploads' , $image);
                    ProfileImage::create([
                        'escortId'  => $id,
                        'status'    => $request->status,
                        'image'     => $image
                    ]);
                }
                
            }

            
            $upload_type = "";
            if($request->status=='1')
            {
                $upload_type="Slider";
            }
            if($request->status=='2')
            {
                $upload_type="Gallery Image";
            }
            if($request->status=='3')
            {
                $upload_type="Video";
            }
            if($request->status=='4')
            {
                $upload_type="Selfie";
            }
            if($request->status=='thumbnail')
            {
                $upload_type="Thumbnail";
            }
            DB::table('notification')->insert([
                'notification_title'=>Auth::user()->name." uploaded a new ".$upload_type,
                'url'=> "profile/".$id,
                'notification_content'=>Auth::user()->name." uploaded a new ".$upload_type,
                'user_id'=>$id
            ]);
            return back()->with('message', 'Image uploaded successfully');
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

            return back()->with('message', 'Image updated successfully');
        }        
        return back()->with('message', 'Failed to update image!');
    }

    
    /**
     * STEP 4 - Photos
     * Route name : profile.photos.delete
     *
     * @param  Integer $id User ID
     * @param  Integer $imageId Image ID
     */
    public function deleteProfilePhoto($id = null, $imageId)
    {
        // User id for redirection only
        $id = $this->getUserId($id);
        
        $image = ProfileImage::find($imageId);
        File::delete(base_path('/public/uploads/' . $image->image));
        $image->delete();

        return redirect()->route('profile.photos.index', $id)->with('message', 'Image deleted successfully');
    }


    // DISABLED ON CLIENT'S REQUEST
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

        return view('frontend.escort_dashboard.new.profile.profileVerification', compact('escort', 'country', 'city','id'));
    }

    
    // DISABLED ON CLIENT'S REQUEST
    /**
     * STEP 5 - Verifcation
     * Route name : profile.verification.update
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateVerification(Request $request, $id) {

        if(!empty($request->verification)){
            $old_photo = Auth::user()->verification_photo;
            if(isset($old_photo)){
                // unlink("public/verification/".$old_photo);    
            }          

            $img = $request->verification;
            $folderPath = "public/verification/";

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . time() . '.'.$image_type;
            $image = time() . '.'.$image_type;
            file_put_contents($file, $image_base64);
            DB::table('users')->where('id','=',$id)->update(
                            ['verification_photo'=>$image,'request'=>'0']
               );
        }
        
        // exit;
        
        $files = $request->file('verification_self');
        if($request->hasFile('verification_self')) {
            $old_photo = Auth::user()->verification_photo;
            if(isset($old_photo)){
                // unlink("public/verification/".$old_photo);    
            }          
            $image = time() . '.' . $request->verification_self->getClientOriginalExtension();            
            $request->verification_self->move('public/verification' , $image);
            DB::table('users')->where('id','=',$id)->update(
                ['verification_photo'=>$image,'request'=>'0']
            );
        }

        return redirect()->back()->with('message','Your Verification Photo Uploaded Successfully! ');
    }

    // SMPEDIT 13-10-2020 END

    public function delete($userId, $id,$imageId){
        $userId =  $this->getUserId($userId);
        
        $file = "public/uploads/".$imageId; 
        DB::table('profile_images')->where([
            ['id','=',$id],
            ['escortId','=',$userId]
            ])->delete();
            unlink($file);
            return redirect()->route('profile.photos.index', $userId)->with('message', 'Image deleted successfully');
    }

    public function moveLoginAdmin()
    {
        $user = User::find('1');
        Auth::login($user);
        return redirect()->route('admin.escort.profile.request');
    }
}