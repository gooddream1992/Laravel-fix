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
  use DB;

class SocailMediaController extends Controller
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
    public function index() {
      $socail_media = DB::table('social_media')->select('*')->get();
      return view('admin.socialMedia.index',['socail'=>$socail_media]);
    }

    public function store(Request $request) {
      $social_url = $request->social_url;
      if ($request->hasFile('icon')) {
        $icon = time().'.'.$request->icon->getClientOriginalExtension();
        $request->icon->move(('public/icon'), $icon);
        $icon;
      }
      $socail_media = DB::table('social_media')->insert(['socail_media_url'=>$social_url,'icon'=>$icon]);
      return redirect()->route('admin.social.media')->with('message','Social Media Added Successfully');      
    }

    public function delete($id){
      DB::table('social_media')->where('id','=',$id)->delete();
      return redirect()->route('admin.social.media')->with('message','Social Media Deleted Successfully');      
    }
    public function edit($id){
      $socail_media = DB::table('social_media')->where('id','=',$id)->select('*')->get();
      return view('admin.socialMedia.edit',['socail'=>$socail_media]);
    }

  public function update(Request $request){
    $social_url = $request->social_url;
    $icon = $request->icon;
    if ($request->hasFile('icon')) {
      $icon = time().'.'.$request->icon->getClientOriginalExtension();
      $request->icon->move(('public/icon'), $icon);
        
    }     
      $id = $request->id;
      $socail_media = DB::table('social_media')->where('id','=',$id)->update(['socail_media_url'=>$social_url,'icon'=>$icon]);
      return redirect()->route('admin.social.media')->with('message','Social Media Updated Successfully'); 
  }
}