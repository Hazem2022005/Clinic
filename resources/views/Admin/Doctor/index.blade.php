@extends('admin.app')

@section('title' , 'Doctors')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Doctors</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Major</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::image($doctor->image) }}" alt="{{ $doctor->name }}">
                                    </td>
                                    <td>{{ $doctor->description }}</td>
                                    <td>{{ $doctor->major->name }}</td>
                                    <td>{{ $doctor->price }}</td>
                                    <td>
                                        <a href="{{ route('Admin.doctor.show', $doctor->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('Admin.doctor.edit', $doctor->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('Admin.doctor.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ( $doctors->hasPages() )
                    <div class="card-footer">
                        {{ $doctors->links() }}
                    </div>
                    @endif
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