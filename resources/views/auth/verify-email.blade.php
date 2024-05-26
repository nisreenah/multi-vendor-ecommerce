@extends('auth.master')

@section('body')

    <body class="bg-login">
        <!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <img src="{{ asset('backend/assets/images/logo-img.png') }}" width="180" alt=""/>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Confirmation</h3>
                                            <p>
                                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                            </p>
                                        </div>

                                        <div class="login-separater text-center mb-4">
                                            <hr/>
                                        </div>

                                        <div class="form-body">

                                            @if (session('status') == 'verification-link-sent')
                                                <div class="mb-4 font-medium text-sm text-green-600">
                                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('verification.send') }}" class="row g-3">
                                                @csrf

                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bx bxs-lock-open"></i>
                                                            {{ __('Resend Verification Email') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <div class="mb-3">
                                                    <button type="submit" class="btn">
                                                        {{ __('Log Out') }}
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end wrapper-->
    </body>

@endsection
