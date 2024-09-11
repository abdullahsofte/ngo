<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $payment = PaymentType::latest()->get();
        return view('pages.admin.payment.index', compact('payment'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif',
        ]);


        try {
            $payment = new PaymentType();
            //image upload
            $image = $request->file('image');
            $nameGen = hexdec(uniqid());
            $imgExt = strtolower($image->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExt;
            $upLocation = 'uploads/payment/';
            Image::make($image)->resize(350, 250)->save($upLocation . $imgName);
            //close image upload
            $payment->title = $request->title;
            $payment->description = $request->description;
            $payment->status = 'a';
            $payment->image = $imgName;
            $payment->created_at = Carbon::now();
            $payment->save();
            return redirect()->back()->with('success', ' Added Successfully!');
        } catch (\Exception $e) {
            // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('Failed', ' insertion failed!');
        }
    }
    public function edit($id)
    {
        $payment = PaymentType::find($id);
        return view('pages.admin.payment.edit', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required'
        ]);

        try {
            $payment = PaymentType::find($id);
            $payment->title = $request->title;
            $payment->description = $request->description;
            $image = $request->file('image');
            if ($image) {
                $imageName = date('YmdHi') . $image->getClientOriginalName();
                Image::make($image)->resize(350, 250)->save('uploads/payment/' . $imageName);
                if (file_exists('uploads/payment/' . $payment->image) && !empty($payment->image)) {
                    unlink('uploads/payment/' . $payment->image);
                }
                $payment['image'] = $imageName;
            }
            $payment->save();
            return Redirect()->route('payment.type.index')->with("success", "Update Successfull");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Update failed!');
        }
    }
    public function delete($id)
    {
        $payment = PaymentType::find($id);
        if (file_exists('uploads/payment/' . $payment->image) and !empty($payment->image)) {
            unlink('uploads/payment/' . $payment->image);
        }
        $payment->delete();
        return Redirect()->back()->with("success", "Deleted Successfully");
    }
}
