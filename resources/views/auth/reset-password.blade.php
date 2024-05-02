@extends('auth.auth')
@section('form')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="card card-primary">
      <div class="card-header">
        <h4>Reset Password</h4>
      </div>
      <div class="card-body">
        <p class="text-muted">Enter Your New Password</p>
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{$request->route('token')}}">
          <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{$request->email}}" required autofocus>
            @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
        </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator"
              name="password" tabindex="2" required>
            <div id="pwindicator" class="pwindicator">
              <div class="bar"></div>
              <div class="label"></div>
            </div>
            @error('password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
          </div>
          <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
              tabindex="2" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
              Reset Password
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
