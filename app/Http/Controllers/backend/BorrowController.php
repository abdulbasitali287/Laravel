<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\lmsuser;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Borrow::all();
        $data = Borrow::join('lmsusers','borrowing.user_id','=','lmsusers.user_id')->join('books','borrowing.book_id','=','books.book_id')->get(['books.book_id','books.title','lmsusers.user_id','lmsusers.name','borrowing.borrowing_id','borrowing.user_id','borrowing.book_id','borrowing.borrowed_date','borrowing.due_date']);
        $send = compact('data');
        return view('backend.borrow.index')->with($send);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Insert Data";
        $user = lmsuser::all();
        $book = Book::all();
        $borrowData = new Borrow;
        $url = route('borrow.store');
        $data = compact('url','user','title','book','borrowData');
        return view('backend.borrow.create')->with($data);
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
            'book_id' => 'required',
            'borrowed_date' => 'required',
            'due_date' => 'required',
        ]);
        $obj = new Borrow;
        $obj->user_id = $request->input('user_id');
        $obj->book_id = $request->input('book_id');
        $obj->borrowed_date = $request->input('borrowed_date');
        $obj->due_date = $request->input('due_date');
        $obj->save();
        return redirect('borrow/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrowData = Borrow::find($id);
        if (is_null($borrowData)) {
            return redirect()->back();
        }else {
            $title = "Update Data";
            $user = lmsuser::all();
            $book = Book::all();
            $url = route('borrow.update',['id' => $id]);
            $data = compact('url','user','title','book','borrowData');
            return view('backend.borrow.create')->with($data);
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
            'book_id' => 'required',
            'borrowed_date' => 'required',
            'due_date' => 'required',
        ]);
        $obj = Borrow::find($id);
        $obj->user_id = $request->input('user_id');
        $obj->book_id = $request->input('book_id');
        $obj->borrowed_date = $request->input('borrowed_date');
        $obj->due_date = $request->input('due_date');
        $obj->save();
        return redirect('borrow/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrowData = Borrow::find($id);
        if (is_null($borrowData)) {
            return redirect('borrow/index');
        }else{
            $borrowData->delete();
            return redirect('borrow/index');
        }
    }
}
