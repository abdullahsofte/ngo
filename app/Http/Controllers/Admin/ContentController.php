<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(){
        $ctetAbout = CompanyProfile::first();
     return view('pages.admin.content.ctetAbout',compact('ctetAbout'));
 }

 public function update(Request $request, CompanyProfile $ctetAbout)
 {
  
     try {
       
         $ctetAbout->ctet_about_title = $request->ctet_about_title;
         $ctetAbout->ctet_about_description = $request->ctet_about_description;
         $ctetAbout->save();
         return redirect()->back()->with('success','Update Successful!');        

     } catch (\Throwable $th) {
         return redirect()->back()->with('error', 'Update Failed!');
     }    
 }

    public function messageAdd()
    {
    $message = CompanyProfile::first();
    return view('pages.admin.content.message',compact('message'));
   }

 public function messageUpdate(Request $request, CompanyProfile $message)
 {
  
     try {
       
         $message->message_title = $request->message_title;
         $message->message_description = $request->message_description;
         $message->save();
         return redirect()->back()->with('success','Update Successful!');        

     } catch (\Throwable $th) {
         return redirect()->back()->with('error', 'Update Failed!');
     }    
 }
}
