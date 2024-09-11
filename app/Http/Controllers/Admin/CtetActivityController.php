<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ctet;
use App\Models\CtetActivity;
use Illuminate\Http\Request;

class CtetActivityController extends Controller
{
    public function index(){
        $activity = CtetActivity::latest()->get();
        $ctet = Ctet::latest()->get();
        return view('pages.admin.ctet.activity',compact('activity', 'ctet'));
    }
    public function store(Request $request ){
        $request->validate([
            'title' => 'required',
        ]);
        // dd($request->all());
        $activity = new CtetActivity();
        $activity->title = $request->title;
        $activity->ctet_id = $request->ctet_id;
        $activity->description = $request->description;
        $activity->save();
        if($activity) {
            return redirect()->route('ctetactivity.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    public function edit($id){
        $ctet = Ctet::latest()->get();
        $activity = CtetActivity::find($id);
        return view('pages.admin.ctet.edit',compact('activity', 'ctet'));
    }

    public function update(Request $request ,CtetActivity $activity){
       
        $activity->title = $request->title;
        $activity->ctet_id = $request->ctet_id;
        $activity->description = $request->description;
        $activity->save();
        if($activity)
        {
            return redirect()->route('ctetactivity.index')->with('success', 'Update Success');
        }
        return redirect()->back()->withInput();
    }

    public function delete(CtetActivity $activity){
        $activity->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');

    }
}
