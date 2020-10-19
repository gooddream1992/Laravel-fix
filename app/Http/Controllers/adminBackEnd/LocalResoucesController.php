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

class LocalResoucesController extends Controller
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


  public function index(){
    $city = DB::table('cities')->select('*')->get();
    return view('admin.localResources.index',['city'=>$city]);
  }
  public function store(Request $request){
    $name = $request->name;
    $title = $request->title;
    $section = $request->section;
    $city_id = $request->city_id;
    if ($request->hasFile('imageurl')) {
      $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
      $destinationPath = 'public/localresources/'; // upload path
      $request->imageurl->move($destinationPath,$photo);
          
    }
    DB::table('local_resorces_data')->insert(['name'=>$name,'title'=>$title,'image'=>$photo,'section'=>$section,'suburb'=>$city_id]);
    
    return redirect()->back()->with('message', "Local Resources Added Successfully!");
  }
  public function view(){
    $data = DB::table('local_resorces_data')
    ->join('cities','local_resorces_data.suburb','cities.id')
    ->select('*')->paginate(10);
    return view('admin.localResources.view',['data'=>$data]);
  }
  public function delete($id){
    DB::table('local_resorces_data')->where('id','=',$id)->delete();
    return redirect()->back()->with('message', "Local Resources Deleted Successfully!");
  }

  public function edit($id){
    $data = DB::table('local_resorces_data')->where('id','=',$id)->select('*')->get()[0];
    return view('admin.localResources.edit',['data'=>$data,'id'=>$id]); 
  }
  public function update(Request $request){
     $id = $request->id;
     $name = $request->name;
    $title = $request->title;
    $section = $request->section;
    $city_id = $request->city_id;
    $photo =$request->imageurl;
    if ($request->hasFile('imageurl')) {
      $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
      $destinationPath = 'public/localresources/'; // upload path
      $request->imageurl->move($destinationPath,$photo);   
    }
    DB::table('local_resorces_data')->where('id','=',$id)->update(['name'=>$name,'title'=>$title,'image'=>$photo,'section'=>$section,'suburb'=>$city_id]);
   return redirect()->route('local.resources.admin.view')->with('message', "Local Resources Updated Successfully!");
  }
}