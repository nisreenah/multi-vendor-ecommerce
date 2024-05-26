@extends('auth.master')

@section('body')
    <body class="bg-forgot">
        <!-- wrapper -->
        <div class="wrapper">
            <div class="authentication-forgot d-flex align-items-center justify-content-center">
                <div class="card forgot-box">
                    <div class="card-body">
                        <div class="p-4 rounded  border">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="text-center">
                                    <img src="{{ asset('backend/assets/images/icons/forgot-2.png') }}" width="120" alt="" />
                                </div>
                                <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                                <p class="text-muted">Enter your registered email address to reset the password</p>

                                <div class="my-4">
                                    <x-text-input id="email" class="form-control form-control-lg" type="email"
                                                  placeholder="example@user.com" name="email" :value="old('email')" required autofocus />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Email Password Reset Link') }}
                                    </button>

                                    <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                                        <i class='bx bx-arrow-back me-1'></i>Back to Login
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end wrapper -->
    </body>
@endsection
