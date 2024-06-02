@extends('store.master')

@section('header')
    @include('store.includes.header')
@endsection

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                           href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                           role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab"
                                           href="#track-orders" role="tab" aria-controls="track-orders"
                                           aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track
                                            Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                           role="tab" aria-controls="address" aria-selected="true"><i
                                                class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                           href="#account-detail" role="tab" aria-controls="account-detail"
                                           aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <div class="col-lg-12">
                                                    <button type="submit" class="nav-link">
                                                        <i class="fi-rs-sign-out mr-10"></i>
                                                        <span>{{ __('Log Out') }}</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    @include('store.profile.includes.dashboard')
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    @include('store.profile.includes.orders')
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                     aria-labelledby="track-orders-tab">
                                    @include('store.profile.includes.track-orders')
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    @include('store.profile.includes.address')
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                     aria-labelledby="account-detail-tab">
                                    @include('store.profile.includes.account-details')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('store.includes.footer')
@endsection
