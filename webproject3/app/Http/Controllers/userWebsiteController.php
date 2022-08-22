<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\PC;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Producer;

class userWebsiteController extends Controller
{
    public function index()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('user-view-homepage',compact('dataCategory','dataProducer'));
    }   
    public function listUserProduct()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $data = DB::table('p_c_s')
        ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
        ->join('producers', 'p_c_s.producerID', '=', 'producers.producerID')
        ->select('p_c_s.*', 'categories.categoryName', 'producers.producerName')
        ->orderBy('p_c_s.PCID', 'desc')
        ->get();
        return view('user-view-product', compact('data','dataCategory','dataProducer'));
    }
    public function listCategory($id)
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $data = DB::table('p_c_s')
        ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
        ->join('producers', 'p_c_s.producerID', '=', 'producers.producerID')
        ->where('p_c_s.categoryID', '=',$id)
        ->get();
        return view('user-view-list-category', compact('data','dataCategory','dataProducer'));
    }    
    public function listProducer($id)
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $data = DB::table('p_c_s')
        ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
        ->join('producers', 'p_c_s.producerID', '=', 'producers.producerID')
        ->where('p_c_s.producerID', '=',$id)
        ->get();
        return view('user-view-list-producer', compact('data','dataCategory','dataProducer'));
    }  
    public function productDetail($id)
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $data = DB::table('p_c_s')
        ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
        ->join('producers', 'p_c_s.producerID', '=', 'producers.producerID')
        ->select('p_c_s.*', 'categories.categoryName', 'producers.producerName')
        ->where('p_c_s.PCID', '=',$id)
        ->orderBy('p_c_s.PCID', 'desc')
        ->get();
        return view('user-view-productdetail', compact('data', 'dataCategory','dataProducer'));
    }   
    public function aboutPage()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('user-view-about', compact('dataCategory','dataProducer'));
    }
    public function contactusPage()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('user-view-contactus', compact('dataCategory','dataProducer'));
    }
    public function login()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('user-view-login', compact('dataCategory','dataProducer'));
    }
    public function registerUser(Request $request)
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $users = new Users();   
        $users -> userName = $request -> userName;
        $users -> userPassword = Hash::make($request->userPassword);
        $users -> userFullname = $request -> userFullname;
        $users -> userAddress = $request -> userAddress;
        $users -> userPhoneNumber = $request -> userPhoneNumber;
        $res = $users -> save();
        if($res){
            return back() -> with('success', 'You have registered successfully');
        } else {
            return back() -> with('fail', 'Something wrong');
        }
    }
    public function loginUser(Request $request)
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();

        $user = Users::where('userName','=',$request->userName)->first();
        if($user){
            if(Hash::check($request->userPassword, $user->userPassword)){
                $request->session()->put('userName', $user->userName);
                return redirect('dashboard');
            }else {
                return back() -> with('fail', 'Password not matches.');
            }

        }else{
            return back() -> with('fail', 'This userName is not registered');
        }
    }
    public function dashboard(){
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('user-view-homepage', compact('dataCategory','dataProducer'));
    }
    public function logout(){
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        if(Session::has('userName')){
            Session::pull('userName');
            return view('user-view-homepage', compact('dataCategory','dataProducer'));
        }
    }
    public function infomation($id){
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        $data = Users::where('userName', '=', $id)->first();
        return view('infomation', compact('data', 'dataCategory','dataProducer'));
    }
    public function updateInfomation(Request $request){
        $id = $request -> id;
        Users::where('userID', '=', $request->userid)->update([
            'userFullname' => $request->name,
            'userPhoneNumber' => $request->phone,
            'userAddress' => $request->address
        ]);
        return redirect()->back()->with(array('success'=>'Edit Successfully!'));
    }
    public function search(){
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        if(isset($_GET['query']) && strlen($_GET['querry']) > 2){
            $search_text = $_GET['query'];
            $data = DB::table('p_c_s')
            ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
            ->where('p_c_s.PCName', 'LIKE', '%'.$search_text.'%')->get();
            return view('search', compact('data', 'dataCategory','dataProducer'));
        }

    }
}
