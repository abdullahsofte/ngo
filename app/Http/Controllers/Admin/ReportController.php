<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportMultiimage;
use App\Models\Year;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $report = Report::where('status', 'a')->latest()->get();
        $year = Year::where('status', 'a')->get();
        return view('pages.admin.report.index',compact('report', 'year'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
        ]);
        $report = new Report();
        $report->title = $request->title;
        $report->year_id = $request->year_id;
        $report->status = 'a';
        $report->save();

        $reportImage = $this->imageUpload($request, 'multiimage', 'uploads/report/multiimage');
        if (is_array($reportImage) && count($reportImage)) {
            foreach ($reportImage as $image) {
                $imagePath = new ReportMultiimage();
                $imagePath->report_id = $report->id;
                $imagePath->multiimage = $image;
                $imagePath->save();
            }
        }
        if($report) {
            return redirect()->route('report.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    public function edit($id)
    {
        $report = Report::with('reportImage')->find($id);
        $year = Year::where('status', 'a')->get();
        return view('pages.admin.report.edit', compact('report', 'year'));
    }


    public function removeImage($id)
    {
        try {
            $removeImage = ReportMultiimage::find($id);
            $newsId = $removeImage->report_id;
            if (!empty($removeImage->multiimage) && file_exists($removeImage->multiimage)) {
                unlink($removeImage->multiimage);
            }
            $removeImage->delete();

            $reportImage =  ReportMultiimage::where("report_id", $newsId)->get();
            return response()->json(['success' => true, 'reportImage' => $reportImage]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'newsId' => false]);
        }
    }



    public function update(Request $request, Report $report)
     {
     
        $report->title = $request->title;
        $report->year_id = $request->year_id;
        $report->save();

         // multiple image
         $reportImage = $this->imageUpload($request, 'multiimage', 'uploads/report/multiimage');
         if (is_array($reportImage) && count($reportImage)) {
             foreach ($reportImage as $image) {
                 $imagePath = new ReportMultiimage();
                 $imagePath->report_id = $report->id;
                 $imagePath->multiimage = $image;
                 $imagePath->save();
             }
         }
 
        if($report)
        {
            return redirect()->route('report.index');
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
     }



     public function delete(Report $report)
     {
    
        try {
          if (!empty($report->reportImage) ) {
              foreach ($report->reportImage as $reportImage) {
                  if (!empty($reportImage->multiimage) && file_exists($reportImage->multiimage)) {
                      unlink($reportImage->multiimage);
                  }
                  $reportImage->delete();
              }
           
          }
  
          $report->delete();
          return redirect()->back()->with('success', 'Deleted Successfull');
        } catch (\Throwable $th) {
          return redirect()->back()->with('error', $th->getMessage());
        }
  
      }
}
