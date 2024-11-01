<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index()
    {
        return view('site.auth.login');
    }


    /**
     * Handle an authentication attempt.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * This method attempts to authenticate a user using the provided email and password.
     * If successful, it regenerates the session and redirects the user to their intended destination.
     * If the authentication fails, it redirects back with an error message, retaining the email input.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Email or password is incorrect',
        ])->onlyInput('email');
    }


    /**
     * Log out the authenticated user, invalidate the session,
     * regenerate the session token, and redirect to the login page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login.index');
    }
}
