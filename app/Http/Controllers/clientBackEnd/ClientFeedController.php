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

class ClientFeedController extends Controller {
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
		$follows = DB::table('friend_list')->where([['cust_id',Auth::user()->id],['status','1']])->get();
		$follow_arr = array();
		$all_liked_records = array();
		$feed = array();
		$comment_text = array();
		$comment_photo = array();
		$comment_name = array();
		$feed_arr = array();
		if(count($follows) > 0)
		{
			foreach ($follows as $follow_details) 
			{
				$follow_arr[] = $follow_details->escortId;
			}
			
			if(count($follow_arr) > 0)
			{
				$feed = DB::table('feeds')
					->join('users','users.id','feeds.escortId')
					->select('feeds.*','users.name')
					->whereIn('feeds.escortId', $follow_arr)
					->orderBy('feeds.id','desc')
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
			
		}

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
					if($details->roleStatus == '2')
					{
						$data = DB::table('profile_images')->where('escortId',$details->cust_id)->where('status','5')->first();
						$image = $data->image;
					}
					else
					{
						$image = $details->photo;
					}
					$comment_photo[$details->feed_id][] = $image;	
					$comment_name[$details->feed_id][] = $details->name;	
				}
			}
		}
        return view('client.feed',['feed'=>$feed,'like_data'=>$like_data,'comment_data'=>$comment_data,'comment_text'=>$comment_text,'comment_photo'=>$comment_photo,'comment_id'=>$comment_id,'comment_name'=>$comment_name]);
    }

	public function likeUnlike()
	{
		$feed_id = $_POST['feedId'];
		$user_id = Auth::user()->id;
		
		$get_all_records = DB::table('feed_update')->join('feeds','feeds.id','feed_update.feed_id')->where('feed_update.cust_id',$user_id)->where('feed_update.feed_id',$feed_id)->get();
		if (count($get_all_records) > 0) 
		{

			DB::table('notification')->insert([
				'notification_title'=>Auth::user()->name." unliked your update.",
				'url'=> "escort/feed",	
				'type'=> "escort",
				'client_id' => $user_id,
				'notification_content'=>Auth::user()->name." unliked your update.",
				'user_id'=>$get_all_records[0]->escortId
				]);
			DB::table('feed_update')->where('cust_id','=',$user_id)->where('feed_id','=',$feed_id)->delete();
		}
		else
		{
			$get_all_records = DB::table('feeds')->where('id',$feed_id)->get();
			DB::table('notification')->insert([
				'notification_title'=>Auth::user()->name." liked your update.",
				'url'=> "escort/feed",
				'type'=> "escort",
				'client_id' => $user_id,
				'notification_content'=>Auth::user()->name." liked your update.",
				'user_id'=>$get_all_records[0]->escortId
				]);
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
		$get_all_records = DB::table('feeds')->where('id',$feed_id)->get();
		DB::table('notification')->insert([
			'notification_title'=>Auth::user()->name." commented on your update.",
			'url'=> "escort/feed",
			'type'=> "escort",
			'client_id' => $user_id,
			'notification_content'=>$comment,
			'user_id'=>$get_all_records[0]->escortId
			]);
		echo json_encode('1');
	}
}