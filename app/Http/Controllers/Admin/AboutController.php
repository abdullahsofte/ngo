<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
           $company = CompanyProfile::first();
        return view('pages.about.index',compact('company'));
    }
    public function update(Request $request, CompanyProfile $company)
    {
        // dd($request->all());
        $request->validate([
            'about_image' => 'mimes:jpg,jpeg,png,bmp',
            'bg_image' => 'mimes:jpg,jpeg,png,bmp',
        ]);

        // Image Update
        try {
            $AboutImage = $company->about_image;
            $BgImage = $company->bg_image;
            if($request->hasFile('about_image')) {
                if(!empty($company->about_image) && file_exists($company->about_image))
                {
                    unlink($company->about_image);
                }
                $AboutImage = $this->imageUpload($request, 'about_image', 'uploads/about');
            }

            if($request->hasFile('bg_image')) {
                if(!empty($company->bg_image) && file_exists($company->bg_image))
                {
                    unlink($company->bg_image);
                }
                $BgImage = $this->imageUpload($request, 'bg_image', 'uploads/about');
            }
        
            $company->about = $request->about;
            $company->about_title = $request->about_title;
            $company->mission_vison = $request->mission_vison;
            $company->mission_title = $request->mission_title;
            $company->about_image = $AboutImage;
            $company->bg_image = $BgImage;
            $company->save();
            return redirect()->back()->with('success','Update Successful!');        

        } catch (\Throwable $th) {
            // return redirect()->back()->withInput();
            return redirect()->back()->with('error', 'Update Failed!');
        }    
    }
}
