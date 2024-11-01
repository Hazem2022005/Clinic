<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\changePasswordRequest;
use App\Http\Requests\Site\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.user.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Site\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->deleteUserImage($user);
            $data['image'] = $request->file('image')->store('users/', 'public');
        }

        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(User $user)
    {
        $request = request();
        try {
            $this->deleteUserImage($user);
            $user->delete();
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('home.index')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('home.index')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }

    /**
     * Change the user's password.
     *
     * @param  \App\Http\Requests\Site\changePasswordRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(changePasswordRequest $request, User $user)
    {
        $user->update(['password' => Hash::make($request->validated('password'))]);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Delete the user's image.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function deleteUserImage(User $user)
    {
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
    }
}
