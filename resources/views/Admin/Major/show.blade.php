@extends('admin.app')

@section('title' , $major->name)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $major->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body row">
                            <!-- image -->
                            <div class="form-group col-md-4">
                                <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::image($major->image) }}" alt="{{ $major->name }}" disabled>
                            </div>
                            <!-- name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $major->name }}" disabled>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('Admin.major.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                            <a href="{{ route('Admin.major.edit', $major->id) }}" class="btn btn-success float-right"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection