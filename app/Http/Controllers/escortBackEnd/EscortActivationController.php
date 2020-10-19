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
      $profile_id = $request->profile_id;
      $switchStatus = $request->switchStatus;
      $todayDT = $request->todayDT;
      DB::table('users')->where('id','=',$profile_id)->update(['activation'=>$switchStatus,'timer'=>$todayDT]);
      echo "done";
    }
}