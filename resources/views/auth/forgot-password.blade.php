@extends('auth.auth')
@section('form')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Forgot Password</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">{{session('status')}}</div>
                @endif
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Forgot Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
