<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ctet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CtetController extends Controller
{
    public function index()
    {
        $ctet = Ctet::latest()->get();
        return view('pages.admin.ctet.index', compact('ctet'));
    }

 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:60',
        ]);
        

        try {
            $ctet = new Ctet();
            $ctet->title = $request->title;
            $ctet->created_at = Carbon::now();
            $ctet->save();
            return redirect()->back()->with('success', 'Ctet Added Successfully!');
        } catch (\Exception $e) {
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('Failed', 'Photo insertion failed!');
        }
    }


    public function edit($id)
    {
        $ctetData = Ctet::findOrFail($id);
        $ctet = Ctet::latest()->get();
        return view('pages.admin.ctet.index', compact('ctet', 'ctetData'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:60',
        ]);
        try {
            $ctet = Ctet::findOrFail($id);
            $ctet->title = $request->title;
           
            $ctet->save();
            return Redirect()->route('ctet.index')->with("success", "Update Successfull");
        } catch(\Exception $e) {
		    // return ["error" => $e->getMessage()];
            return redirect()->back()->with('error', 'Ctet insert failed!');
        }
    }

    public function delete($id)
    {
        $ctet = Ctet::find($id);
        $ctet->delete();
        return Redirect()->back()->with("success", "Management Deleted Successfully");
    }
}
