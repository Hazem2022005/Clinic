<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Auth.login');
    }

    /**
     * Attempt to authenticate the admin user with the provided credentials.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/Admin');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    /**
     * Log out the authenticated admin user, invalidate the session,
     * regenerate the session token, and redirect to the admin login page
     * with a success message.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('Admin.login.index')->with('success', 'You have been logged out successfully.');
    }
}
