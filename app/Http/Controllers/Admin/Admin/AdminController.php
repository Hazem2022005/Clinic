<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    /**
     * Display a paginated listing of admins.
     *
     * @return \Illuminate\View\View The view displaying the list of admins.
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('Admin.Admin.index', compact('admins'));
    }


    /**
     * Show the form for creating a new admin.
     *
     * @return \Illuminate\View\View The view displaying the create admin form.
     */
    public function create()
    {
        // Gate::authorize('manager');
        return view('Admin.Admin.create');
    }


    /**
     * Store a newly created admin in storage.
     *
     * @param  \App\Http\Requests\Admin\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        // Gate::authorize('manager');
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        Admin::create($data);
        return redirect()->route('Admin.admin.index')->with('success', 'Admin created successfully');
    }


    /**
     * Display the specified admin.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\View\View The view displaying the admin.
     */
    public function show(Admin $admin)
    {
        // Gate::authorize('manager');
        return view('Admin.Admin.show', compact('admin'));
    }


    /**
     * Show the form for editing the specified admin.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\View\View The view displaying the edit admin form.
     */
    public function edit(Admin $admin)
    {
        // Gate::authorize('manager');
        return view('Admin.Admin.edit', compact('admin'));
    }


    /**
     * Update the specified admin in storage.
     *
     * @param  \App\Http\Requests\Admin\AdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        // Gate::authorize('manager');
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $this->deleteAdminImage($admin);
            $data['image'] = $request->file('image')->store('admins/', 'public');
        }

        $admin->update($data);
        return redirect()->route('Admin.admin.index')->with('success', 'Admin updated successfully');
    }


    /**
     * Remove the specified admin from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        // Gate::authorize('manager');
        $this->deleteAdminImage($admin);
        $admin->delete();
        return redirect()->route('Admin.admin.index')->with('success', 'Admin deleted successfully');
    }


    /**
     * Delete the admin's image.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    protected function deleteAdminImage(Admin $admin)
    {
        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }
    }
}
