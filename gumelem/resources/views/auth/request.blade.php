@extends('layouts.auth')

@section('content')
<body>
    <div class="container">
        <div class="row page-forget d-flex justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>
                        <div class="card-body">
                            <div class="form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session()->has('status'))
                                    <div class="alert alert-success">
                                        {{ session()->get('status') }}
                                    </div>
                                @endif

                                <h2>Forgot Your Password?</h2>
                                <p>please enter yout mail to password reset request</p>
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                    <input type="submit" class="btn btn-login w-100 mt-3" value="Request Password Reset">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
