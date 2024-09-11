<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;
use PhpParser\Node\Stmt\TryCatch;

class RegistrationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'phone' => 'required|numeric|digits:11',
            'email' => 'email',
            'username' => 'required|unique:users',
            'password' => 'required|min:1',
            'image' => 'mimes:jpg,png,jpeg,bmp'
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
            $user->save();
            return back()->with('success','User Create Successfull!');
        } catch (\Throwable $th) {
            // return $th->getMessage();
            return redirect()->back()->with('error', 'User Insertion Failed!');
        }
    }

    public function settings() {
        
        return view('auth.profile');
    }
    public function edit($id) {
        $user = User::find($id);
        return view('auth.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric|digits:11',
            'email' => 'email',
            'username' => 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp'
        ]);

        try {
           
                $user = User::find($id);
                $profileImage = '';
                if($request->hasFile('image')) {
                    if(!empty($user->image) && file_exists($user->image)) {
                        unlink($user->image);
                    }
                    $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
                } else {
                    $profileImage = $user->image;
                }
    
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->image = $profileImage;
                $user->save();
                return redirect()->route('register.create')->with('success', 'Update Successful!');        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed!');
        }
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric|digits:11',
            'email' => 'email',
            'username' => 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp'
        ]);

        try {
            if(User::where('id', '!=', Auth::id())->where('username', $request->username)->exists()) {

                return back()->with('error','Username exist!');
                
            } else {

                $user = User::findOrFail(Auth::id());
                $profileImage = '';
                if($request->hasFile('image')) {
                    if(!empty($user->image) && file_exists($user->image)) {
                        unlink($user->image);
                    }
                    $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
                } else {
                    $profileImage = $user->image;
                }
    
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->image = $profileImage;
                $user->save();
                return redirect()->back()->with('success', 'Update Successful!');        
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed!');
        }
    }

    // public function delete($id) 
    // {
    //     User::find($id)->delete();
    //     $notification = array(
    //         'message'=>'User Delete!',
    //         'alert-type'=>'success'
    //     );
    //     return back()->with($notification);
    // }

    public function inactive($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        $notification=array(
            'message'=>'User Inactive Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        $notification=array(
            'message'=>'User Active Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
