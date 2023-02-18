<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\lmsuser;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::join('lmsusers','admins.user_id','=','lmsusers.user_id')->get(['lmsusers.user_id','lmsusers.name','admins.admin_id','admins.user_id','admins.role']);
        $data = compact('admin');
        return view('backend.admin.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('lmsusers')->get();
        $url = route('admin.store');
        $admin = new Admin();
        $data = compact('url','admin','user');
        return view('backend.admin.create')->with($data);
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
            'user_id' => 'required',
            'role' => 'required',
        ]);
        $obj = new Admin;
        $obj->user_id = $request->input('user_id');
        $obj->role = $request->input('role');
        $obj->save();
        return redirect('admin/index');
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
        $admin = Admin::find($id);
        if (is_null($admin)) {
            return redirect('admin/index');
        }else{
            $user = lmsuser::all();
            // $category = DB::table('category')->select('category_id','name')->where('category_id',$id)->get();
            // $category = Category::find($id);
            $url = route('admin.update',['id' => $id]);
            // $category = DB::table('category')->select('category_id','name')->get();
            $data = compact('url','admin','user');
            return view('backend.admin.create')->with($data);
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
            'user_id' => 'required',
            'role' => 'required',
        ]);
        $obj = Admin::find($id);
        $obj->user_id = $request->input('user_id');
        $obj->role = $request->input('role');
        $obj->save();
        return redirect('admin/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (is_null($admin)) {
            return redirect('admin/index');
        }else{
            $admin->delete();
            return redirect('admin/index');
        }
    }
}
