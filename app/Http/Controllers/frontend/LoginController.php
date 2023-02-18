<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lmsuser;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Admin;
// use Illuminate\Auth\SessionGuard;

class LoginController extends Controller
{
    public function index(){
        if (session()->has('username')) {
            return redirect('/dashboard');
        }
        return view('frontend.login');
    }

    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        $user = lmsuser::where('name',$username)->first();
        $userId = isset($user[0]->user_id);
        $userName = isset($user[0]->name);
        $userPass = isset($user[0]->password);
        if ($user && Hash::check($password, $user->password)) {
            session()->put('username',$username);
            session()->forget('emptyField');
            return redirect('/dashboard');
        }else {
            session()->put('emptyField', "Username and password field must be matched...!");
            return redirect('/signin');
        }
        // if ($userName == $username && $userPass == $password) {
        //     session()->put('username',$request->input('username'));
        //     session()->forget('emptyField');
        //     return redirect('/dashboard');
        // }else if($userName != $username && $userPass != $password){
        //     session()->put('emptyField', "Username and password field must be matched...!");
        //     return redirect('/signin');
        // }
    }
}
