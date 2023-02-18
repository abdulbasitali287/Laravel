<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shelf;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelfJoin = Shelf::join('books','shelf.book_id','=','books.book_id')->get();
        $data = compact('shelfJoin');
        return view('backend.shelf.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = DB::table('books')->get();
        $url = route('shelf.store');
        $shelf = new Shelf();
        $data = compact('url','book','shelf');
        return view('backend.shelf.create')->with($data);
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
            'book_id' => 'required',
            'shelf_no' => 'required',
            'floor' => 'required',
        ]);
        $obj = new Shelf;
        $obj->book_id = $request->input('book_id');
        $obj->shelf_no = $request->input('shelf_no');
        $obj->floor = $request->input('floor');
        $obj->save();
        return redirect('shelf/index');
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
        $shelf = Shelf::find($id);
        if (is_null($shelf)) {
            return redirect('shelf/index');
        }else{
            $book = Book::all();
            // $category = DB::table('category')->select('category_id','name')->where('category_id',$id)->get();
            // $category = Category::find($id);
            $url = route('shelf.update',['id' => $id]);
            // $category = DB::table('category')->select('category_id','name')->get();
            $data = compact('url','book','shelf');
            return view('backend.shelf.create')->with($data);
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
            'book_id' => 'required',
            'shelf_no' => 'required',
            'floor' => 'required',
        ]);
        $obj = Shelf::find($id);
        $obj->book_id = $request->input('book_id');
        $obj->shelf_no = $request->input('shelf_no');
        $obj->floor = $request->input('floor');
        $obj->save();
        return redirect('shelf/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shelf = Shelf::find($id);
        if (is_null($shelf)) {
            return redirect('shelf/index');
        }else{
            $shelf->delete();
            return redirect('shelf/index');
        }
    }
}
