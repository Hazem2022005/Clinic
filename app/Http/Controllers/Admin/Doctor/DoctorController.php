<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Models\Major;
// use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{


    /**
     * Display a listing of doctors in descending order with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'desc')->paginate(12);
        return view('Admin.Doctor.index', compact('doctors'));
    }


    /**
     * Show the form for creating a new doctor.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $majors = Major::all();
        return view('Admin.Doctor.create', compact('majors'));
    }


    /**
     * Store a newly created doctor in storage.
     *
     * @param DoctorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DoctorRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->uploadImage($request);
        Doctor::create($data);
        return redirect()->route('Admin.doctor.index')->with('success', 'Doctor created successfully');
    }


    /**
     * Display the specified doctor.
     *
     * @param Doctor $doctor
     * @return \Illuminate\View\View
     */
    public function show(Doctor $doctor)
    {
        return view('Admin.Doctor.show', compact('doctor'));
    }


    /**
     * Show the form for editing the specified doctor.
     *
     * @param Doctor $doctor
     * @return \Illuminate\View\View
     */
    public function edit(Doctor $doctor)
    {
        $majors = Major::all();
        return view('Admin.Doctor.edit', compact('doctor', 'majors'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param DoctorRequest $request
     * @param Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }
        $doctor->update($data);
        return redirect()->route('Admin.doctor.index')->with('success', 'Doctor updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doctor $doctor)
    {
        // Gate::authorize('manager');
        $doctor->delete();
        return redirect()->route('Admin.doctor.index')->with('success', 'Doctor deleted successfully');
    }

    /**
     * Handle image upload.
     *
     * @param Request $request
     * @return string|null
     */
    protected function uploadImage($request)
    {
        return $request->hasFile('image') ? $request->file('image')->store('doctors/', 'public') : null;
    }
}
