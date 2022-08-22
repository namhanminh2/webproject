<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserAdminController extends Controller
{
    public function index()
    {
        $data = Users::get();
        return view('list-user', compact('data'));
    }    
    public function deleteUser($id)
    {
        Users::where('userID', '=',$id)->delete();
        return redirect()->back()->with('success','Producer Deleted Successfully!'); 
    } 
}
