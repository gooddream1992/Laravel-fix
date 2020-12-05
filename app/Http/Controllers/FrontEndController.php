<?php
namespace App\Http\Controllers;

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
use DateTime;
use App\State;
use Illuminate\Support\Collection; 

class FrontEndController extends Controller
{

    public function exploreCities()
    {
        return redirect()->route('index');
        $countries = \App\Country::all();
        return view('frontend.pages.exploreCities', ['countries' => $countries]);
    }
    public function exploreState(Request $request)
    {
        $state_id = $request->state_id;
        $statecount = \App\State::all()->where('country_id', $request->country);
        $html = '';

        $html .= "<option value=''>Select State</option>";

        foreach ($statecount as $value)
        {

            $html .= "<option value='" . $value->id . "' ";
            $html .= $value->id == $state_id ? 'selected' : '';
            $html .= '>' . $value->state;
            $html .= "</option>";

        }
        return $html;
    }
    public function exploreCity(Request $request){
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

    public function businessEtiquete()
    {
        $business_etiquetes = DB::table('business_etiquetes')->select()->get();
        return view('frontend.pages.businessEtiquete',['business_etiquetes'=>$business_etiquetes]);
    }

    public function ourStory()
    {

        return view('frontend.pages.ourStory');
    }
    public function termsCondition()
    {
        $terms = DB::table('terms')->select()->get();
        return view('frontend.pages.termsCondition',['terms'=>$terms]);
    }

    public function privacystatement(){
        $privacy_statement = DB::table('privacy_statement')->select()->get();
     return view('frontend.pages.privacystatement',['privacy_statement'=>$privacy_statement]);   
    }

    public function copyright(){
        $copyright = DB::table('copy')->select()->get();
     return view('frontend.pages.copyright',['copyright'=>$copyright]);   
    }

    public function acceptable(){
        $acceptable = DB::table('acceptable')->select()->get();
     return view('frontend.pages.acceptable',['acceptable'=>$acceptable]);   
    }

    

    public function disclaimer(){
        $disclaimer = DB::table('disclaimer')->select()->get();
        return view('frontend.pages.disclaimer',['disclaimer'=>$disclaimer]);   
    }

    public function faq()
    {

        return view('frontend.pages.faq');
    }
    public function clientMembership()
    {

        return view('frontend.pages.clientMembership');
    }

    public function clientLogin()
    {

        return view('frontend.pages.clientLogin');
    }
    public function forgotpassword(){
        return view('frontend.pages.clientforgotpwd');
    }
    public function forgotpasswordsentemail(Request $request){
        $email = $request->email;
        $users = DB::table('users')->where('email','=',$email)->select('id','name','email','roleStatus')->get();
        if(!empty($users->toArray()))
        {
            $users[0]->id;
            $data = array(
                'name' => $users[0]->name,
                'email' => $users[0]->email,
                'usersId' => $users[0]->id,
                'role'=>$users[0]->roleStatus
            );
            Mail::send('clientforgotpassword', $data, function ($message) use ($data)
            {
                $message->to($data['email'], 'Honey Luxe')->subject('Reset Password');
                $message->from('irishcharmer192@gmail.com', 'Honey Luxe');
            });
            return redirect('/')
                ->with('message', "We have sent an email with a link to your email address for Forgot Password. In order to Reset Your Password.");    
        }else{
            return redirect('/')->with('message',"Your Not Register With Us");
        }
        
    }

    public function resetpasswordbyemail($id,$name){
        return view('frontend.pages.newpassword',['id'=>$id,'name'=>$name]);
    }

    public function getNotification()
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->roleStatus;
        $user_id = (Auth::user())->id;
        if($user_role=='2')
        {
            $notifications = DB::table('notification')
                ->join('users','users.id','notification.client_id')
                ->where([
                    ['notification.type','=','escort'],
                    ['notification.user_id',$user_id],
                    ['is_readed','=','0']
                ])
                ->orderBy('created_on','desc')->get();
            $notification_count = count($notifications);
        }
        elseif($user_role=='3')
        {
            $data = DB::table('follows')->where([['custId',$user_id],['status','1']])->get();
            $id_arr = array();
            $notifications = array();
            if(count($data)>0)
            {
                foreach ($data as $follow_details) 
                {
                $id_arr[] = $follow_details->escortId;
                }
                $notifications = DB::table('notification')
                    ->join('users','notification.user_id','users.id')
                    ->whereNull('notification.type')
                    ->whereIn('notification.user_id',$id_arr)
                    ->where('is_readed','=','0')
                    ->orderBy('notification.created_on','desc')
                    ->get();
            }
        }
        
        $nlist = '';
        $notification_count = count($notifications);
        if(!empty($notifications->toArray())){

            foreach ($notifications as $notification_details) {

                $since_start = new DateTime($notification_details->created_on);
                $start_date = $since_start->diff(new DateTime(now()));
                if($start_date->s!='0')
                {
                    $notification_time = $start_date->s.' seconds ago';
                }
                if($start_date->i!='0')
                {
                    $notification_time = $start_date->i.' minutes ago';
                }
                if($start_date->h!='0')
                {
                    $notification_time = $start_date->h.' hours ago';
                }
                if($start_date->d!='0')
                {
                    $notification_time = $start_date->d.' days ago';
                }
                if($start_date->m!='0')
                {
                    $notification_time = $start_date->m.' months ago';
                }
                if($start_date->y!='0')
                {
                    $notification_time = $start_date->y.' years ago';
                }

            //     <div class="user-img">
            //     <img  src="'.asset("public/uploads/".$notification_details->photo).'" height="45" width="45" />
            // </div>
            $noti_link = $notification_details->feed_id != '' ? "escort/feed#".$notification_details->feed_id : $notification_details->url ;
        
                    $nlist .= '<li> 
                        <div class="notify-text">
                        <a href="/'.$noti_link.'">
                        <h5>'.$notification_details->notification_title.'</h5>
                        <p>'.$notification_time.'</p>
                        </a>
                        </div>
                        </li>';
                    }
                    
        }else{
            $nlist .= '<li> 
                        <div class="notify-text">
                            <a href="#">
                                <h5>No Unread Notification</h5>
                                <p></p>
                            </a>
                        </div>
                    </li>';
        }
        
        echo $nlist;
        
    }
    
