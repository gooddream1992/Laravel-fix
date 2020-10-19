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

class EscortReportController extends Controller {
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
		$user_role = Auth::user();
		$user_id = Auth::user()->id;
		$reports = DB::table('report')
					->join('users','users.id','report.escortId')
					->where('cust_id',Auth::user()->id)
					->get();
        return view('frontend/escort_dashboard/new.report.report',['reports'=>$reports]);
	}
	
	public function doReport()
	{
		$escort_id = $_POST['escortId'];
		$report = $_POST['report'];
		$user_id = Auth::user()->id;
		DB::table('feed_update')->insert(['cust_id' => $user_id, 'escortId' => $escort_id,'report_msg'=>$report]);
		echo json_encode('1');
  }
  
  public function GetClientByNumber()
  {
    $response = '<ul><li>Testing One</li><li>Testing Two</li><li>Testing Three</li><li>Testing Four</li></ul>';
  }
}