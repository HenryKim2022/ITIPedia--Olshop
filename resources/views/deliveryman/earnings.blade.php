@extends('backend.layouts.master')

@section('title')
    {{ localize('Earnings History') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

<section class="tt-section pt-4">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Earnings') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12">
                <div class="card mb-4" id="section-1">
                   

                    <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                        <thead>
                            <tr>
                                <th class="text-center">{{ localize('S/L') }}</th>
                                <th>{{ localize('Amount') }}</th>
                                <th>{{ localize('Payment Method') }}</th>
                                <th>{{ localize('Earnings Date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wallets as $key => $wallet)
                                <tr>
                                    <td class="text-center">
                                        {{ $key + 1 + ($wallets->currentPage() - 1) * $wallets->perPage() }}</td>

                                    <td class="fs-sm">
                                        {{ $wallet->amount }}
                                    </td>

                                    <td class="fs-sm">
                                        {{ $wallet->payment_method }}
                                    </td>

                                    <td>

                                        {{$wallet->created_at->format('d, M Y')}}
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--pagination start-->
                    <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                        <span>{{ localize('Showing') }}
                            {{ $wallets->firstItem() }}-{{ $wallets->lastItem() }} {{ localize('of') }}
                            {{ $wallets->total() }} {{ localize('results') }}</span>
                        <nav>
                            {{ $wallets->appends(request()->input())->links() }}
                        </nav>
                    </div>
                    <!--pagination end-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    "use strict";
    $(function() {
             
    });
</script>
@endsection