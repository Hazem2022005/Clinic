<?php

namespace App\Http\Controllers\Site\Major;

use App\Http\Controllers\Controller;
use App\Models\Major;

class MajorController extends Controller
{
    /**
     * Display a listing of the majors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $majors = Major::latest()->paginate(12);

        return view('site.majors.index', compact('majors'));
    }
}
