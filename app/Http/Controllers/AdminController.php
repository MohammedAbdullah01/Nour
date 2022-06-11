<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admins.login');
    }

    public function register()
    {
        return view('admins.register');
    }

    public function storeLogin(Request $request)
    {
        $request->validate([
            'email'         => 'required|email|string|exists:admins,email',
            'password'      => 'required|min:5',
        ]);
        $admin  = $request->only(['email','password']);

        if(Auth::guard('admin')->attempt($admin)){

            Toastr::success("Welcome Admin ".  Auth::guard('admin')->user()->last_name   );
            return redirect()->route('admin.dashboard');

        }else{
            Toastr::error("Incorrect Username Or Password" );
            return redirect()->back();
        }

    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'last_name'     => 'required|string|between:3,10',
            'first_name'    => 'required|string|between:3,10',
            'email'         => 'required|email|string|unique:admins,email',
            'password'      => 'required|min:5',
        ]);

        $admin = Admin::create([
            'last_name'     => $request->post('last_name'),
            'first_name'    => $request->post('first_name'),
            'email'         => $request->post('email'),
            'password'      => Hash::make($request->post('password')),
        ]);
        Toastr::success("Successfully Registered :) ");
        return view('admins.login');
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admins.dashboard');
    }



}


