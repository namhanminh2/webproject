<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PCProducerController extends Controller
{
    public function index()
    {
        $data = Producer::get();
        return view('list-producer', compact('data'));
    }    
    public function addProducer()
    {
       //return "das";
        return view('add-producer');
    }
    public function saveProducer(Request $request)
    {
        $tempProduct = new Producer();
        $tempProduct->producerName = $request->producer; 
        $tempProduct->producerAddress = $request->address1; 
        $tempProduct->save();
        return redirect()->back()->with('success','Producer Added Successfully!');
    } 
    public function editProducer($id)
    {
        $data = Producer::where('producerID', '=',$id)->first();
        return view('edit-producer', compact('data'));
    } 
    public function updateProducer(Request $request)
    {
        $id = $request->id;         
        Producer::where('producerID', '=',$id)->update
        (
            [
            'producerName'=>$request->name,
            'producerAddress'=>$request->address,
            ]
        );
            return redirect()->back()->with('success','Producer Updated Successfully!'); 
    }
    public function deleteProducer($id)
    {
        Producer::where('producerID', '=',$id)->delete();
        return redirect()->back()->with('success','Producer Deleted Successfully!'); 
    }           
}