    public function storenewpassword(Request $request){
        $id = $request->id;
        $name = $request->name;
        $password = Hash::make($request->password);

        $validatedData = $request->validate([
                'password' => 'required',
                'cpassword' => 'required | same:password'
        ],
        [
            'password.required'=>"* Please Enter Your Password",
            'cpassword.required'=>"* Please Enter Your Confirm Password",
            'cpassword.same'=>"Password And Confirm Password Doesn't Match"
        ]);
        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['password' => $password]);
        return redirect('/')->with('message', "Your Password is Reset.");
    }

    public function clientSignup()
    {

        return view('frontend.pages.clientSignup');
    }
    public function escortLogin()
    {

        return view('frontend.pages.escortLogin');
    }
    public function escortSignup()
    {

        return view('frontend.pages.escortSignup');
    }

    public function profile($id)
    {
        //echo Auth::user()->id;
        $escorts= \App\User::all()->where('id', $id);
        $feedsimages= \App\Feed::orderBy('id','desc')->where('status', 0)->limit(1)->get();
        $feedsvideotext= \App\Feed::orderBy('id','desc')->where('status', 2)->limit(1)->get();
        $feedstext= \App\Feed::orderBy('id','desc')->where('status', 1)->limit(1)->get();
        $pfsliders= \App\ProfileImage::all()->where('escortId', $id)->where('status', 1); 
        $feed_data= DB::table('feeds')->where([['escortId', $id]])->get(); 
        $testimonials= DB::table('testimonials')->join('users', 'testimonials.client_id', '=', 'users.id')->select('testimonials.*','users.name','users.photo')->where([['escort_id', $id],['status', '1']])->get(); 
        $friend_data = array();
        if(isset(Auth::user()->id)){
            $friend_data= DB::table('friend_list')
                ->where([
                    ['escortId', $id],
                    ['cust_id', Auth::user()->id]
                ])
                ->get(); 

        }
        $pfsliders1= \App\ProfileImage::orderBy('id', 'desc')->where('escortId', $id)->where('status', 1)->first(); 
        $profile_favourites = \App\ProfileFavourite::where('escortId', $id)->first(); // SMPEDIT 15-10-2020
        $favourites_decription = DB::table('profile_favourites')->where('escortId', $id)->select('description')->get();
        $wish_lists = \App\ProfileWishlist::where('escortId', $id)->get(); // SMPEDIT 15-10-2020
        $city = \App\City::find(\App\User::find($id)->city); // SMPEDIT 20-10-2020
        $social_media = DB::table('social_media')->select('*')->get();
        
        $dt = Carbon::yesterday();
        $getmonths= DB::table('profile_tours')
            ->select('id','startDate','endDate','city')
            ->where('escortId','=',$id)
            ->where('startDate','<=',date('Y-m-d'))
            ->where('endDate','>=',date('Y-m-d'))
            ->limit(1)
            ->get();
                
            $follow_arr = array();
            $all_liked_records = array();
            $comment_text = array();
            $comment_photo = array();
            $comment_name = array();
            $feed_arr = array();

            $profile_image = NULL;
            $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$id)->get();
            if(count($profile_image_arr) > 0)
            {
                    $profile_image = $profile_image_arr[0]->image;
            }

            if($profile_image==NULL)
                    $escort_prodile_image_path = asset('public/blankphoto.png');
            else  
                    $escort_prodile_image_path = asset('public/uploads/'.$profile_image);
            $follow_arr[] = $id;
            if(count($follow_arr) > 0)
            {
                $feed = DB::table('feeds')
                    ->whereIn('escortId', $follow_arr)
                    ->orderBy('id','desc')
                    ->get();
    
                if (count($feed) > 0) 
                {
                    foreach ($feed as $feed_details) 
                    {
                        $feed_arr[] = $feed_details->id;
                    }
                }

                if(count($feed_arr) > 0)
                {
                    $all_liked_records = DB::table('feed_update')
                    ->join('users','users.id','feed_update.cust_id')
                    ->select('*','feed_update.id as feed_update_id')
                    ->whereIn('feed_update.feed_id', $feed_arr)
                    ->orderBy('feed_update.id','desc')
                    ->get();
                }
            }

            
        // }

        $like_data = array();
        $comment_data = array();
        if(count($all_liked_records) > 0)
        {
            foreach ($all_liked_records as $details) 
            {
                if($details->like == '1')
                {
                    $like_data[$details->feed_id][] = $details->cust_id;
                }
                else
                {
                    $comment_data[$details->feed_id][] = $details->cust_id; 
                    $comment_text[$details->feed_id][] = $details->comment;
                    $comment_id[$details->feed_id][] = $details->feed_update_id;
                    $comment_photo[$details->feed_id][] = $details->cust_id == $id ? $profile_image : $details->photo; 
                    $comment_name[$details->feed_id][] = $details->name;        
                }
            }
        }
        $comment_ids = isset($comment_id) ? $comment_id : '';
        $data = array(
            'escorts'=>$escorts,
            'id'=>$id,
            'feedsimages'=>$feedsimages,
            'feed_data'=>$feed_data,
            'testimonials'=>$testimonials,
            'feedsvideotext'=>$feedsvideotext,
            'feedstext'=>$feedstext,
            'pfsliders'=>$pfsliders,
            'friends_data'=>$friend_data,
            'pfsliders1'=>$pfsliders1,
            'profile_favourites' => $profile_favourites ? explode(',', $profile_favourites->tags) : [], // SMPEDIT 15-10-2020
            'favourites_decription' =>$favourites_decription,
            'wish_lists' => $wish_lists, // SMPEDIT 15-10-2020
            'city' => $city, // SMPEDIT 20-10-2020
            'social_media' =>$social_media,
            'getmonths' => $getmonths,
            'feed'=>$feed,
            'like_data'=>$like_data,
            'comment_data'=>$comment_data,
            'comment_text'=>$comment_text,
            'comment_photo'=>$comment_photo,
            'comment_id'=>$comment_ids,
            'comment_name'=>$comment_name,
            'escort_prodile_image_path'=>$escort_prodile_image_path
        );
        return view('frontend.pages.profile', $data);
    }

    public function SendFriendRequest($id)
    {
        DB::table('friend_list')->insert([
            'escortId'=>$id,
            'cust_id'=>Auth::user()->id
        ]);
        return redirect()->action('FrontEndController@profile',$id);
    }
    

    public function UnFriendRequest($id)
    {
        DB::table('friend_list')->where([
            'escortId'=>$id,
            'cust_id'=>Auth::user()->id
        ])->delete();
        return redirect()->action('FrontEndController@profile',$id);
    }
    
    public function frontBecomeEscort()
    {
        $total_stauses = BecomeEscort::max('status');
        for ($i = 1; $i <= $total_stauses; $i++) {
            $section[$i] = BecomeEscort::where('status', $i)->first();
        }
        $sections = BecomeEscort::where([
            ['status','=',6],
            ['sub_title','!=',NULL]
        ])->get();

        return view('frontend.provider.frontBecomeEscort',['sections'=>$sections,'section'=>$section]);
    }

    public function frontBlog(Request $request)
    {
        $countries = Country::all();

        $gender = null;
        $state_id = null;
        $country_id = null;

        if ($request->gender && $request->state_id && $request->country_id) {
            session()->put('country_id', $request->country_id);
            session()->put('city_id', $request->state_id);
            session()->put('gender', $request->gender);
        }

        if (session()->has('gender')) $gender = session()->get('gender');
        if (session()->has('city_id')) $state_id = session()->get('city_id');
        if (session()->has('country_id')) $country_id = session()->get('country_id');

        if ($gender && $state_id && $country_id) {
            $blogs = Blog::where('publishBy', 1)
                ->where('gender', $gender)
                ->where('state_id', $state_id)
                ->where('country_id', $country_id)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        } else {
            $blogs = Blog::where('publishBy', 1)->orderBy('created_at', 'desc')->paginate(9);
        }
        
        return view('frontend.provider.frontBlog', compact('blogs', 'countries', 'country_id', 'state_id', 'gender'));
    }

    // SMPEDIT 22-10-2020
    public function frontBlogDetails($id)
    {
        $blog = Blog::find($id);
        $creator = User::find($blog->publishBy);
        $comments = DB::table('blog_comments')->where('blog_id', $id)
            ->leftJoin('users', 'users.id', '=', 'blog_comments.user_id')
            ->select('blog_comments.*', 'users.name as userName', 'users.photo as userImage')
            ->get();

        return view('frontend.provider.frontBlogDetails', compact('blog', 'creator', 'comments'));
    }

    public function frontAdminBlogDetails($id)
    {
        $blog = Blog::find($id);
        $creator = User::find($blog->publishBy);
        $comments = DB::table('blog_comments')->where('blog_id', $id)
            ->leftJoin('users', 'users.id', '=', 'blog_comments.user_id')
            ->select('blog_comments.*', 'users.name as userName', 'users.photo as userImage')
            ->get();

        return view('frontend.provider.frontAdminBlogDetails', compact('blog', 'creator', 'comments'));
    }

    public function storeBlogComment(Request $request, $id)
    {
        if ($request->comment) {
            BlogComment::create([
                'blog_id'   => $id,
                'user_id'   => Auth::user()->id ?? null,
                'name'      => $request->name,
                'email'     => $request->email,
                'comment'   => $request->comment
            ]);
        }

        if ($request->save_details == 'on') {
            return redirect()->route('multi.blog.details', $id)
                ->withCookie(cookie()->forever('blog_form', "$request->name;$request->email"));
        } else {
            return redirect()->route('multi.blog.details', $id)
                ->withCookie(cookie()->forever('blog_form', ";"));
        }
    }

    public function storeAdminBlogComment(Request $request, $id)
    {
        if ($request->comment) {
            BlogComment::create([
                'blog_id'   => $id,
                'user_id'   => Auth::user()->id ?? null,
                'name'      => $request->name,
                'email'     => $request->email,
                'comment'   => $request->comment
            ]);
        }

        if ($request->save_details == 'on') {
            return redirect()->route('admin.blog.details', $id)
                ->withCookie(cookie()->forever('blog_form', "$request->name;$request->email"));
        } else {
            return redirect()->route('admin.blog.details', $id)
                ->withCookie(cookie()->forever('blog_form', ";"));
        }
    }

    public function frontReviewDetails($id)
    {
        $review = Testimonial::find($id);
        $escort = User::find($review->escort_id);
        $client = User::find($review->client_id);
        return view('frontend.provider.frontReviewDetails', compact('review', 'escort', 'client'));
    }
    // SMPEDIT 22-10-2020 END

    public function frontLocalResources()
    {
        $resources2 =\App\LocalResource::all()->where('status', 2);
        $escorts =\App\User::all()->where('roleStatus', 2);
        $health = DB::table('local_resorces_data')->where('section','=','healthcare')->select('*')->get();
        $legal = DB::table('local_resorces_data')->where('section','=','Legal Advice')->select('*')->get();
        $photographers = DB::table('local_resorces_data')->join('cities','cities.id','local_resorces_data.suburb')->where('local_resorces_data.section','=','Photographers')->select('*')->get();
        return view('frontend.provider.frontLocalResources',['resources2'=>$resources2,'escorts'=>$escorts,'health'=>$health,'legal'=>$legal,'photographers'=>$photographers]);
    }

    public function frontPurchaseMarketing()
    {
        $data = DB::table('purchasemarketingData')->select('*')->get();
        /*foreach ($data as $key => $value) {
            echo $value->id."<br>";
            echo "<br>";
            echo $out = strlen($value->description) > 450 ? substr($value->description,0,450)."..." : $value->description;

        }
        exit;*/
        return view('frontend.provider.frontPurchaseMarketing',['data'=>$data]);
    }
    public function readmore_purchase($id){
        $data = DB::table('purchasemarketingData')->where('id','=',$id)->select('*')->get();
     return view('frontend.provider.readmore_purchase',['data'=>$data]);   
    }

    public function frontSexTrafficking()
    {
        return view('frontend.provider.frontSexTrafficking');
    }

    public function getCityAjax(Request $request)
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

    // SMPEDIT 22-10-2020
    public function multiPage(Request $request)
    {
        
        
        $country_id = isset($request->country_id) ? $request->country_id : NULL;
        $city_id = isset($request->city_id) ? $request->city_id : NULL;
        $gender = isset($request->gender) ? $request->gender : NULL;

        
        if(isset($_REQUEST['country']) && !is_numeric($_REQUEST['country'])){
            $get_country = str_replace("-"," ",$_REQUEST['country']);
            $country_data = DB::table('countries')->where('country','=',$get_country)->select()->first();
            $country_id = isset($country_data->id) ? $country_data->id : NULL;
        }else{
            $country_id = isset($_REQUEST['country']) ? $_REQUEST['country'] : (isset($country_id) ? $country_id : NULL);
        }

        if(isset($_REQUEST['city']) && !is_numeric($_REQUEST['city'])){
            $get_city = str_replace("-"," ",$_REQUEST['city']);
            $city_data = DB::table('states')->where('state','=',$get_city)->select()->first();
            $city_id = isset($city_data->id) ? $city_data->id : NULL; 
        }else{
            $city_id = isset($_REQUEST['city']) ? $_REQUEST['city'] : (isset($city_id) ? $city_id : NULL);
        }
        if(isset($_REQUEST['gender']) && !empty($_REQUEST['gender']) && !is_numeric($_REQUEST['gender'])){
         $gender = ($_REQUEST['gender'] == "Male" ? 1 : ($_REQUEST['gender'] == "Female" ? 2 : ($_REQUEST['gender'] == "Trans Gender" ? 3  : 4)));
        }else{
            $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : (isset($gender) ? $gender : NULL);
        }
        $tabValue = $request->tabs; 
        $countries = Country::all();

        // if ($request->country_id) {  
        //     session()->put('country_id', $request->country_id);
        // }
        // else
        // {

        //     if (session()->has('country_id')) $country_id = session()->get('country_id');
        // }
        // if($request->city_id)
        // {
        //     session()->put('city_id', $request->city_id);
        // }
        // else
        // {

        // if (session()->has('city_id')) $city_id = session()->get('city_id');
        // }

        // if($request->gender)
        // {   
        //     session()->put('gender', $request->gender);
        // }
        // else
        // {

        // if (session()->has('gender')) $gender = session()->get('gender');
        // }
        
            
        if (is_null($gender) && is_null($city_id) && is_null($country_id)) {
            // session()->put('gender', $gender);
            // session()->put('city_id', $city_id);
            // session()->put('country_id', $country_id);

            $reviews = DB::table('testimonials')->where('testimonials.status', '1')
                ->leftJoin('users as escort', 'testimonials.escort_id', '=', 'escort.id')
                ->leftJoin('users as client', 'testimonials.client_id', '=', 'client.id')
                ->where('escort.request','=',1)
                ->select('testimonials.*', 'escort.name as escortName', 'escort.photo as escortImage', 'client.name as clientName','client.photo as clientphoto')
                ->limit(5)
                ->get();
              
            $blogs = Blog::where('role', 2)->limit(8)->get();
            $escorts = User::where('roleStatus', 2)->limit(8)->get();
            $client_blogs = Blog::where('role', 3)->limit(8)->get();
            $es_where = array();

            $tour_es_ids = DB::table('profile_tours')
            ->where($es_where)
            ->pluck('escortId as id');
                $tour_new = array();
                $where_cond = array();
                if($country_id!='')
                {
                    $where_cond['profile_tours.country'] = $country_id;
                }
                if($city_id!='' && $city_id > '0')
                {
                    $where_cond['profile_tours.city'] = $city_data[0];
                }
                if($gender!='')
                {
                    $where_cond['users.gender'] = $gender;
                }
                $city = isset($city) ? $city : NULL;
                if(isset($tour_es_ids) && count($tour_es_ids) > 0 ){

                    $tour_new = DB::table('profile_tours')
                    ->leftjoin('users','profile_tours.escortId','users.id')
                    ->where(
                        $where_cond
                    )
                    ->whereIn(
                        'profile_tours.escortId',$tour_es_ids
                    )
                     ->select('profile_tours.escortId as escortId','profile_tours.id as id','profile_tours.status as status','profile_tours.country as country','profile_tours.city as city','profile_tours.startDate as startDate','profile_tours.endDate as endDate','profile_tours.booked as booked','profile_tours.description as description','profile_tours.created_at as created_at','profile_tours.updated_at as updated_at','users.gender','users.name as name','users.state as state','users.city as userCity','users.serviceArea as serviceArea','users.height as height','users.activation as activation')
                    ->get();

                }
                /*$tour_new->unique('profile_tours.escortId as escortId')*/
            return view('frontend.provider.multiPage', 
                compact('gender', 'city_id', 'country_id', 'reviews', 'blogs', 'client_blogs', 'countries', 'escorts','tabValue','tour_new'));
        }
        $escort_ids = [];
        $client_ids = [];

        if ($country_id && is_null($city_id) && is_null($gender)) {

            $escort_ids = User::where('country', $country_id)
            ->where('users.request','=',1)
                ->where('roleStatus', 2)
                ->pluck('id');

            $client_ids = User::where('country', $country_id)
            ->where('users.request','=',1)
                ->where('roleStatus', 3)
                ->pluck('id');

        } 
            
        if ($country_id && $city_id && is_null($gender)) {
            $escort_ids = User::where('country', $country_id)
            ->where('users.request','=',1)
                ->where('state', $city_id)
                ->where('roleStatus', 2)
                ->pluck('id');

            $client_ids = User::where('country', $country_id)
            ->where('users.request','=',1)
                ->where('state', $city_id)
                ->where('roleStatus', 3)
                ->pluck('id');
        }
        $tour_es_ids = array();
        $where_cond_rev = array();

        if($country_id!='')
        {
            $where_cond_rev['country'] = $country_id;
        }
        if($city_id!='' && $city_id > '0')
        {
            $where_cond_rev['state'] = $city_id;
        }
        if($gender!='')
        {
            $where_cond_rev['gender'] = $gender;
        }
        // if ($gender && $city_id && $country_id) {

            $escort_ids = User::where('users.request','=',1)
            ->where($where_cond_rev)
            ->where('roleStatus', 2)
            ->pluck('id');
        // }
        $es_where = array();

        if($country_id!='')
        {
            $es_where['country'] = $country_id;
        }

        if($city_id!='')
        {
            $state_name = DB::table('states')->where('id','=',$city_id)->get();
            $es_where['city'] = $state_name[0]->id;
        }

        $tour_es_ids = DB::table('profile_tours')
        ->where($es_where)
        ->pluck('escortId as id');
        $client_ids = User::where('roleStatus', 3)
            ->where($where_cond_rev)
            ->pluck('id');

        $reviews = DB::table('testimonials')->where('testimonials.status', '1')
            ->whereIn('escort_id', $escort_ids)
            ->leftJoin('users as escort', 'testimonials.escort_id', '=', 'escort.id')
            ->leftJoin('users as client', 'testimonials.client_id', '=', 'client.id')
            ->select('testimonials.*', 'escort.name as escortName', 'escort.photo as escortImage', 'client.name as clientName','client.photo as clientphoto')
            ->get();


        $escorts = User::whereIn('id', $escort_ids)->where('users.request','=',1)->get();
        $touring_escorts = User::whereIn('id', $tour_es_ids)->where('users.request','=',1)->get();
        
        $blogs = Blog::whereIn('publishBy', $escort_ids)->get();
        $client_blogs = Blog::whereIn('publishBy', $client_ids)->get();

        $city_data  = DB::table('states')->where('id','=',$city_id)->select()->pluck('id');
            
            $tour_new = array();
            $where_cond = array();
            if($country_id!='')
            {
                $where_cond['profile_tours.country'] = $country_id;
            }
            if($city_id!='' && $city_id > '0')
            {
                $where_cond['profile_tours.city'] = $city_data[0];
            }
            if($gender!='')
            {
                $where_cond['users.gender'] = $gender;
            }
            $city = isset($city) ? $city : NULL;

            if(isset($tour_es_ids) && count($tour_es_ids) > 0 ){
             // DB::enableQueryLog();
                $tour_new = DB::table('profile_tours')
                ->leftjoin('users','profile_tours.escortId','users.id')
                ->where(
                    $where_cond
                )
                ->whereIn(
                    'profile_tours.escortId',$tour_es_ids
                )
                 ->select('profile_tours.escortId as escortId','profile_tours.id as id','profile_tours.status as status','profile_tours.country as country','profile_tours.city as city','profile_tours.startDate as startDate','profile_tours.endDate as endDate','profile_tours.booked as booked','profile_tours.description as description','profile_tours.created_at as created_at','profile_tours.updated_at as updated_at','users.gender','users.name as name','users.state as state','users.city as userCity','users.serviceArea as serviceArea','users.height as height','users.activation as activation')
                ->get();
             // dd(DB::getQueryLog());

            }

            return view('frontend.provider.multiPage',compact('gender','touring_escorts', 'city_id', 'country_id', 'reviews', 'blogs', 'client_blogs', 'countries', 'escorts','tour_new','tabValue')); 
    }


    // public function searchMultiPageBlog(Request $request)
    // {
    //     $gender = $request->gender;
    //     $city_id = $request->city_id;
    //     $country_id = $request->country_id;

    //     $countries = Country::all();

    //     $escorts_data = User::where('roleStatus', 2)
    //         ->where('gender', $gender)
    //         ->where('country', $country_id)
    //         ->where('city', $city_id);
        
    //     $escorts_ids = $escorts_data->pluck('id');
    //     $escorts = $escorts_data->get();

    //     $blogs = Blog::whereIn('publishBy', $escorts_ids)->get();
        
    //     return view('frontend.provider.multiPage', 
    //         compact('gender', 'city_id', 'country_id', 'blogs', 'countries', 'escorts'));
    // }
    // SMEDIT 22-10-2020 END

    public function clientEscoertSignupStore(Request $request) {

        if($request->roleStatus == 2){
            $validatedData = $request->validate([
                    'name' => 'required',
                    'email' => 'required | email',
                    'password' => 'required',
                    'cpassword' => 'required | same:password'
            ],
            [
                'name.required'=>"* Please Enter Your Name",
                'email.required'=>"* Please Enter Your Email",
                'email'=>"Please Enter Valid Email",
                'password.required'=>"* Please Enter Your Password",
                'cpassword.required'=>"* Please Enter Your Confirm Password",
                'cpassword.same'=>"Password And Confirm Password Doesn't Match"
            ]);    
        }else{
            $validatedData = $request->validate([
                    'name' => 'required',
                    'email' => 'required | email',
                    'password' => 'required',
                    'cpassword' => 'required | same:password',
            ],
            [
                'name.required'=>"* Please Enter Your Name",
                'email.required'=>"* Please Enter Your Email",
                'email'=>"Please Enter Valid Email",
                'password.required'=>"* Please Enter Your Password",
                'cpassword.required'=>"* Please Enter Your Confirm Password",
                'cpassword.same'=>"Password And Confirm Password Doesn't Match",
            ]);
        }
        $emailcount = User::all()->where('email', $request->email);

        if ($emailcount->count() < 1)
        {
            $oldemail = "none";
        }
        else
        {
            $oldemails = User::orderBy('id', 'desc')->where('email', $request->email)
                ->first();
            $oldemail = $oldemails->email;
        }

        if ($oldemail == $request->email)
        {
            return back()
                ->with('error', ' This emailed already exists in our database!');
        }
        else
        {

            $main_users = new User();
            $main_users->name = $request->name;
            $main_users->activation = 0;
            $main_users->gender = 1;
            $main_users->phone = 0;
            $main_users->parent_id = 0;
            $main_users->email = $request->email;
            $main_users->roleStatus = $request->roleStatus;
            $main_users->type_IA = $request->type_IA;

            //$main_users->password=bcrypt($request->password);
            $main_users->password = Hash::make($request->password);

            $main_users->save();

            if($request->number_of_profiles > '0')
            {
                for ($i=1; $i <= $request->number_of_profiles; $i++) 
                { 
                    $users = new User();
                    $users->name = $request->name." Profile ".$i;
                    $users->activation = 1;
                    $users->gender = 2;
                    $users->parent_id = $main_users->id;
                    $users->phone = 0;
                    $users->email = '';
                    $users->roleStatus = '2';
                    $users->type_IA = '1';
                    $users->password = Hash::make($request->password);
                    $users->save();
                }
            }
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'usersId' => $main_users->id,
                'role'=>$request->roleStatus
            );
            Mail::send('mail', $data, function ($message) use ($data)
            {
                $message->to($data['email'], 'Honey Luxe')->subject('Confirm Registration');
                $message->from('irishcharmer192@gmail.com', 'Honey Luxe');
            });
            /*return back()->with("message",);*/
            return redirect()
                ->back()
                ->with('message', "We have sent an email with a confirmation link to your email address. In order to complete the sign-up process.");
        }
    }

    public function confirmation($id, $name)
    {
        $affected = DB::table('users')->where('id', $id)->update(['activation' => 1]);  
        return redirect('client/login')->with('status', $name . ' your account is now activated!');
    }

    public function countryListEscortCountry($country,$city=NULL)
    {
        $c_name = $country;
        $country_name = str_replace('-',' ',$country);
        $country = DB::table('countries')->where('country', $country_name)->get()[0]->id;  
        session()->put('country_id', $country);
        $countries=\App\State::where('country_id','=',$country)
        ->limit(8)
        ->inRandomOrder()
        ->get();
        $seo_text = "";
        $city_list = DB::table('cities')->where('country_id', $country)->inRandomOrder()->limit(8)->get();  
        $seo_text = array();
        if(!$city_list->isEmpty())
        {
            $seo_text = DB::table('seo_city')->join('cities','seo_city.city_id','cities.id')->where('country_id', $country)->get();  
        }
        $data = array('countries_list'=>$countries,'country'=>$c_name,'country_id'=>$country,'seo_text'=>$seo_text);
        return view('frontend.pages.countryListEscort', $data)->withCookie(cookie('ddd_country_id', $country, 60));
    }

    public function countryListEscortCityCountry($country,$city=NULL)
    {
        $tour_search = array();

        $city = str_replace("-"," ",$city);
        $country = str_replace("-"," ",$country);
        if(isset($country) && $city != NULL)
        {           
            $country_search = DB::table('countries')->where('country','=',$country)->select('id')->first();
            $city_search = DB::table('states')->where('state','=',$city)->select('id')->first();
            $tour_search = DB::table('profile_tours')
            ->where([
                    ['country','=',$country_search->id],
                    ['city','=',$city_search->id]
                ])->select()->get();
            }

        $c_name = $country;
        $country_name = str_replace('-',' ',$country);
        $city_name_full = '';
        if($city != NULL){

            $city_name = str_replace('-',' ',$city);
            $city_name_full = $city;
            $city = DB::table('states')->where('state', $city_name)->get()[0]->id;  
        }
        $country = DB::table('countries')->where('country', $country_name)->get()[0]->id;  

        
        if ($country) 
        {
            session()->put('country_id', $country);
        }
        if($city != NULL && $city)
        {
            session()->put('city_id', $city);
        }
        if($city != NULL){

            $city_details = DB::table('states')->where('id', $city)->get();  
        }
        
        $countries=\App\Country::all();
        $seo_text = "";
        $tour_data = array();
        if($city != NULL){
            $tour_data = DB::table('profile_tours')
                ->where('startDate','<=',date('Y-m-d'))
                ->where('endDate','>=',date('Y-m-d'))
                ->where('city','=',$city_details[0]->state)
                ->select('escortId','startDate','endDate')
                ->limit(1)
                ->get();
        }
        
        $tour_arr = array();
        $tour_id_wise = array();
        if(count($tour_data) > 0)
        {
            foreach ($tour_data as $tour_details) 
            {
                $tour_arr[] = $tour_details->escortId;
                $tour_id_wise[$tour_details->escortId] = array('startDate'=>$tour_details->startDate,'endDate'=>$tour_details->endDate);
            }
        }
        $seo_text = array();
        if($city != NULL){

            $seo_text = DB::table('seo_city')->where('city_id', $city)->where('gender', '1')->get();  
        }
        
        $data = array('
                countries_list'=>$countries,
                'country'=>$c_name,
                'city_id'=>$city,
                'city_name'=>$city_name_full,
                'country_id'=>$country,
                'tour_id_wise'=>$tour_id_wise,
                'tour_arr'=>$tour_arr,
                'seo_text'=>$seo_text,
                'tour_search'=>$tour_search
            );
        return view('frontend.pages.countryListEscortCity', $data);
    }

    public function countryListEscortCityCountryGender($country,$city,$gender) {
        
        $country_name = str_replace('-',' ',$country);
        $city_name = str_replace('-',' ',$city);
        $country = DB::table('countries')->where('country', $country_name)->get()[0]->id;  
        $city = DB::table('states')->where('state', $city_name)->get()[0]->id;  
        if(strtolower($gender)=='male')
        {
            $gender = '1';
        }
        if(strtolower($gender)=='female')
        {
            $gender = '2';
        }
        if(strtolower($gender)=='transgender')
        {
            $gender = '3';
        }
        if(strtolower($gender)=='gay')
        {
            $gender = '4';
        }
        if ($country) 
        {
            session()->put('country_id', $country);
        }
        if($city)
        {
            session()->put('city_id', $city);
        }

        if($gender)
        {
            session()->put('gender', $gender);
        }
        $countries=\App\Country::all();
        $seo_text = "";
        $seo_text = DB::table('seo_city')->where('city_id', $city)->where('gender', $gender)->get();  
        $data = array('countries_list'=>$countries,'country'=>$country,'gender'=>$gender,'city_id'=>$city,'country_id'=>$country,'seo_text'=>$seo_text);
        return view('frontend.pages.countryListEscortCityGender', $data);
    }

    public function statelist(Request $request){
        $country = $request->country;
        $statecount=\App\State::all()->where('country_id', $country);
        /*echo "<pre>";
        print_r($statecount);
        exit;*/
        $html = '';     
        $html .= "<option value=''>Select State</option>";

        foreach($statecount as $value){
            
            $html .= "<option value='".$value->id."' ";
            $html .= '>'.$value->state;
            $html .= "</option>";
            
        }
        return $html;
    }

    public function citylist(Request $request){
        $state = $request->state;
        $citycount=\App\City::all()->where('state_id', $state);
        $html = '';
        $html .= "<option value=''>Select City</option>";
     
        foreach($citycount as $value){
            $html .= "<option value='".$value->id."' ";
            $html .= '>'.$value->city;
            $html .= "</option>";
        }
        return $html;
    }

    public function countryCityListEscort(Request $request)
    {

        if ($request->country_id) 
        {
            session()->put('country_id', $request->country_id);
        }
        if($request->state_id)
        {
            session()->put('city_id', $request->state_id);
        }
        $country = $request->country_id;
        $city = $request->state_id;
        return view('frontend.pages.countryCityListEscort', compact('country', 'city'));
    }

    // SMPEDIT 30-09-2020
    public function filterSearchEscort(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        // session()->put('country_id', $request->country_id);
        // session()->put('city_id', $request->city_id);
        // session()->put('gender', $request->gender);

        // dd($request->all());
        $gender = $request->gender;
        $keyword = $request->keyword;
        $city_id = $request->city_id;
        $country_id = $request->country_id;
        $service_type = $request->service_type;
        $with_reviews = ($request->with_reviews != '') ? $request->with_reviews : $request->with_reviews_mob;
        $available_now = ($request->available_now != '') ? $request->available_now : $request->available_now_mob;
        // $touring_escorts = ($request->touring_escorts != '') ? $request->touring_escorts : $request->touring_escorts_mob;
        $touring_escorts = "true";
        $couples_service = ($request->couples_service != '') ? $request->couples_service : $request->couples_service_mob;
        $seo_text = DB::table('seo_city')->where('city_id', $city_id)->where('gender', $gender)->get();
        // $user = DB::table('users')->where('state', $city_id)->select('*')->get();

        // Example for refrence
        /*if($country_id!='')
            {
                $where_cond['profile_tours.country'] = $country_id;
            }*/
            // Example for refrence
        $filter = array();
        if(isset($gender)){
            $filter['users.gender'] = $gender;
        }
        if(isset($city_id)){
            $filter['profile_tours.city'] = $city_id;   
        }
        if(isset($country_id)){
            $filter['profile_tours.country'] = $country_id;
        }
        if(isset($service_type)){
            $filter['users.serviceArea'] = $service_type;
        }
        if(isset($with_reviews) && $with_reviews == "true"){
            $filter['testimonials.status'] = 1;
        }
        if(isset($available_now) && $available_now == "true"){
            $filter['users.activation'] = 1;
        }
        if(isset($couples_service) && $couples_service == "true"){
            echo $filter['users.service'] = 1;
        }
        $user = DB::table('users')
        ->leftjoin('profile_tours','users.id','profile_tours.escortId')
        ->leftjoin('testimonials','users.id','testimonials.escort_id')
        ->where($filter)
        ->where('users.request','=',1)
        ->select('users.id','users.name as name','users.state as state','users.serviceArea as serviceArea','users.height as height','users.city as city','users.activation as activation','profile_tours.id as profile_toursid')->get();
        $touring = array();
        foreach($user as $val){
            $touring = \App\ProfileTour::where([
                    ['escortId', $val->id],
                    ['city',$val->city]
                ])
                ->where('endDate', '>=', date('Y-m-d'))
                ->orderBy('endDate')
                ->first();

        }
        // echo "<pre>";
        // print_r($user);
        // print_r($filter);
        // echo "</pre>";
        // exit;
        return view('frontend.pages.filterSearchEscort', 
            compact(
                'gender', 
                'keyword',
                'city_id', 
                'country_id', 
                'service_type',
                'seo_text',
                'with_reviews', 
                'available_now', 
                'couples_service', 
                'touring_escorts',
                'user',
                'touring'
            )
        );
    }  
    // SMPEDIT 30-09-2020 END

    public function advanceSearchEscort(Request $request)
    {

        $post_data['country'] = $country = $request->country_id;
        $post_data['city'] = $city = $request->state_id;
        $post_data['suburb'] = $suburb = $request->city_id;
        $post_data['gender'] = $gender = $request->gender;
        $post_data['sexuality'] = $sexuality = $request->sextuality;
        $post_data['height'] = $height = $request->height;
        $post_data['bodyShape'] = $bodyShape = $request->bodyShape;
        $post_data['dress'] = $dress = $request->dress_size;
        $post_data['hair'] = $hair = $request->hair;
        $post_data['age'] = $age = $request->age;
        $post_data['eyes'] = $eyes = $request->eye;
        $post_data['nationality'] = $nationality = $request->nationality;
        $post_data['keyword'] = $keyword = $request->keyword;
        $post_data['escortTouring'] = $escortTouring = ($request->touring_escorts) && $request->touring_escorts !='false' ? '1' : '0';
        $post_data['activation'] = $activation = ($request->available_now) && $request->available_now !='false' ? '1' : '0';
        $post_data['available_today'] = $available_today = ($request->available_today) && $request->available_today !='false' ? '1' : '0';
        $post_data['in_call'] = $in_call = ($request->in_call) && $request->in_call !='false' ? '1' : '0';
        $post_data['out_call'] = $out_call = ($request->out_call) && $request->out_call !='false' ? '1' : '0';
        $post_data['services'] = $services = $request->services;
        $post_data['agency'] = $agency = ($request->agency) && $request->agency !='false' ? '1' : '0';
        $post_data['price_from'] = $price_from = $request->price_from;
        $post_data['price_to'] = $price_to = $request->price_to;
        return view('frontend.pages.advanceSearchEscort', compact('country', 'city', 'suburb', 'gender','post_data'));
    }

    public function searchCityEscort(Request $request)
    {
        $city = $request->city_id;
        $tab_value = $request->tab_value;
        $city_id = DB::table('cities')->where('city','=',$city)->select('id')->get()[0];

        $data = DB::table('local_resorces_data')->where([
            ['suburb','=',$city_id->id],
            ['section','=',$tab_value]
        ])->select('*')->get();
        return $data;
    }

    public function cronjob(){
        $users = DB::table('users')->where('id','=',84)->whereDate('timer', '>=', Carbon::now())->get();
        echo "hello";
    }

    public function storeTestimonial()
    {
        if(Auth::check())
        {
            $testimonial = $_POST['testimoninal_text'];
            $escort_id = $_POST['escort_id'];
            // exit;
            DB::table('testimonials')->insert([
                ['client_id' => Auth::user()->id, 'escort_id' => $escort_id, 'testimonial' => $testimonial]
            ]);
            
        }
        else
        {
            echo json_encode("not_logged");
        }
    }

    public function profileBlogs($id)
    {
        return view('frontend.pages.escortBlogs', [
            'blogs' => Blog::where('publishBy', $id)->orderBy('created_at', 'desc')->paginate(9)
        ]);
    }



    public function profileEmailPage($id){
        return view('frontend.pages.profileEmailSend',['id'=>$id]);
        
    }

    public function emailMe(Request $request){
        $id = $request->id;
        $user = DB::table('users')->where('id','=',$id)->select('email','name','id')->get();
        
            foreach ($user as $value) {
                $data = array(
                    'name' => $request->name,
                    'emailto' => $value->email,
                    'reason' => $request->message,
                    'emailForm'=>$request->email
                );
                Mail::send('emailMe', $data, function ($message) use ($data)
                {
                    $message->to($data['emailto'], 'Honey Luxe')->subject('Email Me');
                    $message->from('irishcharmer192@gmail.com', 'Honey Luxe');
                });
            }
            session()->flash('status', 'Email Send Successfully');
            return redirect()->action('FrontEndController@profileEmailPage',$id);    
        
        
    }

    public function deleteComment($id)
    {
        DB::table('feed_update')->where('id',$id)->delete();
        return redirect()->back()->with('message', "Comment deleted Successfully!");
    }

    public function feedShow($id)
    {
        $friend_data = array();
        if(isset(Auth::user()->id)){
            $friend_data= DB::table('friend_list')
                ->where([
                    ['escortId', $id],
                    ['cust_id', Auth::user()->id]
                ])
                ->get(); 

        }
        
        $dt = Carbon::yesterday();
        $feed_data= DB::table('feeds')->where([['escortId', $id]])->get(); 
        $getmonths= DB::table('profile_tours')
            ->select('id','startDate','endDate','city')
            ->where('escortId','=',$id)
            ->where('startDate','<=',date('Y-m-d'))
            ->where('endDate','>=',date('Y-m-d'))
            ->limit(1)
            ->get();
                
            $follow_arr = array();
            $all_liked_records = array();
            $comment_text = array();
            $comment_photo = array();
            $comment_name = array();
            $feed_arr = array();

            $profile_image = NULL;
            $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$id)->get();
            if(count($profile_image_arr) > 0)
            {
                    $profile_image = $profile_image_arr[0]->image;
            }

            if($profile_image==NULL)
                    $escort_prodile_image_path = asset('public/blankphoto.png');
            else  
                    $escort_prodile_image_path = asset('public/uploads/'.$profile_image);
            $follow_arr[] = $id;
            if(count($follow_arr) > 0)
            {
                $feed = DB::table('feeds')
                    ->whereIn('escortId', $follow_arr)
                    ->orderBy('id','desc')
                    ->get();
    
                if (count($feed) > 0) 
                {
                    foreach ($feed as $feed_details) 
                    {
                        $feed_arr[] = $feed_details->id;
                    }
                }

                if(count($feed_arr) > 0)
                {
                    $all_liked_records = DB::table('feed_update')
                    ->join('users','users.id','feed_update.cust_id')
                    ->select('*','feed_update.id as feed_update_id')
                    ->whereIn('feed_update.feed_id', $feed_arr)
                    ->orderBy('feed_update.id','desc')
                    ->get();
                }
            }

            
        // }

        $like_data = array();
        $comment_data = array();
        if(count($all_liked_records) > 0)
        {
            foreach ($all_liked_records as $details) 
            {
                if($details->like == '1')
                {
                    $like_data[$details->feed_id][] = $details->cust_id;
                }
                else
                {
                    $comment_data[$details->feed_id][] = $details->cust_id; 
                    $comment_text[$details->feed_id][] = $details->comment;
                    $comment_id[$details->feed_id][] = $details->feed_update_id;
                    $comment_photo[$details->feed_id][] = $details->cust_id == $id ? $profile_image : $details->photo; 
                    $comment_name[$details->feed_id][] = $details->name;        
                }
            }
        }
        $comment_ids = isset($comment_id) ? $comment_id : '';
        $data = array(
            'id'=>$id,
            'feed_data'=>$feed_data,
            'friends_data'=>$friend_data,
            'getmonths' => $getmonths,
            'feed'=>$feed,
            'like_data'=>$like_data,
            'comment_data'=>$comment_data,
            'comment_text'=>$comment_text,
            'comment_photo'=>$comment_photo,
            'comment_id'=>$comment_ids,
            'comment_name'=>$comment_name,
            'escort_prodile_image_path'=>$escort_prodile_image_path
        );
        return view('frontend.pages.feed', $data);
    }
}

