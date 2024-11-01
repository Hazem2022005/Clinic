@extends('admin.app')

@section('title' , 'Reservations')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Reservations</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Doctor</th>
                                    <th>Major</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Price</th>
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
                                    <td>{{ $reservation->status }}</td>
                                    <td>{{ $reservation->date }}</td>
                                    <td>{{ $reservation->time }}</td>
                                    <td>{{ $reservation->doctor->price }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('Admin.reservation.edit', $reservation->id) }}" class="btn btn-primary mr-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('Admin.reservation.destroy', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('before-scripts')
<script>
    var success = "{{ session('success') }}";
    if (success) {
        alert(success);
    }
</script>
@endpush