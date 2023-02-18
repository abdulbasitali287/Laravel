<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\SignUpController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\BooksController;
use App\Http\Controllers\backend\BorrowController;
use App\Http\Controllers\backend\BorrowReturnController;
use App\Http\Controllers\backend\ShelfController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/logout2',function(){
    //     return redirect('/signin');
    // });

Route::get('/', function () {
    return view('frontend.login');
});
Route::get('/signin',[LoginController::class,'index'])->name('signin');
Route::post('/login',[LoginController::class,'login'])->name('loginSuccess');

Route::get('/signup',[SignUpController::class,'create'])->name('signup.create');
Route::post('/signup/store',[SignUpController::class,'store'])->name('signup.store');
// Route::get('/Home/index',[HomeController::class,'view']);
Route::get('/logout',function(){
    session()->forget('emptyField');
    session()->forget('username');
    session()->forget('role');
    return redirect('/signin');
});
Route::group(['middleware'=>['loginCheck']],function(){
// dashboard Routes
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// UserController Routes
Route::get('lmsuser/index',[UserController::class,'index'])->name('user.index');
Route::get('lmsuser/create',[UserController::class,'create'])->name('user.create');
Route::post('lmsuser/store',[UserController::class,'store'])->name('user.store');
Route::get('lmsuser/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::post('lmsuser/update/{id}',[UserController::class,'update'])->name('user.update');
Route::get('lmsuser/destroy/{id}',[UserController::class,'destroy'])->name('user.destroy');
// CategoryController Routes
Route::get('category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
// BooksController Routes
Route::get('books/index',[BooksController::class,'index'])->name('books.index');
Route::get('books/create',[BooksController::class,'create'])->name('books.create');
Route::post('books/store',[BooksController::class,'store'])->name('books.store');
Route::get('books/edit/{id}',[BooksController::class,'edit'])->name('books.edit');
Route::post('books/update/{id}',[BooksController::class,'update'])->name('books.update');
Route::get('books/destroy/{id}',[BooksController::class,'destroy'])->name('books.destroy');
// BorrowController Routes
Route::get('borrow/index',[BorrowController::class,'index'])->name('borrow.index');
Route::get('borrow/create',[BorrowController::class,'create'])->name('borrow.create');
Route::post('borrow/store',[BorrowController::class,'store'])->name('borrow.store');
Route::get('borrow/edit/{id}',[BorrowController::class,'edit'])->name('borrow.edit');
Route::post('borrow/update/{id}',[BorrowController::class,'update'])->name('borrow.update');
Route::get('borrow/destroy/{id}',[BorrowController::class,'destroy'])->name('borrow.destroy');
// BorrowReturnController Routes
Route::get('borrow-return/index',[BorrowReturnController::class,'index'])->name('borrow-return.index');
Route::get('borrow-return/create',[BorrowReturnController::class,'create'])->name('borrow-return.create');
Route::post('borrow-return/store',[BorrowReturnController::class,'store'])->name('borrow-return.store');
Route::get('borrow-return/edit/{id}',[BorrowReturnController::class,'edit'])->name('borrow-return.edit');
Route::post('borrow-return/update/{id}',[BorrowReturnController::class,'update'])->name('borrow-return.update');
Route::get('borrow-return/destroy/{id}',[BorrowReturnController::class,'destroy'])->name('borrow-return.destroy');
// ShelfController Routes
Route::get('shelf/index',[ShelfController::class,'index'])->name('shelf.index');
Route::get('shelf/create',[ShelfController::class,'create'])->name('shelf.create');
Route::post('shelf/store',[ShelfController::class,'store'])->name('shelf.store');
Route::get('shelf/edit/{id}',[ShelfController::class,'edit'])->name('shelf.edit');
Route::post('shelf/update/{id}',[ShelfController::class,'update'])->name('shelf.update');
Route::get('shelf/destroy/{id}',[ShelfController::class,'destroy'])->name('shelf.destroy');
// AdminController Routes
Route::get('admin/index',[AdminController::class,'index'])->name('admin.index');
Route::get('admin/create',[AdminController::class,'create'])->name('admin.create');
Route::post('admin/store',[AdminController::class,'store'])->name('admin.store');
Route::get('admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
Route::post('admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
Route::get('admin/destroy/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
});
