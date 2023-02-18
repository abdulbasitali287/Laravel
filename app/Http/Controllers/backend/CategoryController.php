<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Category::all();
        return view('backend.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('category.store');
        // $url = url('lmsuser/store');
        $userData = new Category();
        $data = compact('url','userData');
        return view('backend.category.create')->with($data);
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
            'title' => 'required',
            'detail' => 'required',
        ],);
        $obj = new Category;
        $obj->name = $request->input('title');
        $obj->details = $request->input('detail');
        $obj->save();
        return redirect('category/index');
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
        $userData = Category::find($id);
        if (is_null($userData)) {
            return redirect('category/index');
        }else{
            $url = route('category.update',['id' => $id]);
            $data = compact('url','userData');
            return view('backend.category.create')->with($data);
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
            'title' => 'required',
            'detail' => 'required',
        ],);
        $obj = Category::find($id);
        $obj->name = $request->input('title');
        $obj->details = $request->input('detail');
        $obj->save();
        return redirect('category/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Category::find($id);
        if (is_null($check)) {
            return redirect('category/index');
        }else {
            $check->delete();
            return redirect()->back();
        }
    }
}
