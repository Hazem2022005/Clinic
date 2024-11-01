@extends('site.app')

@section('title', $doctor->name)

@section('content')
<div class="container">
    <nav
        style="--bs-breadcrumb-divider: '>'"
        aria-label="breadcrumb"
        class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item">
                <a class="text-decoration-none" href="{{ route('home.index') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a class="text-decoration-none" href="{{ route('doctors.index') }}">doctors</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $doctor->name }}
            </li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 details-card doctor-details">
        <div class="details d-flex gap-2 align-items-center">
            <img
                src="{{ asset('site/images/major.jpg') }}"
                alt="doctor"
                class="img-fluid rounded-circle"
                height="150"
                width="150" />
            <div class="details-info d-flex flex-column gap-3">
                <h4 class="card-title fw-bold">{{ $doctor->name }}</h4>
                <h6 class="card-title fw-bold">
                    {{ $doctor->description }}
                </h6>
            </div>
        </div>
        <hr />
        <form class="form" action="{{ route('reservation.store') }}" method="POST">
            @csrf
            <div class="form-items">
                <input type="hidden" value="{{ $doctor->id }}" name="doctor_id" class="form-control" id="doctor_id" />
                @error('doctor_id')
                <span class="alert alert-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label class="form-label required-label" for="name">Name</label>
                    <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" id="name" />
                    @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="phone">Phone</label>
                    <input type="tel" value="{{ Auth::user()->phone }}" name="phone" class="form-control" id="phone" />
                    @error('phone')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="email">Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" id="email" />
                    @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ $doctor->price }}" />
                    @error('price')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="date">Date</label>
                    <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control" id="date" />
                    @error('date')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label required-label" for="time">Time</label>
                    <input type="time" name="time" value="{{ date('H:i') }}" class="form-control" id="time" />
                    @error('time')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Confirm Booking
            </button>
        </form>
    </div>
</div>
@endsection