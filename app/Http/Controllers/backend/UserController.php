<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Schema;
use App\Models\lmsuser;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $obj = new lmsuser;
        // $data = $obj::all();
        // $getData = lmsuser::all();
        // $data = compact('getData');
        $data['data'] = lmsuser::all();
        return view('backend.user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('user.store');
        // $url = url('lmsuser/store');
        $showPass = true;
        $userData = new lmsuser();
        $data = compact('url','showPass','userData');
        return view('backend.user.create')->with($data);
        // return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $obj->password = Hash::make($request->input('password'));
        // $obj->password = $request->input('password');
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
        return redirect('lmsuser/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userData = lmsuser::find($id);
        if (is_null($userData)) {
            return redirect('lmsuser/index');
        }else{
            $url = route('user.update',['id' => $id]);
            // $url = url('lmsuser/update') . '/' . $id;
            $showPass = false;
            $data = compact('url','userData','showPass');
            return view('backend.user.create')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'gender' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'phone' => 'required | integer',
            'address' => 'required',
        ],
        [
            'username.required' => 'Username field must be filled...!',
        ]);
        $obj = lmsuser::find($id);
        $obj->name = $request->input('username');
        $obj->gender = $request->input('gender');
        $obj->email = $request->input('email');
        // $obj->password = md5($request->input('password'));
        $obj->phone = $request->input('phone');
        $obj->address = $request->input('address');
        $obj->save();
        return redirect('lmsuser/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = lmsuser::find($id);
        if (is_null($check)) {
            return redirect('lmsuser/index');
        }else {
            $check->delete();
            return redirect()->back();
        }
    }
}
