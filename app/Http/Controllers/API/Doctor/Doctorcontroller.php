<?php

namespace App\Http\Controllers\API\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;

class Doctorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json([
            'success' => true,
            'message' => 'doctors retrieved successfully',
            'doctors' => $doctors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'doctor created successfully',
            'doctor' => $doctor
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return response()->json([
            'success' => true,
            'message' => 'doctor retrieved successfully',
            'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'doctor updated successfully',
            'doctor' => $doctor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json([
            'success' => true,
            'message' => 'doctor deleted successfully',
        ]);
    }
}
