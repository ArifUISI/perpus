@extends('layouts.login')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
        <label for="exampleDropdownFormEmail1" class="form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-sm btn-block btn-primary">
        Send Password Reset Link
    </button>
</form>
</div>
<div class="card-footer text-center">
    <a href="{{ url('/')}}"><small>Back to home</small></a>
</div>
@endsection
