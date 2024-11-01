@extends('Admin.app')

@section('title' , $admin->name)

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admin Details</h3>
                    </div>
                    <div class="card-header">
                        <div class="image float-right">
                            <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::userimage($admin->image) }}" alt="{{ $admin->name }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">Name</th>
                                    <td>{{ $admin->name }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $admin->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $admin->role }}</td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $admin->created_at }}</td>
                                </tr>
                                <tr>
                                    <th>Updated At</th>
                                    <td>{{ $admin->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('Admin.admin.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        <form action="{{route('Admin.admin.destroy', $admin->id)}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger float-right"><i class="fa fa-trash"></i> Delete</button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endSection