@extends('frontend.default.layouts.master')

@section('title')
    {{ localize('Coupons') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <div class="breadcrumb-content">
        <h2 class="mb-2 text-center">{{ localize('All Coupons') }}</h2>
        <nav>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="{{ route('home') }}">{{ localize('Home') }}</a></li>
                <li class="breadcrumb-item fw-bold" aria-current="page">{{ localize('Coupons') }}</li>
            </ol>
        </nav>
    </div>
@endsection

@section('contents')
    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->

    
    <!--campaign section start-->
    


    {{-- <section class="tt-campaigns pt-20">
        @php
    $coupons = \App\Models\Coupon::where('end_date', '>=', strtotime(date('Y-m-d')))
        ->latest()
        ->get();
@endphp

<div class="container">
    <div class="row">
        @forelse ($coupons as $coupon)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 tt-coupon-single tt-gradient-top" style="background: url('{{ uploadedAsset($coupon->banner) }}') no-repeat center center / cover">
                    <div class="card-body text-center py-1 px-0">
                        <div class="offer-text mb-1">
                            <div class="up-to fw-bold text-light">{{ localize('UP TO') }}</div>
                            <div class="display-4 fw-bold text-danger">
                                {{ $coupon->discount_type != 'flat' ? $coupon->discount_value : formatPrice($coupon->discount_value) }}
                            </div>
                            <p class="mb-0 fw-bold text-danger">
                                <span>{{ $coupon->discount_type != 'flat' ? '%' : '' }}</span> <br>
                                {{ localize('Off') }}
                            </p>
                        </div>
                        <div class="coupon-row">
                            <span class="copyCode">{{ $coupon->code }}</span>
                            <span class="copyBtn copy-text" data-clipboard-text="{{ $coupon->code }}">{{ localize('Copy Code') }}</span>
                        </div>
                        <ul class="timing-countdown countdown-timer d-inline-block gap-0 mt-1" data-date="{{ date('m/d/Y', $coupon->end_date) }} 23:59:59">
                            <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                <h5 class="mb-0 days fs-xxxs">00</h5>
                                <span class="gshop-subtitle fs-xxs d-block">{{ localize('Days') }}</span>
                            </li>
                            <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                <h5 class="mb-0 hours fs-xxxs">00</h5>
                                <span class="gshop-subtitle fs-xxs d-block">{{ localize('Hours') }}</span>
                            </li>
                            <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                <h5 class="mb-0 minutes fs-xxxs">00</h5>
                                <span class="gshop-subtitle fs-xxs d-block">{{ localize('Min') }}</span>
                            </li>
                            <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                <h5 class="mb-0 seconds fs-xxxs">00</h5>
                                <span class="gshop-subtitle fs-xxs d-block">{{ localize('Sec') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 col-md-6 mx-auto">
                <img src="{{ staticAsset('frontend/default/assets/img/no-data-found.png') }}" class="img-fluid" alt="">
            </div>
        @endforelse
    </div>
</div>
    </section> --}}



    <style>
 
        .display-8 {
            font-size: calc(1.045rem + 0.1vw);
            font-weight: 700;
            line-height: 1.2;
        }

        .coupon-row{
            margin: -5px auto;
        }

 
        small, .small, .fs-15 {
            font-size: .775rem;
        }
    </style>


    <section class="tt-campaigns pt-8 pb-100">
        <div class="container">
            <div class="row g-4">

                @php
                    $coupons = \App\Models\Coupon::where('end_date', '>=', strtotime(date('Y-m-d')))
                        ->latest()
                        ->get();
                @endphp

                @forelse ($coupons as $coupon)
                    <div class="col-lg-4 col-md-6">

                        
                        @php
                            $couponBanner = $coupon->banner;
                        @endphp


                        @if ($couponBanner != '')
                            <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                                style="background:
                                    url('{{ uploadedAsset($coupon->banner) }}')no-repeat center
                                    center / cover">
                       
                        @else
                            <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                                style="background-color: #84ac75"
                            >
                           
                        @endif

                        {{-- <div class="card shadow-lg border-0 tt-coupon-single tt-gradient-top"
                            style="background:
                                url('{{ uploadedAsset($coupon->banner) }}')no-repeat center
                                center / cover"> --}}

                            <div class="card-body text-center py-5 px-4">
                                <div class="row d-flex justify-content-sm-evenly">
                                    <div class="row d-flex flex-column">
                                        <div class="col">
                                            <div class="offer-text mb-2 mt-2 justify-content-center">
                                                <div class="up-to fw-bold text-light">{{ localize('UP TO') }}</div>
                                                <div class="display-5 fw-bold text-danger">
                                                    {{ $coupon->discount_type != 'flat' ? $coupon->discount_value : formatPrice($coupon->discount_value) }}
                                                </div>
                                                <p class="display-8 mb-0 fw-bold text-danger">
                                                    <span>{{ $coupon->discount_type != 'flat' ? '%' : '' }}</span> <br>
                                                    {{ localize('Off') }}
                                                </p>
                                            </div>                                      
    
                                        </div>
                                        <div class="coupon-row">
                                            <span class="copyCode pt-2 pb-2 pl-1 pr-1 fs-14">{{ $coupon->code }}</span>
                                            <span class="copyBtn copy-text pt-2 pb-2 pl-1 pr-1 fs-15 bg-warning"
                                                data-clipboard-text="{{ $coupon->code }}">{{ localize('Copy Code') }}</span>
                                        </div>
    
                                       
                                    </div>

                                    <ul class="timing-countdown countdown-timer d-inline-block gap-2 mt-3 mb-4"
                                        data-date="{{ date('m/d/Y', $coupon->end_date) }} 23:59:59">
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 days fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block">{{ localize('Days') }}</span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 hours fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block">{{ localize('Hours') }}</span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 minutes fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block">{{ localize('Min') }}</span>
                                        </li>
                                        <li class="list-inline-item bg-white position-relative z-1 rounded-2">
                                            <h5 class="mb-1 seconds fs-sm">00</h5>
                                            <span class="gshop-subtitle fs-xxs d-block">{{ localize('Sec') }}</span>
                                        </li>
                                    </ul>
                                </div>
                                
                               
                           

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 col-md-6 mx-auto">

                        <img src="{{ staticAsset('frontend/default/assets/img/no-data-found.png') }}" class="img-fluid"
                            alt="">
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--campaign section end-->
@endsection
