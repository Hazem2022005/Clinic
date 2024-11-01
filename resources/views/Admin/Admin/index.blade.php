@extends('Admin.app')

@section('title' , 'Admins')

@section('content')
<section class="content">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Admins</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->id}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                                <td>{{$admin->role}}</td>
                                <td>
                                    <a href="{{route('Admin.admin.show', $admin->id)}}" class="btn btn-info mr-2"><i class="fa fa-eye"></i> Show</a>
                                    <a href="{{route('Admin.admin.edit', $admin->id)}}" class="btn btn-primary mr-2"><i class="fa fa-edit"></i> Edit</a>
                                    <form action="{{route('Admin.admin.destroy', $admin->id)}}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ( $admins->hasPages() )
                <div class="card-footer">
                    {{ $admins->links() }}
                </div>
                @endif
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