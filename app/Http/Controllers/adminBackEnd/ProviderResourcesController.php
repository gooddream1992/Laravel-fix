<?php
namespace App\Http\Controllers\adminBackEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

use\App\SexTrafficking;
use\App\LocalResource;
use\App\PurchaseMarketing;
use\App\BecomeEscort;
use\App\Blog;
use App\Country;
use App\State;
use DB;

class ProviderResourcesController extends Controller
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


public function adminSexTrafficking()
{
return view('admin.provider.adminSexTrafficking');
}


public function adminSexTraffickingStore(Request $request)
{
//return $request;
$traffickings=new SexTrafficking;
$traffickings->title=$request->title;
$traffickings->status=$request->status;
$traffickings->description=$request->description;
$traffickings->red_title = $request->red_title;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$traffickings->imageurl=$images;
}
$traffickings->save();
return back()->with('message', 'Sex Trafficking Save Successfully!');
}

public function adminSexTraffickingUpdate(Request $request)
{
//return $request;
$traffickings= SexTrafficking::find($request->id);
$traffickings->title=$request->title;
$traffickings->status=$request->status;
$traffickings->description=$request->description;
$traffickings->red_title = $request->red_title;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$traffickings->imageurl=$images;
}
$traffickings->save();
return back()->with('message', 'Sex Trafficking Updated Successfully!');
}

public function adminSexTraffickingDelete($id)
{
//return $request;
$traffickings= SexTrafficking::find($id)->delete();
return back()->with('message', 'Sex Trafficking Deleted Successfully!');
}

public function adminLocalResources()
{
return view('admin.provider.adminLocalResources');
}


public function adminLocalResourcesStore(Request $request)
{
//return $request;
$resources=new LocalResource;
$resources->title=$request->title;
$resources->status=$request->status;
$resources->description=$request->description;
$resources->red_title= $request->red_title;

if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$resources->imageurl=$images;
}
$resources->save();
return back()->with('message', 'Local Resources Save Successfully!');
}


public function adminLocalResourcesUpdate(Request $request)
{
//return $request;
$resources= LocalResource::find($request->id);
$resources->title=$request->title;
$resources->status=$request->status;
$resources->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$resources->imageurl=$images;
}
$resources->save();
return back()->with('message', 'Local Resources Updated Successfully!');
}


public function adminLocalResourcesDelete($id)
{
//return $request;
$resources= LocalResource::find($id)->delete();
return back()->with('error', 'Local Resources Deleted Successfully!');
}




public function adminPurchaseMarketing()
{
return view('admin.provider.adminPurchaseMarketing');
}


public function adminPurchaseMarketingStore(Request $request)
{
//return $request;
$marketings=new PurchaseMarketing;
$marketings->title=$request->title;
$marketings->status=$request->status;
$marketings->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$marketings->imageurl=$images;
}
$marketings->save();
return back()->with('message', 'Purchase Marketing Save Successfully!');
}

public function adminPurchaseMarketingUpdate(Request $request)
{
//return $request;
$marketings= PurchaseMarketing::find($request->id);
$marketings->title=$request->title;
$marketings->status=$request->status;
$marketings->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$marketings->imageurl=$images;
}
$marketings->save();
return back()->with('message', 'Purchase Marketing Updated Successfully!');
}

public function adminPurchaseMarketingDelete($id)
{
//return $request;
$marketings= PurchaseMarketing::find($id)->delete();
return back()->with('message', 'Purchase Marketing Deleted Successfully!');
}




public function adminBecomeEscort()
{
return view('admin.provider.adminBecomeEscort');
}


public function adminBecomeEscortStore(Request $request)
{
//return $request;
$becomescorts=new BecomeEscort;
$becomescorts->title=$request->title;
$becomescorts->sub_title=$request->sub_title;
$becomescorts->status=$request->status;
$becomescorts->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$becomescorts->imageurl=$images;
}
$becomescorts->save();
return back()->with('message', 'Become Escort Save Successfully!');
}


public function adminBecomeEscortUpdate(Request $request)
{
//return $request;
$becomescorts= BecomeEscort::find($request->id);
$becomescorts->title=$request->title;
$becomescorts->sub_title=$request->sub_title;
$becomescorts->status=$request->status;
$becomescorts->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$becomescorts->imageurl=$images;
}
$becomescorts->save();
return back()->with('message', 'Become Escort Updated Successfully!');
}


public function adminBecomeEscortDelete($id)
{
//return $request;
$becomescorts= BecomeEscort::find($id)->delete();
return back()->with('message', 'Become Escort Deleted Successfully!');
}





public function adminBlog()
{
return view('admin.provider.adminBlog');
}


public function adminBlogStore(Request $request)
{
//return $request;
$blogs=new Blog;
$blogs->title=$request->title;
$blogs->status=$request->status;
$blogs->publishBy=$request->publishBy;
$blogs->publicationStatus=$request->publicationStatus;
$blogs->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$blogs->imageurl=$images;
}
$blogs->save();
return back()->with('message', 'News & Blog Save Successfully!');
}



public function adminBlogUpdate(Request $request)
{
//return $request;
$blogs= Blog::find($request->id);
$blogs->title=$request->title;
$blogs->status=$request->status;
$blogs->publishBy=$request->publishBy;
$blogs->publicationStatus=$request->publicationStatus;
$blogs->description=$request->description;
if ($request->hasFile('imageurl')) {
$images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
$request->imageurl->move(('public/uploads'), $images);
$blogs->imageurl=$images;
}
$blogs->save();
return back()->with('message', 'News & Blog Updated Successfully!');
}



public function adminBlogDelete($id)
{
  //return $request;
  $blogs= Blog::find($id)->delete();
  return back()->with('message', 'News & Blog Deleted Successfully!');
}


public function adminBlogging()
{
  $countries = Country::all();
  return view('admin.provider.adminBloggingCenter', compact('countries'));
}

public function adminBloggingStore(Request $request)
{
  $blogs = new Blog;
  $blogs->country_id = $request->country_id;
  $blogs->state_id = $request->state_id;
  $blogs->gender = $request->gender;
  $blogs->role = 1;
  $blogs->publishBy = 1;
  $blogs->title = $request->title;
  $blogs->status = $request->status;
  $blogs->description = $request->description;
  $blogs->publicationStatus = $request->publicationStatus;

  if ($request->hasFile('imageurl')) {
    $images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
    $request->imageurl->move(('public/uploads'), $images);
    $blogs->imageurl=$images;
  }

  
  $blogs->save();
  return back()->with('message', 'Admin Blog Save Successfully!');
}



public function adminBloggingUpdate(Request $request, $id)
{
  $blogs= Blog::find($id);
  $blogs->title=$request->title;
  $blogs->country_id = $request->country_id;
  $blogs->state_id = $request->state_id;
  $blogs->gender = $request->gender;
  $blogs->status=$request->status;
  $blogs->publishBy=1;
  $blogs->publicationStatus=$request->publicationStatus;
  $blogs->description=$request->description;
  if ($request->hasFile('imageurl')) {
    $images = '9'.time().'.'.$request->imageurl->getClientOriginalExtension();
    $request->imageurl->move(('public/uploads'), $images);
    $blogs->imageurl=$images;
  }
  $blogs->save();
  return back()->with('message', 'Admin Blog Updated Successfully!');
}



public function adminBloggingDelete($id)
{
  Blog::find($id)->delete();
  return back()->with('message', 'Admin Blog Deleted Successfully!');
}
}