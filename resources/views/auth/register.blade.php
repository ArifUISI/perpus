@extends('layouts.login')
@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="exampleDropdownFormName1" class="form-label">Nama</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="email">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleDropdownFormEmail1" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="email">
    </div>
    <div class="form-group">
        <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password" placeholder="Password" data-eye>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleDropdownFormPassword1" class="form-label">Konfirmasi Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
            autocomplete="new-password" data-eye>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Ingat Saya</label>
            @if (Route::has('password.request'))
            <a href="{{ url('login') }}" class="float-right">
                {{ __('Sudah Punya Akun?') }}
            </a>
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-block btn-primary">Register</button>
</form>
</div>
<div class="card-footer text-center">
    <a href="{{ url('/')}}"><small>Back to home</small></a>
</div>

@endsection
