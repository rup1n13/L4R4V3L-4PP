@extends('auth.auth')

@section('form')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="card card-primary">
        <div class="card-header">
            <h4>Email Verification</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
            @endif
            <p>A verification email has been sent to your email address. Please check your email and click on the verification link to activate your account.</p>
            <p>If you did not receive the email, you can click the button below to request a new verification email.</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="1">
                        Resend Verification Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
