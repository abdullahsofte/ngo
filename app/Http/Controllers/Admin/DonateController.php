<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function donateList() {
        $donate = Donate::latest()->get();
        return view('pages.admin.donate_list', compact('donate'));
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'transaction' => 'required|',      
        ]);
        try {
            $donate = new Donate();
            $donate->gateway = $request->gateway;
            $donate->name = $request->name;
            $donate->phone = $request->phone;
            $donate->transaction = $request->transaction;
            $donate->message = $request->message;
            $donate->save();
            return redirect()->back()->with('success', 'Your donate is sent Successfully!');
        } catch (\Exception $e) {         
		    // return ["error" => $e->getdonate()];
            return redirect()->back()->with('error', 'Your donate isn\'t delivered!');
        }
    }
    public function donateDelete($id) {
        $donate = Donate::find($id);
        $donate->delete();
        return Redirect()->back()->with("success", "Donate Deleted Successfully");
    }
}
