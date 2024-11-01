<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Doctor;

class HomeController extends Controller
{
    /**
     * Handle the incoming request to display majors and doctors.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $majors = Major::latest()->take(8)->get();
        $doctors = Doctor::latest()->take(8)->get();
        return view('site.home.index', compact('majors', 'doctors'));
    }
}
