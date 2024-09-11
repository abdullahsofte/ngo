<?php

namespace App\Http\Controllers\Admin;

use App\Models\CtetReport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CtetReportController extends Controller
{
    public function index()
    {
        $ctet = CtetReport::latest()->get();
        return view('pages.admin.ctet.report', compact('ctet'));
    }

 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:60',
        ]);
        

        try {
            $ctet = new CtetReport();
            $ctet->title = $request->title;
            $ctet->created_at = Carbon::now();
            $ctet->save();
            return redirect()->back()->with('success', 'Ctet Report Added Successfully!');
        } catch (\Exception $e) {
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('Failed', 'Report insertion failed!');
        }
    }


    public function edit($id)
    {
        $ctetData = CtetReport::findOrFail($id);
        $ctet = CtetReport::latest()->get();
        return view('pages.admin.ctet.report', compact('ctet', 'ctetData'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:60',
        ]);
        try {
            $ctet = CtetReport::findOrFail($id);
            $ctet->title = $request->title;
           
            $ctet->save();
            return Redirect()->route('ctetreport.index')->with("success", "Update Successfull");
        } catch(\Exception $e) {
		    // return ["error" => $e->getMessage()];
            return redirect()->back()->with('error', 'Ctet insert failed!');
        }
    }

    public function delete($id)
    {
        $ctet = CtetReport::find($id);
        $ctet->delete();
        return Redirect()->back()->with("success", "Deleted Successfully");
    }
}
