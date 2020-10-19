<?php
  namespace App\Http\Controllers\adminBackEnd;
  use Illuminate\Http\Request;
  use App\Http\Controllers\Controller;
  use Auth;
  use App\User;
  use App\EscortDropdown;
  use App\ServiceOffer;
  use App\ServiceOfferAssign;
  use App\Feed;
  use DB;

class FaqClientEscortController extends Controller
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


    public function index(){
        return view('admin.faqClientEscort.index');
    }

    public function store(Request $request){
        $question = $request->question;
        $roleType = $request->roleType;
        $answer = $request->answer;
        DB::table('faq_escort_client')->insert([
            'question' =>$question,
            'answer' => $answer,
            'roleType' => $roleType
        ]);
        return redirect()->route('faq.client.escort.view');
    }

    public function view(){
        $data = DB::table('faq_escort_client')->select('*')->get();
        return view('admin.faqClientEscort.view',['data'=>$data]);   
    }

    public function delete($id){
        DB::table('faq_escort_client')->where('id','=',$id)->delete();
        return redirect()->route('faq.client.escort.view');
    }

    public function edit($id){
        $data = DB::table('faq_escort_client')->where('id','=',$id)->select('*')->get();
        return view('admin.faqClientEscort.edit',['data'=>$data]);   
    }

    public function update(Request $request){
        $id = $request->id;
        $question = $request->question;
        $roleType = $request->roleType;
        $answer = $request->answer;
        DB::table('faq_escort_client')->where('id','=',$id)->update([
            'question' =>$question,
            'answer' => $answer,
            'roleType' => $roleType
        ]);
        return redirect()->route('faq.client.escort.view');
    }
}