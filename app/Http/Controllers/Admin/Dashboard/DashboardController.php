<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Contact;
use App\Models\Reservation;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request to display dashboard statistics.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        // حساب الإحصائيات المختلفة للوحة التحكم
        $users = User::count();
        $doctors = Doctor::count();
        $reservations = Reservation::count();
        $messages = Contact::count();

        // عرض لوحة التحكم مع الإحصائيات
        return view('Admin.Dashboard.index', compact('users', 'doctors', 'reservations', 'messages'));
    }
}
