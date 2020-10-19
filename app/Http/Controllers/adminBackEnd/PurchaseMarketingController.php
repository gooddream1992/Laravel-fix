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

class PurchaseMarketingController extends Controller
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
    return view('admin.purchasemarketing.index');
  }
  public function store(Request $request){
   $title = $request->title;
   $description = $request->description;
    if ($request->hasFile('imageurl')) {
      $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
      $destinationPath = 'public/purchasemarketing/'; // upload path
      $request->imageurl->move($destinationPath,$photo);
          
    }
    DB::table('purchasemarketingData')->insert(['title'=>$title,'image'=>$photo,'description'=>$description]);
    
    return redirect()->back()->with('message', "Purchase Marketing Blog Added Successfully!");
  }
  public function view(){
    $data = DB::table('purchasemarketingData')->select('*')->get();
    return view('admin.purchasemarketing.view',['data'=>$data]);
  }
  public function delete($id){
    DB::table('purchasemarketingData')->where('id','=',$id)->delete();
    return redirect()->back()->with('message', "Purchase Marketing Blog Deleted Successfully!");
  }

  public function edit($id){
    $data = DB::table('purchasemarketingData')->where('id','=',$id)->select('*')->get()[0];
    return view('admin.purchasemarketing.edit',['data'=>$data,'id'=>$id]); 
  }
  public function update(Request $request){
     $id = $request->id;
      $title = $request->title;
   $description = $request->description;
    $photo =$request->imageurl;
    if ($request->hasFile('imageurl')) {
      $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
      $destinationPath = 'public/purchasemarketing/'; // upload path
      $request->imageurl->move($destinationPath,$photo);   
    }
    DB::table('purchasemarketingData')->where('id','=',$id)->update(['title'=>$title,'image'=>$photo,'description'=>$description]);
   return redirect()->route('purchase.marketing.admin.view')->with('message', "Purchase Marketing Blog Updated Successfully!");
  }
}