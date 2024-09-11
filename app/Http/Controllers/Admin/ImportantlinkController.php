<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Important;
use Illuminate\Http\Request;

class ImportantlinkController extends Controller
{
    public function index(){
        $important = Important::latest()->get();
        return view('pages.admin.important.index',compact('important'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);
        try {
            $important = new Important();
            $important->title = $request->title;
            $important->link = $request->link;
            $important->save();
            return redirect()->back()->with('success', 'important link Inserted!');
        } catch (\Exception $e) {
            return Redirect()->back()->with('error', 'Insertion failed!');
        }

    }
    public function edit($id){
        $important = Important::find($id);
        return view('pages.admin.important.edit',compact('important'));
    }
    public function update(Request $request , Important $important){
        $important->title = $request->title;
        $important->link = $request->link;
        $important->save();
        if($important)
        {
            return redirect()->route('important.index');
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
    }

    public function delete(Important $important){
        $important->delete();
         return redirect()->back()->with('success', 'Deleted Successfull');
    }

}
