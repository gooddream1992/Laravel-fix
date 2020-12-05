<?php 
namespace App\Http\Controllers\escortBackEnd;

use Auth;
use App\Feed;
use App\User;
use App\City;
use App\Follow;
use App\Country;
use App\ProfileRate;
use App\ServiceOffer;
use App\ProfileImage;
use App\EscortDropdown;
use App\ProfileWishlist;
use App\ProfileFavourite;
use App\ServiceOfferAssign;
use App\ProfileDescription; 
use App\ProfileAvailability;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use Carbon\Carbon;
class EscortActivationController extends Controller {
    /**
     * Create a new  instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajaxCall(Request $request){

      $dtime = Auth::user()->timer;
      $check1 = $request->check1;
      $profile_id = Auth::user()->id;
      $switchStatus = ((Auth::user()->activation == 1) ? 0 : 1);
      $current = Carbon::now();
      $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$check1.' hour',strtotime($current)));
      DB::table('users')->where('id','=',$profile_id)->update(['activation'=>$switchStatus,'timer'=>$cenvertedTime]);
      return redirect()->back();
      
    }

    public function ajaxCallDeactivate(Request $request){
      $switchStatus  = $request->switchStatus; 
      $profile_id = Auth::user()->id;
      DB::table('users')->where('id','=',$profile_id)->update(['activation'=>$switchStatus,'timer'=>NULL]);
    }
}