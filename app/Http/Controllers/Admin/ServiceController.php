<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index() {
        $service = Service::latest()->get();
        return view('pages.admin.service.index', compact('service'));
    }
    public function store(Request $request) {
        // return $request;
        $request->validate([
            'title' => 'required',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif,webp',
        ]);
        $image = $request->file('image');
        $nameGen = hexdec(uniqid());
        $imgExt = strtolower($image->getClientOriginalExtension());
        $imgName = $nameGen. '.' . $imgExt;
        $upLocation = 'uploads/service/';
        Image::make($image)->resize(100,100)->save($upLocation . $imgName);

        try {
            $service = new Service();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->image = $upLocation . $imgName;
            $service->created_at = Carbon::now();
            $service->save();
            return redirect()->back()->with('success', 'Service Insertion Successfull!');
        } catch (\Exception $e) {        
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('error', 'Service Insertion Failed!');
        }
    }
    public function edit($id) {
        $service = Service::find($id);
        return view('pages.admin.service.edit', compact('service'));
    }



    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:4',
            'image' => 'Image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        try {
            $service = Service::find($id);
            $service->title = $request->title;
            $service->description = $request->description;

            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(100,100)->save('uploads/service/' . $imageName);
                if(file_exists($service->image) && !empty($service->image)) {
                    unlink($service->image);
                }
                $service['image'] = 'uploads/service/'.$imageName;
            }
            $service->save();

           
            return Redirect()->route('service.index')->with("success", "Service Update Successfull");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Service Update failed!');
        }
    }
    public function delete($id) {
        $service = Service::find($id);
        if(file_exists($service->image) AND !empty($service->image)){
            unlink($service->image);
        }
        $service->delete();
        return Redirect()->back()->with("success", "Service Deleted Successfully");
    }
}
