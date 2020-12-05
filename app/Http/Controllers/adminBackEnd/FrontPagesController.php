<?php
  namespace App\Http\Controllers\adminBackEnd;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;
  use App\Independent;
  use App\ProviderResource;
  use App\Professional;
  use App\About;
  use App\ProfileImage;
  use App\ProfileDescription;
  use App\ProfileList;
  use App\ProfileRate;
  use App\ProfileAvailability;
  use App\ProfileTour;
  use App\ProfileBlog;
  use App\Term;
  use App\BusinessEtiquete;
  use\App\BusinessQuestionEtiquete;
  use\App\OurStory;
  use\App\Faq;
  use\App\FaqQuestion;
  use\App\ClientRelationship;
  use\App\ClientRelationQuestion;
  use DB;

class FrontPagesController extends Controller
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

    public function homePage()
    {
        return view('admin.front_pages.homePage');
    }

    public function independentUpdate(Request $request)
    {
        //return $request;
        $indpnts = Independent::find($request->id);
        if ($request->hasFile('icon'))
        {
            $icons = '1' . time() . '.' . $request
                ->icon
                ->getClientOriginalExtension();
            $request
                ->icon
                ->move(('public/uploads') , $icons);
            $indpnts->icon = $icons;
        }
        if ($request->hasFile('bgimage'))
        {
            $bgimages = '2' . time() . '.' . $request
                ->bgimage
                ->getClientOriginalExtension();
            $request
                ->bgimage
                ->move(('public/uploads') , $bgimages);
            $indpnts->bgimage = $bgimages;
        }

        $indpnts->topHead = $request->topHead;
        $indpnts->title = $request->title;
        $indpnts->description = $request->description;
        $indpnts->save();
        return back()
            ->with('message', 'Updated Successfully!');
    }
    public function providerResource()
    {
        return view('admin.home.providerResource');
    }

    public function providerUpdate(Request $request)
    {
        //return $request;
        $resrcs = ProviderResource::find($request->id);
        $resrcs->titleHead = $request->titleHead;
        $resrcs->intro = $request->intro;
        $resrcs->title1 = $request->title1;
        $resrcs->title2 = $request->title2;
        $resrcs->title3 = $request->title3;
        $resrcs->title4 = $request->title4;

        if ($request->hasFile('icon1'))
        {
            $icons = '1' . time() . '.' . $request
                ->icon1
                ->getClientOriginalExtension();
            $request
                ->icon1
                ->move(('public/uploads') , $icons);
            $resrcs->icon1 = $icons;
        }
        if ($request->hasFile('icon2'))
        {
            $icons2 = '2' . time() . '.' . $request
                ->icon2
                ->getClientOriginalExtension();
            $request
                ->icon2
                ->move(('public/uploads') , $icons2);
            $resrcs->icon2 = $icons2;
        }
        if ($request->hasFile('icon3'))
        {
            $icons3 = '3' . time() . '.' . $request
                ->icon3
                ->getClientOriginalExtension();
            $request
                ->icon3
                ->move(('public/uploads') , $icons3);
            $resrcs->icon3 = $icons3;
        }
        if ($request->hasFile('icon4'))
        {
            $icons4 = '4' . time() . '.' . $request
                ->icon4
                ->getClientOriginalExtension();
            $request
                ->icon4
                ->move(('public/uploads') , $icons4);
            $resrcs->icon4 = $icons4;
        }

        $resrcs->save();
        return back()
            ->with('message', 'Updated Successfully!');
    }

    public function professionalAdmin()
    {
        return view('admin.home.professionalAdmin');
    }

    public function professionalUpdate(Request $request)
    {
        //return $request;
        $professionals = Professional::find($request->id);
        $professionals->titleHead = $request->titleHead;
        $professionals->intro = $request->intro;

        if ($request->hasFile('bgTop'))
        {
            $bgtops = '1' . time() . '.' . $request
                ->bgTop
                ->getClientOriginalExtension();
            $request
                ->bgTop
                ->move(('public/uploads') , $bgtops);
            $professionals->bgTop = $bgtops;
        }
        if ($request->hasFile('bgBottom'))
        {
            $bgbotoms = '2' . time() . '.' . $request
                ->bgBottom
                ->getClientOriginalExtension();
            $request
                ->bgBottom
                ->move(('public/uploads') , $bgbotoms);
            $professionals->bgBottom = $bgbotoms;
        }

        $professionals->title1 = $request->title1;
        $professionals->title2 = $request->title2;
        $professionals->title3 = $request->title3;
        $professionals->title4 = $request->title4;
        $professionals->title5 = $request->title5;
        $professionals->title6 = $request->title6;
        $professionals->title7 = $request->title7;
        $professionals->title8 = $request->title8;
        $professionals->title9 = $request->title9;

        if ($request->hasFile('icon1'))
        {
            $icons = '1' . time() . '.' . $request
                ->icon1
                ->getClientOriginalExtension();
            $request
                ->icon1
                ->move(('public/uploads') , $icons);
            $professionals->icon1 = $icons;
        }
        if ($request->hasFile('icon2'))
        {
            $icons2 = '2' . time() . '.' . $request
                ->icon2
                ->getClientOriginalExtension();
            $request
                ->icon2
                ->move(('public/uploads') , $icons2);
            $professionals->icon2 = $icons2;
        }
        if ($request->hasFile('icon3'))
        {
            $icons3 = '3' . time() . '.' . $request
                ->icon3
                ->getClientOriginalExtension();
            $request
                ->icon3
                ->move(('public/uploads') , $icons3);
            $professionals->icon3 = $icons3;
        }
        if ($request->hasFile('icon4'))
        {
            $icons4 = '4' . time() . '.' . $request
                ->icon4
                ->getClientOriginalExtension();
            $request
                ->icon4
                ->move(('public/uploads') , $icons4);
            $professionals->icon4 = $icons4;
        }
        if ($request->hasFile('icon5'))
        {
            $icons5 = '5' . time() . '.' . $request
                ->icon5
                ->getClientOriginalExtension();
            $request
                ->icon5
                ->move(('public/uploads') , $icons5);
            $professionals->icon5 = $icons5;
        }
        if ($request->hasFile('icon6'))
        {
            $icons6 = '6' . time() . '.' . $request
                ->icon6
                ->getClientOriginalExtension();
            $request
                ->icon6
                ->move(('public/uploads') , $icons6);
            $professionals->icon6 = $icons6;
        }
        if ($request->hasFile('icon7'))
        {
            $icons7 = '7' . time() . '.' . $request
                ->icon7
                ->getClientOriginalExtension();
            $request
                ->icon7
                ->move(('public/uploads') , $icons7);
            $professionals->icon7 = $icons7;
        }
        if ($request->hasFile('icon8'))
        {
            $icons8 = '8' . time() . '.' . $request
                ->icon8
                ->getClientOriginalExtension();
            $request
                ->icon8
                ->move(('public/uploads') , $icons8);
            $professionals->icon8 = $icons8;
        }
        if ($request->hasFile('icon9'))
        {
            $icons9 = '9' . time() . '.' . $request
                ->icon9
                ->getClientOriginalExtension();
            $request
                ->icon9
                ->move(('public/uploads') , $icons9);
            $professionals->icon9 = $icons9;
        }

        $professionals->save();
        return back()
            ->with('message', 'Updated Successfully!');
    }

    public function aboutAdmin()
    {
        return view('admin.home.aboutAdmin');
    }

    public function aboutUpdate(Request $request)
    {
        //return $request;
        $abouts = About::find($request->id);
        $abouts->titleHead = $request->titleHead;
        $abouts->intro = $request->intro;
        $abouts->description = $request->description;
        $abouts->save();
        return back()
            ->with('message', 'Updated Successfully!');
    }

    // SMPEDIT 15-10-2020
    public function profile()
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $pfimages = DB::table('profile_images')
            ->leftJoin('users', 'profile_images.escortId', 'users.id')
            ->select('profile_images.*', 'users.name as escortName')
            ->get();

        return view('admin.front_pages.profile', compact('escorts', 'pfimages'));
    }
    // SMPEDIT 15-10-2020 END

    public function profileImageStore(Request $request)
    {
        //return $request;
        $profileimages = new ProfileImage;
        $profileimages->escortId = $request->escortId;
        $profileimages->status = $request->status;
        if ($request->hasFile('image'))
        {
            $images = '9' . time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $profileimages->image = $images;
        }
        $profileimages->url = $request->url;
        $profileimages->save();
        return back()
            ->with('message', 'Uploaded Successfully!');
    }

    public function profileImageUpdate(Request $request)
    {

        //return $request;
        $profileimages = ProfileImage::find($request->id);
        $profileimages->escortId = $request->escortId;
        $profileimages->status = $request->status;
        if ($request->hasFile('image'))
        {
            $images = '9' . time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $profileimages->image = $images;
        }
        $profileimages->url = $request->url;
        $profileimages->save();
        return back()
            ->with('message', 'Profile Image Updated Successfully!');
    }

    public function profileImageDelete($id)
    {
        //return $request;
        $profileimages = ProfileImage::find($id)->delete();
        return redirect()->action('adminBackEnd\EscortDashboardController@profileImage')->with('message', 'Profile Image Deleted Successfully!');;
    }

    // SMPEDIT 15-10-2020
    public function profileDescription()
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $pfdescrs = DB::table('profile_descriptions')
            ->leftJoin('users', 'profile_descriptions.escortId', 'users.id')
            ->select('profile_descriptions.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileDescription', compact('escorts', 'pfdescrs'));
    }
    // SMPEDIT 15-10-2020 END

    public function profileDescriptionStore(Request $request)
    {
        //return $request;
        $profiledescriptions = new ProfileDescription;
        $profiledescriptions->escortId = $request->escortId;
        $profiledescriptions->status = $request->status;
        $profiledescriptions->description = $request->description;
        $profiledescriptions->save();
        return back()
            ->with('message', 'Description Save Successfully!');
    }

    public function profileDescriptionUpdate(Request $request)
    {
        //return $request;
        $profiledescriptions = ProfileDescription::find($request->id);
        $profiledescriptions->escortId = $request->escortId;
        $profiledescriptions->status = $request->status;
        $profiledescriptions->description = $request->description;
        $profiledescriptions->save();
        return back()
            ->with('message', 'Description Updated Successfully!');
    }

    public function profileDescriptionDelete($id)
    {
        //return $request;
        $profiledescriptions = ProfileDescription::find($id)->delete();
        return back()
            ->with('message', 'Description Deleted Successfully!');
    }

    // SMPEDIT 15-10-2020
    public function profileList()
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $pflist = DB::table('profile_lists')
            ->leftJoin('users', 'profile_lists.escortId', 'users.id')
            ->select('profile_lists.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileList', compact('escorts', 'pflist'));
    }
    // SMPEDIT 15-10-2020 END

    public function profileListStore(Request $request)
    {
        //return $request;
        $profilelists = new ProfileList;
        $profilelists->escortId = $request->escortId;
        $profilelists->status = $request->status;
        $profilelists->description = $request->description;
        $profilelists->save();
        return back()
            ->with('message', 'Lists Save Successfully!');
    }

    public function profileListUpdate(Request $request)
    {
        //return $request;
        $profilelists = ProfileList::find($request->id);
        $profilelists->escortId = $request->escortId;
        $profilelists->status = $request->status;
        $profilelists->description = $request->description;
        $profilelists->save();
        return back()
            ->with('message', 'Profile Lists Updated Successfully!');
    }

    public function profileListDelete($id)
    {
        //return $request;
        $profilelists = ProfileList::find($id)->delete();
        return back()
            ->with('message', 'Profile Lists Deleted Successfully!');
    }

    // SMPEDIT 15-10-2020
    public function profileRate($id = '')
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $pfrates = DB::table('profile_rates')
            ->leftJoin('users', 'profile_rates.escortId', 'users.id')
            ->select('profile_rates.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileRate', compact('escorts', 'pfrates'));
    }

    public function profileRateStore(Request $request)
    {
        //return $request;
        $profilerates = new ProfileRate;
        $profilerates->escortId = $request->escortId;
        $profilerates->status = $request->status;
        $profilerates->time = $request->time;
        $profilerates->price = $request->price;
        $profilerates->description = $request->description;
        $profilerates->save();
        return back()
            ->with('message', 'Rate Save Successfully!');
    }

    public function profileRateUpdate(Request $request)
    {
        //return $request;
        $profilerates = ProfileRate::find($request->id);
        $profilerates->escortId = $request->escortId;
        $profilerates->status = $request->status;
        $profilerates->time = $request->time;
        $profilerates->price = $request->price;
        $profilerates->description = $request->description;
        $profilerates->save();
        return back()
            ->with('message', 'Rate Updated Successfully!');
    }

    public function profileRateDelete($id)
    {
        //return $request;
        $profilerates = ProfileRate::find($id)->delete();
        return back()
            ->with('message', 'Rate Deleted Successfully!');
    }

    // SMPEDIT 15-10-2020
    public function profileAvailability()
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $pfavails = DB::table('profile_availabilities')
            ->leftJoin('users', 'profile_availabilities.escortId', 'users.id')
            ->select('profile_availabilities.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileAvailability', compact('escorts', 'pfavails'));

    }
    // SMPEDIT 15-10-2020 END

    public function profileAvailabilityStore(Request $request)
    {
        //return $request;
        $profileavailabilities = new ProfileAvailability;
        $profileavailabilities->escortId = $request->escortId;
        $profileavailabilities->weekday = $request->weekday;
        $profileavailabilities->fromDate = $request->fromDate;
        $profileavailabilities->untilDate = $request->untilDate;
        $profileavailabilities->save();
        return back()
            ->with('message', 'Availability Save Successfully!');
    }

    public function profileAvailabilityUpdate(Request $request)
    {
        //return $request;
        $profileavailabilities = ProfileAvailability::find($request->id);
        $profileavailabilities->escortId = $request->escortId;
        $profileavailabilities->weekday = $request->weekday;
        $profileavailabilities->fromDate = $request->fromDate;
        $profileavailabilities->untilDate = $request->untilDate;
        $profileavailabilities->save();
        return back()
            ->with('message', 'Availability Updated Successfully!');
    }

    public function profileAvailabilityDelete($id)
    {
        //return $request;
        $profileavailabilities = ProfileAvailability::find($id)->delete();
        return back()
            ->with('message', 'Availability Deleted Successfully!');
    }

    // SMPEDIT 15-10-2020
    public function profileTour($id = '')
    {
        $escorts = \App\User::all()->where('roleStatus', 2);
        $states = \App\State::all();
        $pftours = DB::table('profile_tours')
            ->leftJoin('users', 'profile_tours.escortId', 'users.id')
            ->select('profile_tours.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileTour', ['escorts' => $escorts, 'pftours' => $pftours, 'states' => $states]);
    }
    // SMPEDIT 15-10-2020 END

    public function profileTourStore(Request $request)
    {
        //return $request;
        $profiletours = new ProfileTour;
        $profiletours->escortId = $request->escortId;
        $profiletours->status = $request->status;
        $profiletours->city = $request->city;
        $profiletours->startDate = $request->startDate;
        $profiletours->endDate = $request->endDate;
        $profiletours->save();
        return back()
            ->with('message', 'Tour Save Successfully!');
    }

    public function profileTourUpdate(Request $request)
    {
        //return $request;
        $profiletours = ProfileTour::find($request->id);
        $profiletours->escortId = $request->escortId;
        $profiletours->status = $request->status;
        $profiletours->city = $request->city;
        $profiletours->startDate = $request->startDate;
        $profiletours->endDate = $request->endDate;
        $profiletours->save();
        return back()
            ->with('message', 'Tour Updated Successfully!');
    }

    public function profileTourDelete($id)
    {
        //return $request;
        $profiletours = ProfileTour::find($id)->delete();
        return back()
            ->with('message', 'Tour Delete Successfully!');
    }

    public function profileBlog()
    {
        $pfblogs = DB::table('profile_blogs')
            ->leftJoin('users', 'users.id', '=', 'profile_blogs.escortId')
            ->select('profile_blogs.*', 'users.name as escortName')
            ->get();

        return view('admin.profile.profileBlog', compact('pfblogs'));
    }

    public function profileBlogStore(Request $request)
    {
        //return $request;
        $profileblogs = new ProfileBlog;
        $profileblogs->escortId = $request->escortId;
        $profileblogs->status = $request->status;
        $profileblogs->title = $request->title;
        if ($request->hasFile('image'))
        {
            $images = '9' . time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $profileblogs->image = $images;
        }
        $profileblogs->url = $request->url;
        $profileblogs->save();
        return back()
            ->with('message', 'Blog Save Successfully!');
    }

    public function profileBlogUpdate(Request $request)
    {
        //return $request;
        $profileblogs = ProfileBlog::find($request->id);
        $profileblogs->escortId = $request->escortId;
        $profileblogs->status = $request->status;
        $profileblogs->title = $request->title;
        if ($request->hasFile('image'))
        {
            $images = '9' . time() . '.' . $request
                ->image
                ->getClientOriginalExtension();
            $request
                ->image
                ->move(('public/uploads') , $images);
            $profileblogs->image = $images;
        }
        $profileblogs->url = $request->url;
        $profileblogs->save();
        return back()
            ->with('message', 'Blog Updated Successfully!');
    }

    public function profileBlogDelete($id)
    {
        //return $request;
        $profileblogs = ProfileBlog::find($id)->delete();
        return back()
            ->with('message', 'Blog Deleted Successfully!');
    }

    public function adminTerms()
    {
        return view('admin.front_pages.adminTerms');
    }

    

    public function adminTermStore(Request $request)
    {
        //return $request;
        $terms = new Term;
        $terms->title = $request->title;
        $terms->status = $request->status;
        $terms->description = $request->description;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $terms->imageurl = $images;
        }
        $terms->save();
        return back()
            ->with('message', 'Terms Save Successfully!');
    }

    public function adminTermUpdate(Request $request)
    {
        //return $request;
        $terms = Term::find($request->id);
        $terms->title = $request->title;
        $terms->status = $request->status;
        $terms->description = $request->description;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $terms->imageurl = $images;
        }
        $terms->save();
        return back()
            ->with('message', 'Terms Updated Successfully!');
    }

    public function adminTermsDelete($id)
    {
        //return $request;
        $terms = Term::find($id)->delete();
        return back()
            ->with('error', 'Terms Deleted Successfully!');
    }

    public function privacyview()
    {
        $privacy_statement = DB::table('privacy_statement')->select()->get();
        return view('admin.front_pages.adminprivacy',['privacy_statement'=>$privacy_statement]);
    }
    public function privacyadd(Request $request){
        $title = $request->title;
        $description = $request->description;
        DB::table('privacy_statement')->insert([
            'titile'=>$title,
            'description'=>$description
        ]);
        return back()->with('message', 'Privacy Statement Recorded Successfully!');
    }
    public function privacydelete($id){
        DB::table('privacy_statement')->where('id', '=',$id)->delete();
        return back()->with('message', 'Privacy Statement Deleted Successfully!');
    }
    public function privacyupdate($id){
        $data = DB::table('privacy_statement')->where('id','=',$id)->select()->get()[0];
        return view('admin.front_pages.privacyupdate',['data'=>$data]);
    }

    public function privacyedit(Request $request){
        $id = $request->id;
        $title = $request->title;
        $description = $request->description;
        DB::table('privacy_statement')->where('id','=',$id)->update(['titile'=>$title,
            'description'=>$description]);
        return redirect()->action('adminBackEnd\FrontPagesController@privacyview')->with('message', 'Privacy Statement Updated Successfully!');
    }


    public function copyview()
    {
        $copy = DB::table('copy')->select()->get();
        return view('admin.front_pages.admincopyright',['copy'=>$copy]);
    }

    public function copyupdate($id){
        $copy = DB::table('copy')->where('id','=',$id)->where('id','=',$id)->select()->get()[0];
        return view('admin.front_pages.copyupdate',['copy'=>$copy]);   
    }

     public function copyedit(Request $request){
        $id = $request->id;
        $copyright = $request->copyright;
        DB::table('copy')->where('id','=',$id)->update(['copyright'=>$copyright]);
        return redirect()->action('adminBackEnd\FrontPagesController@copyview')->with('message', 'Copy Right Updated Successfully!');
    }

     public function acceptableview()
    {
        $acceptable = DB::table('acceptable')->select()->get();
        return view('admin.front_pages.adminacceptable',['acceptable'=>$acceptable]);
    }

     public function acceptableupdate($id){
        $acceptable = DB::table('acceptable')->where('id','=',$id)->where('id','=',$id)->select()->get()[0];
        return view('admin.front_pages.acceptableupdate',['acceptable'=>$acceptable]);   
    }

    public function acceptableedit(Request $request){
        $id = $request->id;
        $acceptable = $request->acceptable;
        DB::table('acceptable')->where('id','=',$id)->update(['acceptable'=>$acceptable]);
        return redirect()->action('adminBackEnd\FrontPagesController@acceptableview')->with('message', 'Acceptable Usage Updated Successfully!');
    }
    
    public function disclaimerview(){
        $disclaimer = DB::table('disclaimer')->select()->get();
        return view('admin.front_pages.admindisclaimer',['disclaimer'=>$disclaimer]);
    }

    public function disclaimeradd(Request $request){
         $title = $request->title;
        $description = $request->description;
        DB::table('disclaimer')->insert(['title'=>$title,
            'disclaimer'=>$description]);
        return back()->with('message', 'Disclaimer Recorded Successfully!');
    }

    public function disclaimerdelete($id){
        DB::table('disclaimer')->where('id', '=',$id)->delete();
        return back()->with('message', 'Disclaimer Deleted Successfully!');
    }

    public function disclaimerupdate($id){
        $data = DB::table('disclaimer')->where('id','=',$id)->select()->get()[0];
        return view('admin.front_pages.disclaimerupdate',['data'=>$data]);
    }

    public function disclaimeredit(Request $request){
         $id = $request->id;
        $title = $request->title;
        $description = $request->description;
        DB::table('disclaimer')->where('id','=',$id)->update(['title'=>$title,
            'disclaimer'=>$description]);
        return redirect()->action('adminBackEnd\FrontPagesController@disclaimerview')->with('message', 'Disclaimer Updated Successfully!');
    }
    
    public function adminBusinessEtiquete()
    {
        return view('admin.front_pages.adminBusinessEtiquete');
    }

    public function adminBusinessEtiqueteStore(Request $request)
    {
        //return $request;
        $business = new BusinessEtiquete;
        $business->title = $request->title;
        $business->toggle = $request->toggle;
        $business->status = $request->status;
        $business->description = $request->description;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $business->imageurl = $images;
        }
        $business->save();
        return back()
            ->with('message', 'Business Etiquete Save Successfully!');
    }

    public function adminBusinessEtiqueteUpdate(Request $request)
    {
        //return $request;
        $business = BusinessEtiquete::find($request->id);
        $business->title = $request->title;
        $business->status = $request->status;
        $business->description = $request->description;
        $business->toggle = $request->toggle;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $business->imageurl = $images;
        }
        $business->save();
        return back()
            ->with('message', 'Business Etiquete Updated Successfully!');
    }

    public function adminBusinessEtiqueteDelete($id)
    {
        //return $request;
        $business = BusinessEtiquete::find($id)->delete();
        return back()
            ->with('error', 'Business Etiquete Deleted Successfully!');
    }

    public function adminBusinessQuestionEtiqueteStore(Request $request)
    {
        //return $request;
        $business = new BusinessQuestionEtiquete;
        $business->status = $request->status;
        $business->description = $request->description;
        $business->save();
        return back()
            ->with('message', 'Business Etiquete List Save Successfully!');
    }

    public function adminBusinessQuestionEtiqueteUpdate(Request $request)
    {
        //return $request;
        $business = BusinessQuestionEtiquete::find($request->id);
        $business->status = $request->status;
        $business->description = $request->description;
        $business->save();
        return back()
            ->with('message', 'Business Etiquete List Updated Successfully!');
    }

    public function adminBusinessQuestionEtiqueteDelete($id)
    {
        //return $request;
        $business = BusinessQuestionEtiquete::find($id)->delete();
        return back()
            ->with('error', 'Business Etiquete List Deleted Successfully!');
    }

    public function adminOurStory()
    {
        return view('admin.front_pages.adminOurStory');
    }

    public function adminOurStoryStore(Request $request)
    {
        //return $request;
        $stories = new OurStory;
        $stories->title = $request->title;
        $stories->status = $request->status;
        $stories->description = $request->description;
        $stories->signature= $request->signature;
        $stories->designation= $request->designation;
        $stories->lable= $request->lable;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $stories->imageurl = $images;
        }
        $stories->save();
        return back()
            ->with('message', 'Our Story Save Successfully!');
    }

    public function adminOurStoryUpdate(Request $request)
    {
        //return $request;
        $stories = OurStory::find($request->id);
        $stories->title = $request->title;
        $stories->status = $request->status;
        $stories->description = $request->description;
        $stories->signature= $request->signature;
            $stories->designation= $request->designation;
            $stories->lable= $request->lable;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $stories->imageurl = $images;
        }
        $stories->save();
        return back()
            ->with('message', 'Our Story Updated Successfully!');
    }

    public function adminOurStoryDelete($id)
    {
        //return $request;
        $stories = OurStory::find($id)->delete();
        return back()
            ->with('error', 'Our Story Deleted Successfully!');
    }

    public function adminFaq()
    {
        return view('admin.front_pages.adminFaq');
    }

    public function adminFaqStore(Request $request)
    {
        //return $request;
        $faqs = new Faq;
        $faqs->title = $request->title;
        $faqs->status = $request->status;
        $faqs->description = $request->description;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $faqs->imageurl = $images;
        }
        $faqs->save();
        return back()
            ->with('message', 'FAQ Save Successfully!');
    }

    public function adminFaqUpdate(Request $request)
    {
        //return $request;
        $faqs = Faq::find($request->id);
        $faqs->title = $request->title;
        $faqs->status = $request->status;
        $faqs->description = $request->description;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $faqs->imageurl = $images;
        }
        $faqs->save();
        return back()
            ->with('message', 'FAQ Updated Successfully!');
    }

    public function adminFaqDelete($id)
    {
        //return $id;
        $faqs = Faq::find($id)->delete();
        return back()
            ->with('error', 'FAQ Deleted Successfully!');
    }

    public function adminFaqQuestionStore(Request $request)
    {
        //return $request;
        $faqs = new FaqQuestion;
        $faqs->question = $request->question;
        $faqs->status = $request->status;
        $faqs->answer = $request->answer;
        $faqs->save();
        return back()
            ->with('message', 'FAQ Question Save Successfully!');
    }

    public function adminFaqQuestionUpdate(Request $request)
    {
        //return $request;
        $faqs = FaqQuestion::find($request->id);
        $faqs->question = $request->question;
        $faqs->status = $request->status;
        $faqs->answer = $request->answer;
        $faqs->save();
        return back()
            ->with('message', 'FAQ Question Updated Successfully!');
    }

    public function adminFaqQuestionDelete($id)
    {
        //return $id;
        $faqs = FaqQuestion::find($id)->delete();
        return back()
            ->with('error', 'FAQ List Deleted Successfully!');
    }

    public function adminClientRelationship()
    {
        return view('admin.front_pages.adminClientRelationship');
    }

    public function adminClientRelationshipStore(Request $request)
    {
        //return $request;
        $crelations = new ClientRelationship;
        $crelations->title = $request->title;
        $crelations->status = $request->status;
        $crelations->description = $request->description;
        $crelations->sub_title = $request->sub_title;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $crelations->imageurl = $images;
        }
        $crelations->save();
        return back()
            ->with('message', 'Client Relationship Save Successfully!');
    }

    public function adminClientRelationQuestionStore(Request $request)
    {
        //return $request;
        $business = new ClientRelationQuestion;
        $business->status = $request->status;
        $business->description = $request->description;
        $business->save();
        return back()
            ->with('message', 'Client Relation List Save Successfully!');
    }

    public function adminClientRelationshipUpdate(Request $request)
    {
        //return $request;
        $crelations = ClientRelationship::find($request->id);
        $crelations->title = $request->title;
        $crelations->status = $request->status;
        $crelations->description = $request->description;
        $crelations->sub_title = $request->sub_title;
        if ($request->hasFile('imageurl'))
        {
            $images = '9' . time() . '.' . $request
                ->imageurl
                ->getClientOriginalExtension();
            $request
                ->imageurl
                ->move(('public/uploads') , $images);
            $crelations->imageurl = $images;
        }
        $crelations->save();
        return back()
            ->with('message', 'Client Relationship Updated Successfully!');
    }

    public function adminClientRelationshipDelete($id)
    {
        //return $request;
        $crelations = ClientRelationship::find($id)->delete();
        return back()
            ->with('message', 'Client Relationship Deleted Successfully!');
    }

    public function adminClientRelationQuestionUpdate(Request $request)
    {
        //return $request;
        $business = ClientRelationQuestion::find($request->id);
        $business->status = $request->status;
        $business->description = $request->description;
        $business->save();
        return back()
            ->with('message', 'Client Relation List Updated Successfully!');
    }

    public function adminClientRelationQuestionDelete($id)
    {
        //return $request;
        $business = ClientRelationQuestion::find($id)->delete();
        return back()
            ->with('message', 'Client Relation List Deleted Successfully!');
    }
}

