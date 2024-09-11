<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('pages.admin.slider.index', compact('sliders'));
    }
    public function store(Request $request) {

        // $message = [
        //     'image.dimensions' => "image must be 1600x600px"
        // ];

        $request->validate([
            'headerline' => 'max:255',
            // 'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|dimensions:width=1600,height=600',
            
        ]);
        // $message

       
       
        try {
            $slider = new Slider();
            $slider->slogan = $request->slogan;
            $slider->headerline = $request->headerline;
            $slider->description = $request->description;
            $slider->image = $this->imageUpload($request, 'image', 'uploads/slider') ?? '';
            $slider->save();
            return redirect()->route('slider.index')->with('success', 'Slider Added Successful');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput();       
        }  
    }

    // Edit
    public function edit($id)
    {   
        $slider = Slider::find($id);
        return view('pages.admin.slider.edit', compact('slider'));
    }

    //update
    public function update(Request $request, $id)
    {
        // $message = [
        //     'image.dimensions' => "image must be 1600x600px"
        // ];

        $request->validate([
            'slogan' => 'max:255',
            'headerline' => 'max:255',
            'description' => 'max:255',
            // 'image' => 'mimes:jpg,png,bmp,jpeg,webp|dimensions:width=1600,height=600',
        ]);
        // image upload
        try {
            $slider = Slider::find($id);
            $sliderImage = '';
            if ($request->hasFile('image')) {
                if (!empty($slider->image) && file_exists($slider->image)) {
                    unlink($slider->image);
                }
                $sliderImage = $this->imageUpload($request, 'image', 'uploads/slider');
            }else{
                $sliderImage = $slider->image;
            }
            $slider->slogan = $request->slogan;
            $slider->headerline = $request->headerline;
            $slider->description = $request->description;
            $slider->image = $sliderImage;
            $slider->save();
            if($slider)
            {
                return redirect()->route('slider.index')->with('success', 'Slider Update Successful');
            }

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput()->with('error', 'Update Failed!');
        }
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!empty($slider->image) && file_exists($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Deleted Successful');
    }
}
