<?php

namespace App\Http\Controllers\Admin\Reservation;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Doctor;
use App\Http\Requests\Admin\ReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of all reservations in descending order with pagination.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'desc')->paginate(10);
        return view('Admin.Reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new reservation.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $doctors = Doctor::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return view('Admin.Reservation.create', compact('users', 'doctors'));
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param ReservationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReservationRequest $request)
    {
        Reservation::create($request->validated());
        return redirect()->route('Admin.reservation.index')->with('success', 'Reservation created successfully');
    }

    /**
     * Show the form for editing the specified reservation.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\View\View
     */
    public function edit(Reservation $reservation)
    {
        return view('Admin.Reservation.edit', compact('reservation'));
    }

    /**
     * Update the specified reservation in storage.
     *
     * @param ReservationRequest $request
     * @param Reservation $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());
        return redirect()->route('Admin.reservation.index')->with('success', 'Reservation updated successfully');
    }

    /**
     * Remove the specified reservation from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('Admin.reservation.index')->with('success', 'Reservation deleted successfully');
    }
}
