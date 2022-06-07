<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        // return $request->all(); //this check all data in post
        // die;
        $validateData = $request->validate([
                            'name'      => 'required|max:255|unique:users',
                            'username'  => 'required|max:255|unique:users',
                            'email'     => 'required|email:dns|unique:users',
                            'password'  => 'required|min:5|max:255',            
                        ]);
        
        $validateData['password'] = bcrypt($validateData['password']);
        $validateData['slug'] = Str::slug($validateData['name']);
        User::create($validateData);
        // $request->session()->flash('success', 'Registration Successfull! Please Login!'); //this manual, if you want to auto use with when redirect page
        return redirect('/login')->with('success', 'Registration Successfull! Please Login!'); //this send message succes flash auto
    }
}
