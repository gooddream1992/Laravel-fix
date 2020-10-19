<?php
  namespace App\Http\Controllers\adminBackEnd;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;
  use App\EscortDropdown;
  use App\ServiceOffer;
  use App\LikeComment;
  use App\Feed;
  use DB;

class ClientController extends Controller
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


public function likeCommentStore(Request $request){

 // return $request;

  $likecomments= new LikeComment;
  $likecomments->escortId=$request->escortId;
  $likecomments->userId=$request->userId;
  $likecomments->likes=$request->likes;
  $likecomments->name=$request->name;
  $likecomments->email=$request->email;
  $likecomments->comments=$request->comments;
  $likecomments->save();




  return back()->with('message', 'Comment Successfully!');
}





}