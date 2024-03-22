@extends('backend.layouts.master')

@section('title')
    {{ localize('Delivery Configuration') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ localize('Deliveryman Configuration') }}</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="" method="POST">
                                @csrf

                                <div class="form-group row mb-3">

                                    <label class="col-md-4 col-from-label">
                                        {{ localize('Send Mail') }}
                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="delivery_boy_send_mail" class="form-check-input"
                                                {{ getSetting('delivery_boy_send_mail') == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-group row mb-3">

                                    <label class="col-md-4 col-from-label">
                                        {{ localize('Send OTP') }}
                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="delivery_boy_send_otp" class="form-check-input"
                                                {{ getSetting('delivery_boy_send_otp') == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row mb-3">

                                    <label class="col-md-4 col-from-label">
                                        {{ localize('Monthly Salary') }}
                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" name="delivery_boy_payment_type"
                                                class="form-check-input changetype salary"
                                                {{ getSetting('delivery_boy_payment_type') == 'salary' ? 'checked' : '' }}
                                                value="salary" id="salary">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group row mb-3">
                                    <label class="col-md-4 col-from-label">
                                        {{ localize('Per Order Commission') }}
                                    </label>
                                    <div class="col-md-8">
                                        <div class="form-check form-switch">
                                            <input type="checkbox"
                                                {{ getSetting('delivery_boy_payment_type') == 'commission' ? 'checked' : '' }}
                                                name="delivery_boy_payment_type"
                                                class="form-check-input changetype commission" value="commission"
                                                id="commission">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-3" id="commission_div">
                                    <label class="col-sm-4 col-from-label">{{ localize('Commission Rate') }}</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="number" name="delivery_boy_commission" class="form-control"
                                                value="{{ getSetting('delivery_boy_commission') }}" id="commission">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">
                                                    {{ getSetting('default_currency') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{ localize('Update') }}</button>
                                </div>
                            </form>
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
        $(function() {

            @if (getSetting('delivery_boy_payment_type') == 'salary')
                $('#commission_div').hide();
            @endif

            $('.changetype').on('change', function() {
                if ($(this).val() == 'commission') {
                    $('#commission').attr('checked', 'checked');
                    $('#salary').prop('checked', false);
                    $('#commission_div').show();
                }
                if ($(this).val() == 'salary') {
                    $('#salary').attr('checked', 'checked');
                    $('#commission').prop('checked', false);
                    $('#commission_div').hide();
                }
            })

        });
    </script>
@endsection
