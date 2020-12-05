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
        return view('frontend/escort_dashboard/new.report.report');
	}
	
	public function storeReport()
	{
		$user_id = $_POST['escortId'];
		$report = $_POST['report'];
		$escort_id = Auth::user()->id;
		DB::table('report')->insert(['cust_id' => $user_id, 'escortId' => $escort_id,'report_msg'=>$report]);
		echo json_encode('1');
  }
  
  public function GetClientByNumber()
  {
    $keyword = $_POST['keyword'];

		$reports = DB::table('report')
				->where('cust_id',$keyword)
				->get();
	$response_html = '<label class="d-block">Reports</label>
	<div class="report-content">
		<ul>';
		if(count($reports) > 0)
		{
			foreach ($reports as $report_details)
			{
				$response_html .= '
				<li>
				<h5>'.
				$report_details->cust_id.' : '.$report_details->reported_on.' <span>- '.$report_details->report_msg.'</span>
				</h5>
				</li>';
			}
		}
		else
		{
			$response_html .= '
			<li>
				<h5>
					No Reports Found.
				</h5>
			</li>';
		}
	$response_html .= '</ul>
	</div>';
    echo json_encode(array('response_html'=>$response_html));
  }
}