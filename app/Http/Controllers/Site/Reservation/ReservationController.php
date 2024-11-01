<?php

namespace App\Http\Controllers\Site\Reservation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the user's reservations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->where('status', '!=', 'cancelled')
            ->paginate(10);

        return view('site.reservation.index', compact('reservations'));
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param ReservationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReservationRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            Reservation::create($data);

            return redirect()->route('home.index')->with('success', 'Reservation created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create reservation: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified reservation's status to cancelled.
     *
     * @param Reservation $reservation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Reservation $reservation)
    {
        abort_if($reservation->user_id !== auth()->id(), 403, 'Unauthorized action.');

        $reservation->update(['status' => 'cancelled']);

        return redirect()->route('reservation.index')->with('success', 'Reservation cancelled successfully');
    }
}
