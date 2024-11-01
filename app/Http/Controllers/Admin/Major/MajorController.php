<?php

namespace App\Http\Controllers\Admin\Major;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Models\Major;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(12);
        return view('Admin.Major.index', compact('majors'));
    }

    /**
     * Show the form for creating a new Major.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.Major.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MajorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MajorRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->uploadImage($request);
        Major::create($data);
        return redirect()->route('Admin.major.index')->with('success', 'Major created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\View\View
     */
    public function show(Major $major)
    {
        return view('Admin.Major.show', compact('major'));
    }

    /**
     * Show the form for editing the specified major.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\View\View
     */
    public function edit(Major $major)
    {
        return view('Admin.Major.edit', compact('major'));
    }

    /**
     * Update the specified major in storage.
     *
     * @param  \App\Http\Requests\MajorRequest  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(MajorRequest $request, Major $major)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }
        $major->update($data);
        return redirect()->route('Admin.major.index')->with('success', 'Major updated successfully');
    }

    /**
     * Remove the specified major from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('Admin.major.index')->with('success', 'Major deleted successfully');
    }

    /**
     * Handle image upload.
     *
     * @param Request $request
     * @return string|null
     */
    protected function uploadImage($request)
    {
        return $request->hasFile('image') ? $request->file('image')->store('majors/', 'public') : null;
    }
}
