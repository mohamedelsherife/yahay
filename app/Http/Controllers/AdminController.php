<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function loginForm(){
    return view('admin.login');
   }

   public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $admin = Admin::where(
        'email',
        $request->email
    )->first();

    if ($admin && Hash::check(
        $request->password,
        $admin->password
    )) {
        $request->session()->regenerate();

        session([
            'admin_id' => $admin->id,
            'admin_name' =>$admin->name,
            'admin_email' =>$admin->email
        ]);
        return redirect()->route('admin.dashboard');
    }
    return back()->withErrors([
        'email' => 'Invalid email or password'
    ])->onlyInput('email');
   }

  public function dashboard(Request $request)
{
    if (!$request->session()->has('admin_id')) {
        return redirect()->route('admin.login');
    }
    return view('admin.dashboard');
}

   public function logout(Request $request)
   {
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login');

    }
}
