<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminWebsiteController extends Controller
{
    public function index()
    {
        return view('admin-view-login');
    }
    public function loginAdmin(Request $request)
    {
        $admins = Admins::where('adminName','=',$request->adminName)->first();
        if($admins){
            if(Hash::check($request->adminPassword, $admins->adminPassword)){
                $request->session()->put('adminName', $admins->adminName);
                return redirect('list-pc');
            }else {
                return back() -> with('fail', 'Password not matches.');
            }
        }else{
            return back() -> with('fail', 'This userName is not registered');
        }
    }
    public function dashboard(){
        return "WELCOME!!!";
    }
    public function logout(){
        if(Session::has('adminName')){
            Session::pull('adminName');
            return view('admin-view-login');
        }
    }
}