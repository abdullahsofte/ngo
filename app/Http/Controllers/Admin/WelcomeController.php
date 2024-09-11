<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('pages.about.welcome');
    }

    public function update(Request $request, Welcome $welcome)
    {
    //    dd($request->all());
        try {
            $welcomeImage = '';
            if ($request->hasFile('image')) {
                if (!empty($welcome->image) && file_exists($welcome->image)) {
                    unlink($welcome->image);
                }
                $welcomeImage = $this->imageUpload($request, 'image', 'uploads/about');
            } else {
                $welcomeImage = $welcome->image;
            }
            
            $welcome->title       = $request->title;
            $welcome->description = $request->description;
            $welcome->image       = $welcomeImage;
            $welcome->save();
            return redirect()->back()->with('success','Welcome Note Update Successful!');        

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed!');
        }    
    }


    
}
