<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Management;
use Illuminate\Support\Facades\DB;

class ManagementController extends Controller
{
    public function index()
    {
        $management = Management::orderBy('rank', 'asc')->get();
        return view('pages.admin.management.management', compact('management'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'rank' => 'required|unique:management',
            'designation' => 'required|max:100',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif',
        ]);
        
        $image = $request->file('image');
        $nameGen = hexdec(uniqid());
        $imgExt = strtolower($image->getClientOriginalExtension());
        $imgName = $nameGen. '.' . $imgExt;
        $upLocation = 'uploads/management/';
        $image->move($upLocation, $imgName);

        try {
            $management = new Management;
            $management->name = $request->name;
            $management->rank = $request->rank;
            $management->designation = $request->designation;
            $management->image = $imgName;
            $management->description = $request->description;
            $management->created_at = Carbon::now();
            $management->save();
            return redirect()->back()->with('success', 'Member Inserted!');
        } catch (\Exception $e) {
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('Failed', 'Photo insertion failed!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $managementData = Management::findOrFail($id);
        $management = Management::latest()->get();
        return view('pages.admin.management.management', compact('management', 'managementData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:60',
            'designation' => 'required|max:100',
            'rank' => 'numeric',
            'image' => 'Image|mimes:jpeg,jpg,png,gif',
        ]);
        try {
            $management = Management::findOrFail($id);
            $management->name = $request->name;
            $management->designation = $request->designation;
            $image = $request->file('image');
            if($request->rank) {
                $rankCount = Management::where('rank', $request->rank)->where('id', '!=', $request->id)->count();
                if($rankCount > 0) {
                    return redirect()->back()->with('error', 'Rank Exist!');
                }
                $management->rank = $request->rank;
            }
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                $image->move('uploads/management/', $imageName);
                if(file_exists('uploads/management/'. $management->image) && !empty($management->image)) {
                    unlink('uploads/management/' . $management->image);
                }
                $management['image'] = $imageName;
            }
            $management->description = $request->description;
            $management->save();
            return Redirect()->route('management.index')->with("success", "Update Successfull");
        } catch(\Exception $e) {
		    return ["error" => $e->getMessage()];
            return redirect()->back()->with('error', 'Team insert failed!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $management = Management::find($id);
        if(file_exists('uploads/management/'.$management->image) AND !empty($management->image)){
            unlink('uploads/management/'.$management->image);
        }
        $management->delete();
        return Redirect()->back()->with("success", "Management Deleted Successfully");
    }
}
