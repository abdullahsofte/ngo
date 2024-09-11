<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function index() {
        $testimonial = Testimonial::latest()->get();
        return view('pages.admin.testimonial.index', compact('testimonial'));
    }
    public function store(Request $request) {
        // return $request;
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif,webp',
        ]);
        $image = $request->file('image');
        $nameGen = hexdec(uniqid());
        $imgExt = strtolower($image->getClientOriginalExtension());
        $imgName = $nameGen. '.' . $imgExt;
        $upLocation = 'uploads/testimonial/';
        Image::make($image)->resize(430,140)->save($upLocation . $imgName);

        try {
            $testimonial = new Testimonial();
            $testimonial->title = $request->title;
            $testimonial->description = $request->description;
            $testimonial->image = $upLocation . $imgName;
            $testimonial->created_at = Carbon::now();
            $testimonial->save();

       
            return redirect()->back()->with('success', 'Testimonial Insertion Successfull!');
        } catch (\Exception $e) {        
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('error', 'Testimonial Insertion Failed!');
        }
    }
    public function edit($id) {
        $testimonial = Testimonial::find($id);
        return view('pages.admin.testimonial.edit', compact('testimonial'));
    }


    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'Image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        try {
            $testimonial = Testimonial::find($id);
            $testimonial->title = $request->title;
            $testimonial->description = $request->description;

            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(430,140)->save('uploads/testimonial/' . $imageName);
                if(file_exists($testimonial->image) && !empty($testimonial->image)) {
                    unlink($testimonial->image);
                }
                $testimonial['image'] = 'uploads/testimonial/'.$imageName;
            }
            $testimonial->save();
          
            return Redirect()->route('testimonial.index')->with("success", "Testimonial Update Successfull");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'testimonial Update failed!');
        }
    }
    public function delete($id) {
        $testimonial = Testimonial::find($id);
        if(file_exists($testimonial->image) AND !empty($testimonial->image)){
            unlink($testimonial->image);
        }
        $testimonial->delete();
        return Redirect()->back()->with("success", "Testimonial Deleted Successfully");
    }
}
