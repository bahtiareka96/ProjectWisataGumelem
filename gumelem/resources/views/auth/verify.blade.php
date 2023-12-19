@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body p-4">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="text-muted mb-4">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>

                    <p class="text-muted mb-4">
                        {{ __('If you did not receive the email') }},
                        <a href="{{ route('verification.resend') }}" class="text-primary">
                            {{ __('click here to request another') }}
                        </a>.
                    </p>

                    <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
