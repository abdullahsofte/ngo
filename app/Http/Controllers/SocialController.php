<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(){
        $social = Social::latest()->get();
        return view('pages.admin.social.index',compact('social'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
        ]);
        try {
            $social = new Social();
            $social->name = $request->name;
            $social->link = $request->link;
            $social->image = $this->imageUpload($request, 'image', 'uploads/social') ?? '';
            $social->save();
            return redirect()->back()->with('success', 'social link Inserted!');
        } catch (\Exception $e) {
            return Redirect()->back()->with('error', 'Insertion failed!');
        }
    }
    public function edit($id){
        $social = Social::find($id);
        return view('pages.admin.social.edit',compact('social'));
    }
    public function update(Request $request , Social $social){
        $socialImage = '';
        if ($request->hasFile('image')) {
            if (!empty($social->image) && file_exists($social->image)) {
                unlink($social->image);
            }
            $socialImage = $this->imageUpload($request, 'image', 'uploads/social');
        }else{
            $socialImage = $social->image;
        }

            $social->name = $request->name;
            $social->link = $request->link;
            $social->image = $socialImage;
            $social->save();
            if($social)
            {
                return redirect()->route('social.index');
            }
            return redirect()->back()->withInput()->with('success', 'Update Success');
    }
    public function delete(Social $social){
        if (!empty($social->image) && file_exists($social->image)) {
            unlink($social->image);
        }
        $social->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
