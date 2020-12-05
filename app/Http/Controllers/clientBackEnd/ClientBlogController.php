<?php 
namespace App\Http\Controllers\clientBackEnd;

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

class ClientBlogController extends Controller {
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
    public function index() {
        $user_role = Auth::user();
        $blog = DB::table('blogs')
        ->where([
            ['role','=',$user_role->roleStatus],
            ['publishBy','=',$user_role->id]
        ])->select('*')->get();
        return view('client.blog',['blog'=>$blog]);
    }

    public function store(Request $request){
        $user_role = Auth::user();
            $title = $request->title;
            $description = $request->description;                
            if ($request->hasFile('imageurl')) {
                $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
                $destinationPath = 'public/client_library/upload/blog/'; // upload path
                if(isset($photo) && $photo!='')
                {
                  $request->imageurl->move($destinationPath,$photo);
                }
            }
            DB::table('blogs')->insert([
                'title'=>$title,
                'description'=>$description,
                'imageurl'=>isset($photo) && $photo!='' ? $photo : 'blankphoto.png',
                'role'=> $user_role->roleStatus,
                'publishBy'=> $user_role->id
            ]);
            return redirect()->back()->with('message', "Local Resources Added Successfully!");
    }

    public function details($id){
        $blog_details = DB::table('blogs')
        ->join('users','blogs.publishBy','users.id')
        ->where('blogs.id','=',$id)
        ->select('blogs.id as id','blogs.title as title','blogs.description as description','blogs.imageurl as image','users.name','blogs.created_at as created_at')
        ->get();
        return view('client.blog_details',['blog_details'=>$blog_details]);
    }

    public function edit($id){
       $blog_details = DB::table('blogs')
        ->join('users','blogs.publishBy','users.id')
        ->where('blogs.id','=',$id)
        ->select('blogs.id as id','blogs.title as title','blogs.description as description','blogs.imageurl as image','users.name','blogs.created_at as created_at')
        ->get()[0];
        return view('client.blog_edit',['blog_details'=>$blog_details]);
    }

    public function update(Request $request){
      $id = $request->id;
      $user_role = Auth::user();
      $title = $request->title;
      $description = $request->description;                
      $photo = $request->imageurl;                
      if ($request->hasFile('imageurl')) {
        $photo = time().'.'.$request->imageurl->getClientOriginalExtension();
        $destinationPath = 'public/client_library/upload/blog/'; // upload path
        $request->imageurl->move($destinationPath,$photo);
      }
      DB::table('blogs')
        ->where('id','=',$id)
        ->update([
          'title'=>$title,
          'description'=>$description,
          'imageurl'=>$photo,
          'role'=> $user_role->roleStatus,
          'publishBy'=> $user_role->id
      ]);
      return redirect()->route('client.blog')->with('message', "Local Resources Added Successfully!");
    }

    public function delete($id){
      DB::table('blogs')->where('id','=',$id)->delete();
      return redirect()->route('client.blog')->with('message', "Local Resources Added Successfully!");
    }
}