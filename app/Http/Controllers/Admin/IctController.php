<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ict;
use App\Models\ictMultiImage;
use Illuminate\Http\Request;

class IctController extends Controller
{
    public function index(){
        $ict = ict::latest()->get();
        return view('pages.admin.ict.index',compact('ict'));
    }
    public function store(Request $request ){
        $request->validate([
            'title' => 'required',
        ]);
        $ict = new ict();
        $ict->title = $request->title;
        $ict->save();

        $ictImage = $this->imageUpload($request, 'multiimage', 'uploads/ict');
            if (is_array($ictImage) && count($ictImage)) {
                foreach ($ictImage as $image) {
                    $imagePath = new ictMultiImage();
                    $imagePath->ict_id = $ict->id;
                    $imagePath->multiimage = $image;
                    $imagePath->save();
                }
            }
        if($ict) {
            return redirect()->route('ict.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    public function edit($id){
        $ict = ict::with('ictImage')->find($id);
        return view('pages.admin.ict.edit',compact('ict'));
    }

    
    public function removeImageCtet($id)
    {
        try {
            $removeImage = ictMultiImage::find($id);
            $newsId = $removeImage->ict_id;
            if (!empty($removeImage->multiimage) && file_exists($removeImage->multiimage)) {
                unlink($removeImage->multiimage);
            }
            $removeImage->delete();

            $ictImage =  ictMultiImage::where("ict_id", $newsId)->get();
            return response()->json(['success' => true, 'ictImage' => $ictImage]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'newsId' => false]);
        }
    }


    public function update(Request $request ,ict $ict){

     
        $ict->title = $request->title;
        $ict->save();

        // multiple image
        $ictImage = $this->imageUpload($request, 'multiimage', 'uploads/ict');
        if (is_array($ictImage) && count($ictImage)) {
            foreach ($ictImage as $image) {
                $imagePath = new ictMultiImage();
                $imagePath->ict_id = $ict->id;
                $imagePath->multiimage = $image;
                $imagePath->save();
            }
        }

        if($ict)
        {
            return redirect()->route('ict.index')->with('success', 'Update Success');
        }
        return redirect()->back()->withInput();
    }

 
    public function delete(ict $ict)
    {
   
       try {
         if (!empty($ict->ictImage) ) {
             foreach ($ict->ictImage as $ictImage) {
                 if (!empty($ictImage->multiimage) && file_exists($ictImage->multiimage)) {
                     unlink($ictImage->multiimage);
                 }
                 $ictImage->delete();
             }
          
         }
         $ict->delete();
         return redirect()->back()->with('success', 'Deleted Successfull');
       } catch (\Throwable $th) {
         return redirect()->back()->with('error', $th->getMessage());
       }
 
     }
}
