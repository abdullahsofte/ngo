<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\News;
use App\Models\Management;
use App\Models\BackImage;
use App\Models\Booklet;
use App\Models\Ctet;
use App\Models\CtetActivity;
use App\Models\CtetReport;
use App\Models\Event;
use App\Models\Facilities;
use App\Models\ict;
use App\Models\Messenger;
use App\Models\Notice;
use App\Models\Partner;
use App\Models\PaymentType;
use App\Models\Project;
use App\Models\Report;
use App\Models\Service;
use App\Models\SubReport;
use App\Models\SuccessStudent;
use App\Models\Teacher;
use App\Models\Testimonial;
use App\Models\Whyspecail;
use App\Models\Year;
use PhpParser\Builder\Class_;

class HomeController extends Controller
{
    public function index()
    {
        $data['slider'] = Slider::latest()->get();
        $data['video'] = Video::latest()->get();
        $data['gallery'] = Gallery::latest()->get();
        $data['management'] = Management::orderBy("rank", "asc")->take(3)->get();
        $data['news'] = News::latest()->take(4)->get();
        $data['project'] = Project::latest()->take(4)->get();
        $data['service'] = Service::latest()->take(4)->get();
        $data['testimonial'] = Testimonial::latest()->get();
        $data['notice'] = Notice::latest()->get();
        $data['banner'] = BackImage::first();
        $data['activities'] = Activity::orderBy("rank", "asc")->take(8)->get();
        return view('pages.website.index', $data);
    }

    public function about() {
        $backimage = BackImage::first();
        return view('pages.website.about', compact('backimage',));
    }

    public function messagePage() {
        return view('pages.website.message');
    }

    public function missionVision() {
        return view('pages.website.mission_vision');
    }

    public function donat() {
        $payment =PaymentType::get();
        return view('pages.website.donat', compact('payment'));
    }

    public function donatDetails($id) {
        $payment = PaymentType::find($id);
        return view('pages.website.donat_details', compact('payment'));
    }

    public function ictPage() {
        $ict = ict::with('ictImage')->latest()->get();
        return view('pages.website.ict_page', compact('ict'));
    }

    public function welcome() {
        $backimage = BackImage::first();
        return view('pages.website.welcome', compact('backimage',));
    }

    public function chairman(){
        $management = Management::where('rank',1)->orderBy("rank", "asc")->get();
        $chairman = Management::first();
        return view('pages.website.chairman',compact('management','chairman'));
    }
    public function principal(){
        $management = Management::where('rank',2)->orderBy("rank", "asc")->get();
        $principal = Management::first();
        return view('pages.website.principal',compact('management','principal'));
    }
    public function boardManagement(){
        $management = Management::orderBy("rank", "asc")->get();
        return view('pages.website.boardManagement',compact('management'));
    }
    

    public function managementDetails($id)
    {
        $persone = Management::find($id);
        return view('pages.website.managementDetails', compact('persone'));
    }

    public function report()
    {
        $report = Report::where('status', 'a')->get();
        return view('pages.website.report',compact('report'));
    }

  

    public function news() {
        $news = News::latest()->get();
        return view('pages.website.news',compact('news'));
    }
   

    public function newsdetails($id) {
        $news = News::find($id);
            $newslist = News::latest()->get();
            return view('pages.website.newsDetails', compact('news', 'newslist'));
       
    }
   

    public function events() {
        $event = Event::latest()->get();
        return view('pages.website.event', compact('event'));
    }

    public function eventDetails($id) {
        $event = Event::find($id);
        $eventlist = Event::latest()->get();
        return view('pages.website.event_detail', compact('event', 'eventlist'));
       
    }


    public function project() {
        $project = Project::latest()->get();
        return view('pages.website.project', compact('project'));
    }

    public function projectDetails($id) {
        $project = Project::find($id);
        $projectList = Project::latest()->get();
        return view('pages.website.project_details', compact('project', 'projectList'));
    }

    public function activites()
    {
        $activites = Activity::latest()->get();
        return view('pages.website.activites', compact('activites'));
    }


    public function activeDetails($id) {
        $active = Activity::find($id);
        if (isset($active)) {
            $activelist = Activity::latest()->get();
            return view('pages.website.activDetails', compact('active','activelist'));
        }
    }


   

    public function notices() {
        $notice = Notice::latest()->get();
        return view('pages.website.notices',compact('notice'));
    }

    public function ctetAbout() {
        return view('pages.website.ctet_about');
    }

    public function ctetActivity() {
        $ctet = Ctet::with('ctetActive')->latest()->get();
        // dd($ctet);
        return view('pages.website.ctet_activity', compact('ctet'));
    }


    public function ctetRreports() {
        $ctetReport = CtetReport::latest()->get();
        $ctetSubReport = SubReport::with('subreportImage')->get();
        return view('pages.website.ctet_report', compact('ctetReport', 'ctetSubReport'));
    }


    public function yearWise($id) {
        $year = Year::find($id);
        $report = Report::where('year_id', $year->id)->with('reportImage')->first();
        // dd($year, $report);
        return view('pages.website.year_wise_report', compact('year', 'report'));
    }


    public function noticeDetails($id) {
        $notice = Notice::find($id);
        if (isset($notice)) {
            $noticelist = Notice::latest()->get();
            return view('pages.website.noticeDetails', compact('notice','noticelist'));
        }
    }
   



    public function gallery() {
        $gallery = Gallery::latest()->get();
        return view('pages.website.gallery', compact( 'gallery'));
    }

    public function video() {
        $video = Video::latest()->get();
        return view('pages.website.video', compact('video', ));
    }

   

    public function contact() {
        return view('pages.website.contact');
    }

    public function forget(){
        return view('pages.website.forget');
    }

    public function management() {
        $backimage = BackImage::first();
        $management = Management::orderBy('rank', 'asc')->get();
        return view('pages.website.management', compact('backimage', 'management'));
    }

}
