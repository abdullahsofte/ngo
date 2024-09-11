<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function index() {
        $event = Event::latest()->get();
        return view('pages.admin.event.index', compact('event'));
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
        $upLocation = 'uploads/event/';
        Image::make($image)->resize(600,500)->save($upLocation . $imgName);

        try {
            $event = new Event;
            $event->title = $request->title;
            $event->date = $request->date;
            $event->description = $request->description;
            $event->image = $upLocation . $imgName;
            $event->created_at = Carbon::now();
            $event->save();

        
            return redirect()->back()->with('success', 'Event Insertion Successfull!');
        } catch (\Exception $e) {        
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('error', 'event Insertion Failed!');
        }
    }
    public function edit($id) {
        $event = Event::with('eventImage')->find($id);
        return view('pages.admin.event.edit', compact('event'));
    }



    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'Image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        try {
            $event = Event::find($id);
            $event->title = $request->title;
            $event->date = $request->date;
            $event->description = $request->description;

            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(600,500)->save('uploads/event/' . $imageName);
                if(file_exists($event->image) && !empty($event->image)) {
                    unlink($event->image);
                }
                $event['image'] = 'uploads/event/'.$imageName;
            }
            $event->save();
           
            return Redirect()->route('event.index')->with("success", "Event Update Successfull");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'event Update failed!');
        }
    }
    public function delete($id) {
        $event = Event::find($id);
        if(file_exists($event->image) AND !empty($event->image)){
            unlink($event->image);
        }
        $event->delete();
        return Redirect()->back()->with("success", "event Deleted Successfully");
    }
}
