<?php

namespace App\Http\Controllers\Site\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the doctors.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $doctors = Doctor::when($request->major_id, function ($query) use ($request) {
            return $query->where('major_id', $request->major_id);
        })->paginate(8);

        return view('site.doctors.index', compact('doctors'));
    }

    /**
     * Display the specified doctor.
     *
     * @param Doctor $doctor
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(Doctor $doctor)
    {
        return view('site.doctors.show', compact('doctor'));
    }
}
