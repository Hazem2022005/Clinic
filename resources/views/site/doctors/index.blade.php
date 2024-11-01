@extends('site.app')

@section('title', 'doctors')

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">doctors</li>
        </ol>
    </nav>
    <div class="doctors-grid">
        @foreach ($doctors as $doctor)
        <div class="card p-2" style="width: 18rem;">
            <img src="{{ asset('site/images/major.jpg') }}" class="card-img-top rounded-circle card-image-circle"
                alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">{{ $doctor->name }}</h4>
                <h6 class="card-title fw-bold text-center">{{ $doctor->major->name }}</h6>
                <a href="{{ route('doctors.show' , $doctor->id) }}" class="btn btn-outline-primary card-button">Book an
                    appointment</a>
            </div>
        </div>
        @endforeach
    </div>
    @if ( $doctors->hasPages() )
    <nav class="mt-5" aria-label="navigation">
        {{ $doctors->links() }}
    </nav>
    @endif
</div>
@endsection