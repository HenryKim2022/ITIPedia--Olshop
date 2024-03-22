@extends('backend.layouts.master')

@section('title')
    {{ localize('Dashboard') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 mb-3">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Deliveryman Dashboard') }}</h2>
                            </div>
                            <div class="tt-action">
                                {{-- action btns --}}
                            </div>
                        </div>
                    </div>
                </div>

               
                    <a href="{{route('deliveryman.earning-history')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{auth()->user()->wallets->sum('amount')}}</h4>
                                        <span class="text-muted">{{localize('Total Earnings')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="{{route('deliveryman.assigned')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{$assigned}}</h4>
                                        <span class="text-muted">{{localize('Total Assigned Order')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="{{route('deliveryman.pickedUp')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{$picked}}</h4>
                                        <span class="text-muted">{{localize('Total Picked Order')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>


                    <a href="{{route('deliveryman.outForDelivery')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{$out_for_delivery}}</h4>
                                        <span class="text-muted">{{localize('Out for Delivery')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>



                    <a href="{{route('deliveryman.delivered')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{$delivered}}</h4>
                                        <span class="text-muted">{{localize('Total Delivered Order')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>



                    <a href="{{route('deliveryman.cancelled')}}" class="col-lg-4 col-sm-6 mb-3">
                        <div class="card h-100 flex-column">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-lg">
                                        <div class="text-center bg-soft-primary rounded-circle">
                                            <span class="text-primary"> <i data-feather="shopping-bag"></i></span>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="mb-1">{{$cancelled}}</h4>
                                        <span class="text-muted">{{localize('Total Cancelled Order')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                



            </div>

        </div>
    </section>
@endsection
