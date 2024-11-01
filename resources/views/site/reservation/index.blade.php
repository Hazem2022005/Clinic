@extends('site.app')

@section('title', 'Reservation')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reservation</h3>
            </div>
            @if ( !$reservations->isEmpty() )
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Doctor</th>
                            <th>Major</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->doctor->name }}</td>
                            <td>{{ $reservation->doctor->major->name }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->time }}</td>
                            <td>{{ $reservation->doctor->price }}</td>
                            <td>{{ $reservation->status }}</td>
                            <td class="d-flex">
                                <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @if ( $reservations->hasPages() )
                        <tr>
                            <th colspan="7">{{ $reservations->links() }}</th>
                        </tr>
                        @endif
                    </tfoot>
                </table>
            </div>
            @else
            <div class="card-body">
                <p>No reservation found.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endSection