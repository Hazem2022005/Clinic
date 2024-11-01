<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\changePasswordRequest;
use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display the profile of the specified admin.
     *
     * @param \App\Models\Admin $admin The admin whose profile is to be displayed.
     * @return \Illuminate\View\View The view displaying the admin profile.
     */
    public function show(Admin $admin)
    {
        return view('Admin.Profile.show', compact('admin'));
    }

    /**
     * Update the specified admin's profile in storage.
     *
     * @param \App\Http\Requests\Admin\ProfileRequest $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request, string $id)
    {
        $admin = Admin::find($id);
        $admin->update($request->validated());
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Change the password of the specified admin.
     *
     * @param \App\Http\Requests\Admin\changePasswordRequest $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(changePasswordRequest $request, string $id)
    {
        $admin = Admin::find($id);
        $admin->update(['password' => Hash::make($request->validated('password'))]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
