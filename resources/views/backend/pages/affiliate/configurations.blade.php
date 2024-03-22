@extends('backend.layouts.master')

@section('title')
    {{ localize('Affiliate Configurations') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Affiliate Configurations') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        @csrf
                        <!--general settings-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="affiliate_commission"
                                        class="form-label">{{ localize('Affiliate Commission %') }}<span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="types[]" value="affiliate_commission">

                                    <div class="input-group mb-3">
                                        <input type="number" id="affiliate_commission" name="affiliate_commission"
                                            class="form-control" placeholder="{{ localize('Type affiliate commission %') }}"
                                            step="0.001" value="{{ getSetting('affiliate_commission') }}" min="0"
                                            max="100">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="minimum_withdrawal_amount"
                                        class="form-label">{{ localize('Minimum Withdrawal Amount') }}<span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="hidden" name="types[]" value="minimum_withdrawal_amount">

                                    <div class="input-group mb-3">
                                        <input type="number" id="minimum_withdrawal_amount"
                                            name="minimum_withdrawal_amount" class="form-control"
                                            placeholder="{{ localize('Type minimum withdrawal amount') }}" step="0.001"
                                            value="{{ getSetting('minimum_withdrawal_amount') }}" min="0">
                                        <span class="input-group-text">$</span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    @php
                                        $affiliatePaymentMethods = getSetting('affiliate_payout_payment_methods') != null ? json_decode(getSetting('affiliate_payout_payment_methods')) : [];
                                    @endphp
                                    <label for="affiliate_payout_payment_methods"
                                        class="form-label">{{ localize('Payout Payment Methods') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="hidden" name="types[]" value="affiliate_payout_payment_methods">
                                    <select class="form-select select2" id="affiliate_payout_payment_methods"
                                        name="affiliate_payout_payment_methods[]"
                                        data-placeholder="{{ localize('Select payout payment methods') }}" multiple>
                                        <option value="bank_payment"@if (in_array('bank_payment', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('Bank Payment') }}
                                        </option>

                                        <option value="paypal"@if (in_array('paypal', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('Paypal') }}
                                        </option>

                                        <option value="stripe"@if (in_array('stripe', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('Stripe') }}
                                        </option>

                                        <option value="paytm"@if (in_array('paytm', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('PayTm') }}
                                        </option>

                                        <option value="razorpay"@if (in_array('razorpay', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('Razorpay') }}
                                        </option>

                                        <option value="iyzico"@if (in_array('iyzico', $affiliatePaymentMethods)) selected @endif>
                                            {{ localize('IyZico') }}
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="enable_affiliate_system"
                                        class="form-label">{{ localize('Enable Affiliate System') }}
                                        <span class="text-danger">*</span></label>
                                    <input type="hidden" name="types[]" value="enable_affiliate_system">

                                    <select class="form-select select2" id="enable_affiliate_system"
                                        name="enable_affiliate_system" required>
                                        <option value="1" @if (getSetting('enable_affiliate_system') == '1') selected @endif>
                                            {{ localize('Enable') }}
                                        </option>
                                        <option value="0" @if (getSetting('enable_affiliate_system') == '0') selected @endif>
                                            {{ localize('Disable') }}
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!--general settings-->

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Configure Affiliate Settings') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('General Information') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
@endsection
