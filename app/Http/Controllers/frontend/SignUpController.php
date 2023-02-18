<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lmsuser;
class SignUpController extends Controller
{
    // public function view(){
    //     return view('frontend.signup');
    // }

    public function create(){
        // $url = route('user.store');
        // $url = url('lmsuser/store');
        // $showPass = true;
        // $userData = new lmsuser();
        // $data = compact('url','showPass','userData');
        session()->forget('emptyField');
        return view('frontend.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required | min:11',
            'address' => 'required',
        ],
        [
            'username.required' => 'Username field must be filled...!',
        ]);
        $obj = new lmsuser;
        $obj->name = $request->input('username');
        $obj->gender = $request->input('gender');
        $obj->email = $request->input('email');
        $obj->password = $request->input('password');
        $obj->phone = $request->input('phone');
        $obj->address = $request->input('address');
        // if ($request->hasfile('image')) {
        //     $img = $request->file('image');
        //     $name = $img->getClientOriginalName();
        //     $filename = 'public/backend/assets/uploads/'.$name;
        //     $img->move('public/backend/assets/uploads/', $filename);
        //     $obj->image = $filename;
        // }
        $obj->save();
        return redirect('/signin');
    }
}
