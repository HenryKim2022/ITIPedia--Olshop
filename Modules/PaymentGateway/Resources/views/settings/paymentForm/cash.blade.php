 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasCash_on_Delivery" tabindex="-1">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">{{ localize('Cash On Delivery Configuration') }}</h5>
        <span
            class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
            data-bs-dismiss="offcanvas">
            <i data-feather="x"></i>
        </span>
    </div>
    <div class="offcanvas-body" data-simplebar>
        <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--Midtrans settings-->
            <input type="hidden" name="payment_method" value="Cash_on_Delivery">
            <input type="hidden" name="types[]" value="Cash_on_Delivery">
            <input type="hidden" value="0" name="is_virtual">
            <div class="mb-3">
                <label class="form-label">{{ localize('Enable Cash On Delivery') }}</label>
                <select id="is_active" class="form-control select2" name="is_active" data-toggle="select2">
                    <option value="0" {{ paymentGateway('Cash_on_Delivery')->is_active == '0' ? 'selected' : '' }}>
                        {{ localize('Disable') }}</option>
                    <option value="1" {{ paymentGateway('Cash_on_Delivery')->is_active == '1' ? 'selected' : '' }}>
                        {{ localize('Enable') }}</option>
                </select>
            </div>

           
            <!--midtrans settings-->
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">
                    <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                </button>
            </div>
        </form>
    </div>
</div>
