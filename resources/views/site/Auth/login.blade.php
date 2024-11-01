@extends('site.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">login</li>
        </ol>
    </nav>
    <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
        <form class="form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label class="form-label required-label" for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label required-label" for="password">password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" id="remember" name="remember" class="form-check-input" value="1">
                <label class="form-check-label" for="remember">remember me</label>
                <span class="float-end">forget password?<a class="text-decoration-none" href="{{ route('password.request') }}"> reset password</a></span>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
            <span>don't have an account?</span><a class="link" href="{{ route('register.index') }}">create account</a>
        </div>
    </div>
</div>
@endsection


@push('script_footer')
<script>
    var success = "{{ session('success') }}";
    if (success) {
        alert(success);
    }
</script>
@endpush