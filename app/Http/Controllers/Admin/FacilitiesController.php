<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    public function index(){
        $facilities = Facilities::latest()->get();
        return view('pages.admin.facilities.index',compact('facilities'));
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'title' => 'required',
            'header' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
        ]);
        $facilities = new Facilities();
        $facilities->header = $request->header;
        $facilities->title = $request->title;
        $facilities->description = $request->description;
        $facilities->facilitie_type = $request->facilitie_type;
        $facilities->image = $this->imageUpload($request, 'image', 'uploads/facilities') ?? '';
        $facilities->save();
        if($facilities) {
            return redirect()->route('facilities.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }
    public function edit($id){
        $facilities = Facilities::find($id);
        return view('pages.admin.facilities.edit',compact('facilities'));
    }
    public function update(Request $request, Facilities $facilities){
        $facilitiesImage = '';
        if ($request->hasFile('image')) {
            if (!empty($facilities->image) && file_exists($facilities->image)) {
                unlink($facilities->image);
            }
            $facilitiesImage = $this->imageUpload($request, 'image', 'uploads/facilities');
        }else{
            $facilitiesImage = $facilities->image;
        }
        $facilities->header = $request->header;
        $facilities->title = $request->title;
        $facilities->description = $request->description;
        $facilities->facilitie_type = $request->facilitie_type;
        $facilities->image = $facilitiesImage;
        $facilities->save();
        if($facilities)
        {
            return redirect()->back();
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
    }
    public function delete(Facilities $facilities){
        if (!empty($facilities->image) && file_exists($facilities->image)) {
            unlink($facilities->image);
        }
        $facilities->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
