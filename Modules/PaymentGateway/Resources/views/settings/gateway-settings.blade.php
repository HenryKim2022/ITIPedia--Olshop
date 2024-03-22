@extends('paymentgateway::layouts.master')

@section('title')
    {{ localize('Support Categories') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
@section('contents')
    <section class="tt-section pt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('Payment Methods Settings') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('Payment Methods Settings') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">

                @foreach ($payment_gateways as $payment_gateway)
                    {{-- paypal --}}
                    <div class="col-lg-3 col-md-6">
                        <div class="tt-payment-gateway rounded-3 shadow-sm card border-0 h-100 flex-column cursor-pointer"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvas{{ucfirst($payment_gateway->gateway)}}">
                            <div class="card-body tt-payment-info">
                                <div class="d-flex align-items-center justify-content-between">
                                    <img class="img-fluid" src="{{ imagePath($payment_gateway->image) }}"
                                        alt="avatar" />
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input"
                                            @if ($payment_gateway->is_active == 1) checked @endif>
                                    </div>
                                </div>
                                <div class="tt-payment-setting position-absolute btn rounded-pill btn-light">
                                    {{ localize('Settings') }}<i data-feather="arrow-right" class="ms-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach                                   
                 
            </div>

         
           
        </div>
    </section>
        {{-- payment form --}}
    @include('paymentgateway::settings.paymentForm.paypal')
    @include('paymentgateway::settings.paymentForm.mercadopago')
    @include('paymentgateway::settings.paymentForm.stripe')
    @include('paymentgateway::settings.paymentForm.paytm')
    @include('paymentgateway::settings.paymentForm.razorpay')
    @include('paymentgateway::settings.paymentForm.iyzico')
    @include('paymentgateway::settings.paymentForm.paystack')
    @include('paymentgateway::settings.paymentForm.flutterwave')
    @include('paymentgateway::settings.paymentForm.duitku')
    @include('paymentgateway::settings.paymentForm.yookassa')   
    @include('paymentgateway::settings.paymentForm.molile')
    @include('paymentgateway::settings.paymentForm.mercadopago')
    @include('paymentgateway::settings.paymentForm.midtrans')
    @include('paymentgateway::settings.paymentForm.offline')
    @include('paymentgateway::settings.paymentForm.cash')

@endsection
