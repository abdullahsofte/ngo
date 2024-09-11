<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index()
    {
        $year = Year::where('status', 'a')->latest()->get();
        return view('pages.admin.year.index', compact('year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required',
        ]);

        $year = new Year();
        $year->year = $request->year;
        $year->image = $this->imageUpload($request, 'image', 'uploads/year') ?? '';
        $year->status = 'a';
        $year->save();
        if ($year) {
            return redirect()->route('year.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->with('error', 'Year  digits too long');
    }

    public function edit($id)
    {
        $year = Year::find($id);
        return view('pages.admin.year.edit', compact('year'));
    }

    public function update(Request $request, Year $year)
    {
        $yearImage = '';
        if ($request->hasFile('image')) {
            if (!empty($year->image) && file_exists($year->image)) {
                unlink($year->image);
            }
            $yearImage = $this->imageUpload($request, 'image', 'uploads/year');
        } else {
            $yearImage = $year->image;
        }

        $year->year = $request->year;
        $year->image = $yearImage;
        $year->save();
        if ($year) {
            return redirect()->route('year.index')->with('success', 'Update Success');
        }
        return redirect()->back()->withInput();
    }

    public function delete(Year $year)
    {
        // $checkProduct  = Gallery::where('year_id', $year->id)->count();
        // if($checkProduct > 0) {
          
        //     return redirect()->back()->with('error', 'This Year Already Used in Gallery.Please! Gallery delete first');
        // }

        if (!empty($year->image) && file_exists($year->image)) {
            unlink($year->image);
        }

        $year->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
