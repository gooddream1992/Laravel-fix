<?php 
namespace App\Http\Controllers\clientBackEnd;

  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;  
  use\App\SexTrafficking;
  use\App\LocalResource;
  use\App\PurchaseMarketing;
  use\App\BecomeEscort;
  use\App\Blog;
  use DB;

class ClientAccountController extends Controller 
{
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
	public function index() 
	{
    	return view('client.manageaccount.view');
	}

	public function checkPassword(Request $request)
	{
		if(Auth::Check())
		{
		  	$request_data = $request->old_password;
			if(Hash::check($request_data,Auth::user()->password))
			{
			  	echo json_encode("same");
		  	}
		  	else
		  	{
				echo json_encode("not_same");
			}
		}
	}
	
	public function changePassword()
	{
		$user_id = Auth::user()->id;
		$new_password = Hash::make($_POST['new_password']);
		$affected = DB::table('users')
			->where('id', $user_id)
			->update(['password' => $new_password]);
		echo json_encode($affected);
	}
}