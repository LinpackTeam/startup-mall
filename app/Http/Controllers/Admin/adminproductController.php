use App\Http\Controllers\Controller;
use DB;
use Session;

class adminproductController extends Controller
{
    public function pendingproduct(Request $request)
    {
                $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('product')
                         ->where('status','pending_for_verification')
    	 		          ->get();
    	         return view('admin.product1.admin_pending',compact("admin_email","product","admin"));
    }
  public function approvedproduct(Request $request)
    {
                $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('product')
                         ->where('status','approved')
    	 		          ->get();
    	         return view('admin.product1.admin_approved',compact("admin_email","product","admin"));
}}
    