@extends('store.master')

@section('content')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="#" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">

                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{ asset('frontend/assets/imgs/page/login-1.png') }}" alt="" />
                            </div>

                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h4 class="mb-5">Create an Account</h4>
                                            <p class="mb-30">Already have an account? <a href="{{ route('store.login') }}">Login</a></p>
                                        </div>

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <input type="text" required="" name="name" placeholder="Name" value="{{ old('name') }}"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" required="" name="username" placeholder="Username" value="{{ old('username') }}"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Email" value="{{ old('email') }}" />
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <input required="" type="password" name="password" placeholder="Password" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input required="" type="password" name="password_confirmation" placeholder="Confirm password" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="custome-radio">
                                                        <input class="form-check-input" required="" type="radio"
                                                               name="role" id="exampleRadios3" checked="" value="user"/>
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            I am a customer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="custome-radio">
                                                        <input class="form-check-input" required="" type="radio"
                                                               name="role" id="exampleRadios4" value="user"/>
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            I am a vendor
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                        name="login">Submit &amp; Register
                                                </button>
                                            </div>
                                            <p class="font-xs text-muted">
                                                <strong>Note:</strong>Your personal data will be used to support your
                                                experience throughout this website, to manage access to your account,
                                                and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
