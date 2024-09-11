<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtetMultiimage;
use App\Models\CtetReport;
use App\Models\SubReport;
use Illuminate\Http\Request;

class SubReportController extends Controller
{
    public function index(){
        $subreport = SubReport::latest()->get();
        $report = CtetReport::latest()->get();
        return view('pages.admin.ctet.sub_report',compact('subreport', 'report'));
    }

    public function store(Request $request ){
        $request->validate([
            'title' => 'required',
        ]);
        $subReport = new SubReport();
        $subReport->title = $request->title;
        $subReport->report_id = $request->report_id;
        $subReport->image = $this->imageUpload($request, 'image', 'uploads/report') ?? '';
        $subReport->save();

        $subreportImage = $this->imageUpload($request, 'multiimage', 'uploads/report/multiimage');
            if (is_array($subreportImage) && count($subreportImage)) {
                foreach ($subreportImage as $image) {
                    $imagePath = new CtetMultiimage();
                    $imagePath->subreport_id = $subReport->id;
                    $imagePath->multiimage = $image;
                    $imagePath->save();
                }
            }
        if($subReport) {
            return redirect()->route('subreport.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    public function edit($id){
        $report = CtetReport::latest()->get();
        $subReport = SubReport::with('subreportImage')->find($id);
        return view('pages.admin.ctet.subReportEdit',compact('subReport', 'report'));
    }

    
    public function removeImageCtet($id)
    {
        try {
            $removeImage = CtetMultiimage::find($id);
            $newsId = $removeImage->subreport_id;
            if (!empty($removeImage->multiimage) && file_exists($removeImage->multiimage)) {
                unlink($removeImage->multiimage);
            }
            $removeImage->delete();

            $subreportImage =  CtetMultiimage::where("subreport_id", $newsId)->get();
            return response()->json(['success' => true, 'subreportImage' => $subreportImage]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'newsId' => false]);
        }
    }


    public function update(Request $request ,SubReport $subReport){

        $activityImage = '';
        if ($request->hasFile('image')) {
            if (!empty($subReport->image) && file_exists($subReport->image)) {
                unlink($subReport->image);
            }
            $activityImage = $this->imageUpload($request, 'image', 'uploads/report');
        }else{
            $activityImage = $subReport->image;
        }
       
        $subReport->title = $request->title;
        $subReport->report_id = $request->report_id;
        $subReport->image = $activityImage;
        $subReport->save();

        // multiple image
        $subreportImage = $this->imageUpload($request, 'multiimage', 'uploads/report/multiimage');
        if (is_array($subreportImage) && count($subreportImage)) {
            foreach ($subreportImage as $image) {
                $imagePath = new CtetMultiimage();
                $imagePath->subreport_id = $subReport->id;
                $imagePath->multiimage = $image;
                $imagePath->save();
            }
        }

        if($subReport)
        {
            return redirect()->route('subreport.index')->with('success', 'Update Success');
        }
        return redirect()->back()->withInput();
    }

    public function delete(SubReport $subReport){
    
      try {
        if (!empty($subReport->subreportImage) ) {
            foreach ($subReport->subreportImage as $key => $subreportImage) {
                if (!empty($subreportImage->multiimage) && file_exists($subreportImage->multiimage)) {
                    unlink($subreportImage->multiimage);
                }
                $subreportImage->delete();
            }
            if (!empty($subReport->image) && file_exists($subReport->image)) {
                unlink($subReport->image);
            }
        }

        $subReport->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
      } catch (\Throwable $th) {
        return redirect()->back()->with('error', $th->getMessage());
      }

    }
}
