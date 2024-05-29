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
                                        <p>{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
                                    </div>

                                    <div class="login-separater text-center mb-4">
                                        <hr/>
                                    </div>
                                    <div class="form-body">

                                        <form method="POST" action="{{ route('password.confirm') }}" class="row g-3">
                                            @csrf

                                            <!-- Password -->
                                            <div class="col-12">

                                                <x-text-input id="password" class="form-control border-end-0"
                                                              type="password" placeholder="Enter Password"
                                                              name="password"
                                                              required autocomplete="current-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bx bxs-lock-open"></i>{{ __('Confirm') }}
                                                    </button>
                                                </div>
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
