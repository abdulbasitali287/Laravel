<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = DB::table('category')->select('category_id','name')->get();
        // $bookData = Book::all();
        // $bookData = DB::table('books')->join('books', 'books.category_id', '=', 'category.category_id')->select('*')->get();
        $bookData = Book::join('category','books.category_id','=','category.category_id')->get(['books.book_id','books.title','books.author','books.publisher','books.dob_of_publication','category.name']);
        // $categoryData = Category::with('book')->get();
        $data = compact('bookData');
        // return view('backend.books.index')->with($data);
        return view('backend.books.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $obj = new Category;
        // $category = DB::table('category')->select('category_id','name')->get();
        $category = Category::all();
        $url = route('books.store');
        $bookData = new Book();
        $data = compact('url','bookData','category');
        return view('backend.books.create')->with($data);
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
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'dob_of_publication' => 'required',
            'category_id' => 'required',
        ],);
        $obj = new Book;
        $obj->title = $request->input('title');
        $obj->author = $request->input('author');
        $obj->publisher = $request->input('publisher');
        $obj->dob_of_publication = $request->input('dob_of_publication');
        $obj->category_id = $request->input('category_id');
        $obj->save();
        return redirect('books/index');
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
        // $bookData = Book::join('category','books.category_id','=','category.category_id')->get(['books.book_id','books.title','books.author','books.publisher','books.dob_of_publication','category.category_id','category.name']);
        // $bookData = DB::select("select * from books INNER JOIN category ON books.category_id = category.category_id where book_id = $id");

        $bookData = Book::find($id);
        if (is_null($bookData)) {
            return redirect('books/index');
        }else{
            $category = Category::all();
            // $category = DB::table('category')->select('category_id','name')->where('category_id',$id)->get();
            // $category = Category::find($id);
            $url = route('books.update',['id' => $id]);
            // $category = DB::table('category')->select('category_id','name')->get();
            $data = compact('url','bookData','category');
            return view('backend.books.create')->with($data);
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
            'author' => 'required',
            'publisher' => 'required',
            'dob_of_publication' => 'required',
            'category_id' => 'required',
        ],);
        $obj = Book::find($id);
        $obj->title = $request->input('title');
        $obj->author = $request->input('author');
        $obj->publisher = $request->input('publisher');
        $obj->dob_of_publication = $request->input('dob_of_publication');
        $obj->category_id = $request->input('category_id');
        $obj->save();
        return redirect('books/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookData = Book::find($id);
        if (is_null($bookData)) {
            return redirect('books/index');
        }else{
            $bookData->delete();
            return redirect('books/index');
        }
    }
}
