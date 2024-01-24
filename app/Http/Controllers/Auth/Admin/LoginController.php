<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    public function __construct()
    {

        // $this->middleware('guest:admin')->only(['loginForm','registerForm']);
    }
    public function dashboard()
    {
        return view('admin.admin');
    }


    public function loginForm()
    {
        return view('auth.admin.adminLoginForm');
    }


    public function checkAdmin(AuthRequest $request)
    {
        // return $request;
        $request->merge(['password' => $request->Adminpassword]);
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->to($this->redirectTo);
        } else
            return redirect()->back()->withInput(['email' => $request->email])->with(['error' => 'somthing went wrong']);
    }

    public function Logout(Request $request)
    {
        Auth::guard('admin')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('loginForm');
    }
}
