<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackImage;


class BackImageController extends Controller
{

    // public function index(){
    //     $spImage = BackImage::latest()->get();
    //     return view('pages.admin.backimage.index',compact('spImage'));
    // }
    // public function store(Request $request){
    //     $request->validate([
    //         'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
    //     ]);
    //     $spslider = new BackImage();
    //     $spslider->image = $this->imageUpload($request, 'image', 'uploads/spslider') ?? '';
    //     $spslider->save();
    //     if($spslider) {
    //         return redirect()->route('bgslider.index')->with('success', 'Insert Successfull');
    //     }
    //     return redirect()->back()->withInput();
    // }
    // public function edit($id){
    //     $spslider = BackImage::find($id);
    //     return view('pages.admin.backimage.edit',compact('spslider'));
    // }
    // public function update(Request $request , BackImage $spslider){
    //     $spsliderImage = '';
    //     if ($request->hasFile('image')) {
    //         if (!empty($spslider->image) && file_exists($spslider->image)) {
    //             unlink($spslider->image);
    //         }
    //         $spsliderImage = $this->imageUpload($request, 'image', 'uploads/spslider');
    //     }else{
    //         $spsliderImage = $spslider->image;
    //     }

    //     $spslider->image = $spsliderImage;
    //     $spslider->save();
    //     if($spslider)
    //     {
    //         return redirect()->back();
    //     }
    //     return redirect()->back()->withInput()->with('success', 'Update Success');

    // }
    // public function delete(BackImage $spslider){
    //     if (!empty($spslider->image) && file_exists($spslider->image)) {
    //         unlink($spslider->image);
    //     }
    //     $spslider->delete();
    //     return redirect()->back()->with('success', 'Deleted Successfull');
    // }

    public function index(){
        $banner = BackImage::first();
        return view('pages.admin.backimage.index',compact('banner'));
    }
  public function update(Request $request, BackImage $banner)
   {
     // dd($request->all());
     $request->validate([
         'image' => 'mimes:jpg,jpeg,png,bmp,webp',
     ]);

     // Image Update
     try {
         $AboutImage = $banner->image;
         if($request->hasFile('image')) {
             if(!empty($banner->image) && file_exists($banner->image))
             {
                 unlink($banner->image);
             }
             $AboutImage = $this->imageUpload($request, 'image', 'uploads/banner');
         }

        
         $banner->title = $request->title;
         $banner->description = $request->description;
         $banner->image = $AboutImage;
         $banner->save();
         return redirect()->back()->with('success','Update Successful!');        

     } catch (\Throwable $th) {
         // return redirect()->back()->withInput();
         return redirect()->back()->with('error', 'Update Failed!');
     }    
 }
    

}
