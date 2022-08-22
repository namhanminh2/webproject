<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PCCategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view('list-category', compact('data'));
    }    
    public function addCategory()
    {
       //return "das";
        return view('add-category');
    }
    public function saveCategory(Request $request)
    {
        $tempProduct = new Category();
        $tempProduct->categoryName = $request->category; 
        $tempProduct->categoryInfo = $request->info;
        $tempProduct->save();
        return redirect()->back()->with('success','Category Added Successfully!'); 
    } 
    public function editCategory($id)
    {
        $data = Category::where('categoryID', '=',$id)->first();
        return view('edit-category', compact('data'));
    }  
    public function updateCategory(Request $request)
    {
        $id = $request->id;         
        Category::where('categoryID', '=',$id)->update
        (
            [
            'categoryName'=>$request->name,
            'categoryInfo'=>$request->info1,
            ]
        );
            return redirect()->back()->with('success','Category Updated Successfully!'); 
    }
    public function deleteCategory($id)
    {
        Category::where('categoryID', '=',$id)->delete();
        return redirect()->back()->with('success','Category Deleted Successfully!'); 
    }          
}
