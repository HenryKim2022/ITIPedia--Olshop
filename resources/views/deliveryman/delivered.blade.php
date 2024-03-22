@extends('backend.layouts.master')

@section('title')
    {{ localize('Delivered Orders') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Delivered Orders') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="{{ Request::fullUrl() }}" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1 d-none">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search"
                                                    placeholder="{{ localize('Search by name/phone') }}"
                                                    @isset($searchKey)
                                                value="{{ $searchKey }}"
                                                @endisset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="input-group mb-3">
                                            @if (getSetting('order_code_prefix') != null)
                                                <div class="input-group-prepend">
                                                    <span
                                                        class="input-group-text rounded-end-0">{{ getSetting('order_code_prefix') }}</span>
                                                </div>
                                            @endif
                                            <input type="text" class="form-control" placeholder="{{ localize('code') }}"
                                                name="code"
                                                @isset($searchCode)
                                                value="{{ $searchCode }}"
                                                @endisset>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select select2" name="payment_status"
                                            data-minimum-results-for-search="Infinity" id="payment_status">
                                            <option value="">{{ localize('Payment Status') }}</option>
                                            <option value="{{ paidPaymentStatus() }}"
                                                @if (isset($paymentStatus) && $paymentStatus == paidPaymentStatus()) selected @endif>
                                                {{ localize('Paid') }}</option>
                                            <option value="{{ unpaidPaymentStatus() }}"
                                                @if (isset($paymentStatus) && $paymentStatus == unpaidPaymentStatus()) selected @endif>
                                                {{ localize('Unpaid') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="search" width="18"></i>
                                            {{ localize('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ localize('S/L') }}
                                    </th>
                                    <th>{{ localize('Order Code') }}</th>
                                    <th data-breakpoints="xs sm md">{{ localize('Customer') }}</th>
                                    <th data-breakpoints="xs">{{ localize('Items') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Payment') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Type') }}</th>
                                    <th data-breakpoints="xs sm">{{ localize('Amount') }}</th>
                                    <th data-breakpoints="xs sm" class="text-end">{{ localize('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 + ($orders->currentPage() - 1) * $orders->perPage() }}</td>

                                        <td class="fs-sm">
                                            {{ getSetting('order_code_prefix') }}{{ $order->orderGroup->order_code }}
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img class="rounded-circle"
                                                        src="{{ uploadedAsset(optional($order->user)->avatar) }}"
                                                        alt="avatar"
                                                        onerror="this.onerror=null;this.src='{{ staticAsset('backend/assets/img/placeholder-thumb.png') }}';" />
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="fs-sm mb-0">{{ optional($order->user)->name }}</h6>
                                                    <span class="text-muted fs-sm">
                                                        {{ optional($order->user)->phone ?? '-' }}</span>
                                                    <div class="text-muted fs-sm">
                                                        {{ localize('Placed On') }} :
                                                        {{ date('d M, Y', strtotime($order->created_at)) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="tt-tb-price">
                                            <span class="fw-bold">
                                                {{ $order->orderItems()->count() }}
                                            </span>
                                        </td>

                                        <td>
                                            @if ($order->payment_status == unpaidPaymentStatus())
                                                <span class="badge bg-soft-danger rounded-pill text-capitalize">
                                                    {{ $order->payment_status }}
                                                </span>
                                            @else
                                                <span class="badge bg-soft-primary rounded-pill text-capitalize">
                                                    {{ $order->payment_status }}
                                                </span>
                                            @endif
                                        </td>


                                        <td>
                                            <span
                                                class="badge rounded-pill text-capitalize {{ $order->shipping_delivery_type == getScheduledDeliveryType() ? 'bg-soft-warning' : 'bg-secondary' }}">
                                                {{ Str::title(Str::replace('_', ' ', $order->shipping_delivery_type)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-accent">
                                                {{ formatPrice($order->orderGroup->grand_total_amount) }}
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            <a href="{{ route('deliveryman.show', $order->id) }}"
                                                class="btn btn-sm p-0 tt-view-details" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="View Details">
                                                <i data-feather="eye"></i>
                                            </a>

                                            <a href="{{ route('deliveryman.downloadInvoice', $order->id) }}"
                                                class="btn btn-sm p-0 tt-view-details ms-1">
                                                <i data-feather="download" width="18" class="text-success"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span>{{ localize('Showing') }}
                                {{ $orders->firstItem() }}-{{ $orders->lastItem() }} {{ localize('of') }}
                                {{ $orders->total() }} {{ localize('results') }}</span>
                            <nav>
                                {{ $orders->appends(request()->input())->links() }}
                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
