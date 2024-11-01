@extends('admin.app')

@section('title' , $doctor->name)

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $doctor->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <!-- image -->
                            <div class="form-group col-md-4 text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ FileHelper::image($doctor->image) }}" alt="{{ $doctor->name }}" disabled>
                            </div>
                            <!-- name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $doctor->name }}" disabled>
                            </div>
                            <!-- description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="3" disabled>{{ $doctor->description }}</textarea>
                            </div>
                            <!-- major -->
                            <div class="form-group">
                                <label for="major">Major</label>
                                <input type="text" class="form-control" id="major" placeholder="Enter major" value="{{ $doctor->major->name }}" disabled>
                            </div>
                            <!-- price -->
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Enter price" value="{{ $doctor->price }}" disabled>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{ route('Admin.doctor.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                            <a href="{{ route('Admin.doctor.edit', $doctor->id) }}" class="btn btn-success float-right"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection