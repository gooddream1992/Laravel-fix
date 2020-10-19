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
		$feed_arr = array();
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
					->whereIn('feed_id', $feed_arr)
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
				}
			}
		}
        return view('frontend/escort_dashboard/new.feed.feed',['feed'=>$feed,'like_data'=>$like_data,'comment_data'=>$comment_data,'comment_text'=>$comment_text]);
    }

	public function likeUnlike()
	{
		$feed_id = $_POST['feedId'];
		$user_id = Auth::user()->id;
		
		$get_all_records = DB::table('feed_update')->where('cust_id',$user_id)->where('feed_id',$feed_id)->get();
		if (count($get_all_records) > 0) 
		{
			DB::table('feed_update')->where([['cust_id','=',$user_id],['feed_id','=',$feed_id],['like','!=','0']])->delete();
		}
		else
		{
			DB::table('feed_update')->insert(['cust_id' => $user_id, 'feed_id' => $feed_id,'like'=>'1']);
		}
		echo json_encode('1');
	}
	
	public function doComment()
	{
		$feed_id = $_POST['feedId'];
		$comment = $_POST['comment'];
		$user_id = Auth::user()->id;
		DB::table('feed_update')->insert(['cust_id' => $user_id, 'feed_id' => $feed_id,'comment'=>$comment]);
		echo json_encode('1');
	}

	public function store(Request $request){
		$user_role = Auth::user();
		$title = "Uploaded new post";
		$description = $request->description;                
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
		return redirect()->back()->with('message', "New post uploaded Successfully!");
}    
}