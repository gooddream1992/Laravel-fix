<?php 
namespace App\Http\Controllers\escortBackEnd;

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

class EscortFeedController extends Controller {
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
		$user_id = Auth::user()->id;
		$follows = DB::table('follows')->where('escortID',Auth::user()->id)->get();
		$follow_arr = array();
		$all_liked_records = array();
		$comment_text = array();
		$comment_photo = array();
		$comment_name = array();
		$feed_arr = array();

		$profile_image = NULL;
		$profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',Auth::user()->id)->get();
		if(count($profile_image_arr) > 0)
		{
				$profile_image = $profile_image_arr[0]->image;
		}

		if($profile_image==NULL)
				$escort_prodile_image_path = asset('public/blankphoto.png');
		else  
				$escort_prodile_image_path = asset('public/uploads/'.$profile_image);
		// if(count($follows) > 0)
		// {
		// 	foreach ($follows as $follow_details) 
		// 	{
		// 		$follow_arr[] = $follow_details->escortId;
		// 	}
		$follow_arr[] = Auth::user()->id;
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
					$comment_photo[$details->feed_id][] = $details->cust_id == Auth::user()->id ? $profile_image : $details->photo;	
					$comment_name[$details->feed_id][] = $details->name;		
				}
			}
		}
		$comment_ids = isset($comment_id) ? $comment_id : '';
        return view('frontend/escort_dashboard/new.feed.feed',['feed'=>$feed,'like_data'=>$like_data,'comment_data'=>$comment_data,'comment_text'=>$comment_text,'comment_photo'=>$comment_photo,'comment_name'=>$comment_name,'comment_id'=>$comment_ids,'escort_prodile_image_path'=>$escort_prodile_image_path]);
		}
		
		public function uploadPost()
		{
			return view('frontend/escort_dashboard/new.feed.uploadfeed');
		}

		public function escortFeedUpload()
		{
			return view('frontend/escort_dashboard/new.feed.feed-upload');
		}
		
	public function likeUnlike()
	{
		$feed_id = isset($_POST['feedId']) ? $_POST['feedId'] : NULL;
		$user_id = Auth::user()->id;
		
		$get_all_records = DB::table('feed_update')->where([['cust_id','=',$user_id],['feed_id','=',$feed_id],['like','!=','0']])->get();
		$feed_details = DB::table('feeds')->where('id',$feed_id)->get();
		if (count($get_all_records) > 0) 
		{
			
			DB::table('feed_update')->where([['cust_id','=',$user_id],['feed_id','=',$feed_id],['like','!=','0']])->delete();
			DB::table('notification')->insert([
				'notification_title'=>"Someone unliked your update.",
				'url'=> "profile/".Auth::user()->id,
				'type'=> "escort",
				'notification_content'=>Auth::user()->name." unliked your Post.",
				'client_id'=>Auth::user()->id,
				'user_id'=>$feed_details[0]->escortId,
				'feed_id'=>$feed_id
		]);
		}
		else
		{
			
			DB::table('feed_update')->insert(['cust_id' => $user_id, 'feed_id' => $feed_id,'like'=>'1']);
			DB::table('notification')->insert([
				'notification_title'=>"Someone liked your update.",
				'url'=> "profile/".Auth::user()->id,
				'type'=> "escort",
				'notification_content'=>Auth::user()->name." liked your Post",
				'client_id'=>Auth::user()->id,
				'user_id'=>$feed_details[0]->escortId,
				'feed_id'=>$feed_id	
		]);
		}
		echo json_encode('1');
	}
	
	public function doComment()
	{
		$feed_id = isset($_POST['feedId']) ? $_POST['feedId'] : NULL;
		$comment = $_POST['comment'];
		$user_id = Auth::user()->id;
		DB::table('feed_update')->insert(['cust_id' => $user_id, 'feed_id' => $feed_id,'comment'=>$comment]);
		$feed_details = DB::table('feeds')->where('id',$feed_id)->get();
		$profile_image = NULL;
		if(Auth::user()->roleStatus=='2')
		{
			$profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',Auth::user()->id)->get();
		}
		if(Auth::user()->roleStatus=='3')
		{
			$profile_image_arr = DB::table('users')->select('photo as image')->where('id',Auth::user()->id)->get();
		}
		if(count($profile_image_arr) > 0)
		{
				$profile_image = $profile_image_arr[0]->image;
		}
		DB::table('notification')->insert([
				'notification_title'=>"Someone commented on your Post",
				'url'=> "profile/".Auth::user()->id,
				'type'=> "escort",
				'notification_content'=>Auth::user()->name." commented : ".$comment,
				'client_id'=>Auth::user()->id,
				'user_id'=>$feed_details[0]->escortId,
				'feed_id'=>$feed_id
		]);
		if($profile_image==NULL)
				$image_path = asset('public/blankphoto.png');
		else  
				$image_path = asset('public/uploads/'.$profile_image);
		echo json_encode(array('comment'=>$comment,'image'=>$image_path));
	}

	public function store(Request $request){
		$user_role = Auth::user();
		$title = Auth::user()->name." uploaded new post";
		$description = $request->description;                
		$photo = '';
		if ($request->hasFile('imageurl')) {
				$photo = time().'.'.$request->imageurl->getClientOriginalExtension();
				$destinationPath = 'public/uploads/'; // upload path
				$request->imageurl->move($destinationPath,$photo);
		}
		DB::table('feeds')->insert([
				'date'=>date('Y-m-d'),
				'escortId'=>Auth::user()->id,
				'title'=>$title,
				'description'=>$description,
				'image'=>$photo
		]);
		return redirect()->back()->with('message', "New Post uploaded Successfully!");
}    

public function delete($id)
{
	DB::table('feeds')->where('id',$id)->delete();
	return redirect()->back()->with('message', "Post deleted Successfully!");
}
}