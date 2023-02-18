<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lmsuser;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowReturn;
use Illuminate\Support\Facades\DB;

class BorrowReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BorrowReturn::join('lmsusers','borrowreturned.user_id','=','lmsusers.user_id')->join('books','borrowreturned.book_id','=','books.book_id')->join('borrowing','borrowreturned.borrowing_id','=','borrowing.borrowing_id')->get(['borrowreturned.return_id','borrowreturned.returned_date','borrowreturned.fine','books.book_id','books.title','lmsusers.user_id','lmsusers.name','borrowing.borrowing_id','borrowing.user_id','borrowing.book_id','borrowing.borrowed_date','borrowing.due_date']);
        $send = compact('data');
        return view('backend.BorrowReturn.index')->with($send);
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
        // $borrow = Borrow::join('lmsusers','borrowing.user_id','=','lmsusers.user_id')->get(['borrowing.borrowing_id','lmsusers.name']);
        // dd();
        $borrow = DB::table('borrowing')->join('lmsusers','borrowing.user_id','=','lmsusers.user_id')->get();
        // $borrow = Borrow::all();
        $borrowReturn = new BorrowReturn;
        $url = route('borrow-return.store');
        $data = compact('url','user','title','book','borrow','borrowReturn');
        return view('backend.BorrowReturn.create')->with($data);
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
            'borrowing_id' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
            'returned_date' => 'required',
            'due_date' => 'required',
            'fine' => 'required'
        ]);
        $obj = new BorrowReturn;
        $obj->borrowing_id = $request->input('borrowing_id');
        $obj->user_id = $request->input('user_id');
        $obj->book_id = $request->input('book_id');
        $obj->returned_date = $request->input('returned_date');
        $obj->due_date = $request->input('due_date');
        $obj->fine = $request->input('fine');
        $obj->save();
        return redirect('borrow-return/index');
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
        $borrowReturn = BorrowReturn::find($id);
        if (is_null($borrowReturn)) {
            return redirect()->back();
        }else {
            $title = "Update Data";
            $user = lmsuser::all();
            $book = Book::all();
            $borrow = DB::table('borrowing')->join('lmsusers','borrowing.user_id','=','lmsusers.user_id')->get();
            // $borrow = Borrow::all();
            $url = route('borrow-return.update',['id' => $id]);
            $data = compact('url','user','title','book','borrow','borrowReturn');
            return view('backend.BorrowReturn.create')->with($data);
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
            'borrowing_id' => 'required',
            'user_id' => 'required',
            'book_id' => 'required',
            'returned_date' => 'required',
            'due_date' => 'required',
            'fine' => 'required'
        ]);
        $obj = BorrowReturn::find($id);
        $obj->borrowing_id = $request->input('borrowing_id');
        $obj->user_id = $request->input('user_id');
        $obj->book_id = $request->input('book_id');
        $obj->returned_date = $request->input('returned_date');
        $obj->due_date = $request->input('due_date');
        $obj->fine = $request->input('fine');
        $obj->save();
        return redirect('borrow-return/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrowReturn = BorrowReturn::find($id);
        if (is_null($borrowReturn)) {
            return redirect('borrow-return/index');
        }else{
            $borrowReturn->delete();
            return redirect('borrow-return/index');
        }
    }
}
