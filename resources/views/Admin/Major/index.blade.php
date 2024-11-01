@extends('admin.app')

@section('title' , 'Majors')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Majors</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($majors as $major)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $major->name }}</td>
                                    <td class="text-center"><img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::image($major->image) }}"></td>
                                    <td>
                                        <a href="{{ route('Admin.major.show', $major->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('Admin.major.edit', $major->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('Admin.major.destroy', $major->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if ( $majors->hasPages() )
                    <div class="card-footer">
                        {{ $majors->links() }}
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