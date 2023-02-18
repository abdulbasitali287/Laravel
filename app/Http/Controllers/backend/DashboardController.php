<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lmsuser;
use App\Models\Book;
use App\Models\Category;
use App\Models\Borrow;
use App\Models\BorrowReturn;
use App\Models\Shelf;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $user = DB::table('lmsusers')->count();
        $book = DB::table('books')->count();
        $category = DB::table('category')->count();
        $borrow = DB::table('borrowing')->count();
        $borrowReturn = DB::table('borrowreturned')->count();
        $shelf = DB::table('shelf')->count();
        $admin = DB::table('admins')->count();
        $data = compact('user','book','category','borrow','borrowReturn','shelf','admin');
        return view('backend.index')->with($data);
    }
}
