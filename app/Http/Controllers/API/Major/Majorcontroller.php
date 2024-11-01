<?php

namespace App\Http\Controllers\API\Major;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Http\Requests\MajorRequest;

class Majorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();
        return response()->json([
            'success' => true,
            'message' => 'majors retrieved successfully',
            'majors' => $majors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        $major = Major::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'major created successfully',
            'major' => $major
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return response()->json([
            'success' => true,
            'message' => 'major retrieved successfully',
            'major' => $major
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {

        $major->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'major updated successfully',
            'major' => $major
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return response()->json([
            'success' => true,
            'message' => 'major deleted successfully',
        ]);
    }
}
