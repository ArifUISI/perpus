@extends('layouts.login')
@section('content')
<form method="POST" action="{{ route('login') }}" class="my-login-validation" novalidate="">
    @csrf
    <div class="form-group">
        <label for="exampleDropdownFormEmail1" class="form-label">Email</label>
        <input name="email"  type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@gmail.com" required
            autocomplete="email">
    </div>
    <div class="form-group">
        <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
        <input name="password"  type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" data-eye>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Remember me</label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="float-right">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-block btn-primary">Log in</button>
</form>
</div>
<div class="card-footer text-center">
    <a href="{{ url('/')}}"><small>Back to home</small></a>
</div>

@endsection
