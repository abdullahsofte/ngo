<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    
    public function index() {
        $project = Project::latest()->get();
        return view('pages.admin.project.index', compact('project'));
    }
    public function store(Request $request) {
        // return $request;
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif,webp',
        ]);
        $image = $request->file('image');
        $nameGen = hexdec(uniqid());
        $imgExt = strtolower($image->getClientOriginalExtension());
        $imgName = $nameGen. '.' . $imgExt;
        $upLocation = 'uploads/project/';
        // $image->move($upLocation, $imgName);
        Image::make($image)->resize(600,500)->save($upLocation . $imgName);

        try {
            $project = new Project();
            $project->title = $request->title;
            $project->description = $request->description;
            $project->image = $upLocation . $imgName;
            $project->created_at = Carbon::now();
            $project->save();
            return redirect()->back()->with('success', 'Project Insertion Successfull!');
        } catch (\Exception $e) {        
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('error', 'Project Insertion Failed!');
        }
    }
    public function edit($id) {
        $project = Project::find($id);
        return view('pages.admin.project.edit', compact('project'));
    }



    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'Image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        try {
            $project = Project::find($id);
            $project->title = $request->title;
            $project->description = $request->description;

            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(600,500)->save('uploads/project/' . $imageName);
                if(file_exists($project->image) && !empty($project->image)) {
                    unlink($project->image);
                }
                $project['image'] = 'uploads/project/'.$imageName;
            }
            $project->save();

           
            return Redirect()->route('project.index')->with("success", "Project Update Successfull");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Project Update failed!');
        }
    }
    public function delete($id) {
        $project = Project::find($id);
        if(file_exists($project->image) AND !empty($project->image)){
            unlink($project->image);
        }
        $project->delete();
        return Redirect()->back()->with("success", "Project Deleted Successfully");
    }
}
