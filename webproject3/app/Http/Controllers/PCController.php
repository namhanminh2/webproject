<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PC;
use App\Models\Producer;
use App\Models\Category;
//use DB;
use Illuminate\Support\Facades\DB;

class PCController extends Controller
{
    public function index()
    {
        $data = DB::table('p_c_s')
        ->join('categories', 'p_c_s.categoryID', '=', 'categories.categoryID')
        ->join('producers', 'p_c_s.producerID', '=', 'producers.producerID')
        ->select('p_c_s.*', 'categories.categoryName', 'producers.producerName')
        ->orderBy('p_c_s.PCID', 'desc')
        ->get();
        return view('list-pc', compact('data'));
    }
    public function addPC()
    {
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('add-pc',compact('dataCategory','dataProducer'));
    }
    public function savePC(Request $request)
    {
        $tempimage1 = $request->file('image1')->getClientOriginalName();
        $request->image1->move(public_path('images'),$tempimage1);
        $tempimage2 = $request->file('image2')->getClientOriginalName();
        $request->image2->move(public_path('images'),$tempimage2);
        $tempimage3 = $request->file('image3')->getClientOriginalName();
        $request->image3->move(public_path('images'),$tempimage3);
        $tempProduct = new PC();
        $tempProduct->PCID = $request->id; // du lieu tu form
        $tempProduct->PCName= $request->name;
        $tempProduct->PCPrice= $request->price;
        $tempProduct->PCDetail= $request->detail;
        $tempProduct->PCWarranty= $request->warranty;
        $tempProduct->PCImage1=  $tempimage1;
        $tempProduct->PCImage2= $tempimage2;
        $tempProduct->PCImage3=  $tempimage3;
        $tempProduct->categoryID= $request->category;
        $tempProduct->producerID= $request->producer;
        $tempProduct->save();
        return redirect()->back()->with(array('success'=>'PC Added Successfully!','success1'=>"Congratulation!")); // truyen qua success ben form}
    }
    public function editPC($id)
    {
        $data = PC::where('PCID', '=',$id)->first();
        $dataCategory = Category::get();
        $dataProducer = Producer::get();
        return view('edit-pc', compact('data','dataCategory','dataProducer'));
    }
    public function updatePC(Request $request)
    {
        $id = $request->id;
        if(isset($request->image1) && !empty(trim($request->image1)))
        {                     
            PC::where('PCID', '=',$id)->update
            (
                [
                'PCImage1'=>$request->image1,
                ]
            );            	                                               
        }
        if(isset($request->image2) && !empty(trim($request->image2)))
        {                     
            PC::where('PCID', '=',$id)->update
            (
                [
                'PCImage2'=>$request->image2,
                ]
            );            	                                               
        }
        if(isset($request->image3) && !empty(trim($request->image3)))
        {                     
            PC::where('PCID', '=',$id)->update
            (
                [
                'PCImage3'=>$request->image3,
                ]
            );            	                                               
        }               
        PC::where('PCID', '=',$id)->update
        (
            [
            'PCName'=>$request->name,
            'PCPrice'=>$request->price,
            'PCDetail'=>$request->detail,
            'PCWarranty'=>$request->warranty,
            'categoryID'=>$request->category,
            'producerID'=>$request->producer
            ]
        );
            return redirect()->back()->with('success','PC Updated Successfully!'); 
    }
    public function deletePC($id)
    {
        PC::where('PCID', '=',$id)->delete();
        return redirect()->back()->with('success','PC Deleted Successfully!'); 
    }    
}
