<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    /**
     * Display the registration form to the user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('site.auth.register');
    }


    /**
     * Register a new user with the given data.
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        Auth::login(User::create($data));
        return redirect()->route('home.index')->with('success', 'Account created successfully');
    }
}
