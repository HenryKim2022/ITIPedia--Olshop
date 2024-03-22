 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasPaystack" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Paystack Configuration') }}</h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="payment_method" value="paystack">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="PAYSTACK_PUBLIC_KEY" class="form-label">{{ localize('Paystack Public Key') }}</label>
                 <input type="text" id="PAYSTACK_PUBLIC_KEY" name="types[PAYSTACK_PUBLIC_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('paystack', 'PAYSTACK_PUBLIC_KEY') }}">
             </div>

             <div class="mb-3">
                 <label for="PAYSTACK_SECRET_KEY" class="form-label">{{ localize('Secret Key') }}</label>
                 <input type="text" id="PAYSTACK_SECRET_KEY" name="types[PAYSTACK_SECRET_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('paystack', 'PAYSTACK_SECRET_KEY') }}">
             </div>

             <div class="mb-3">
                 <label for="MERCHANT_EMAIL" class="form-label">{{ localize('Merchant Email') }}</label>
                 <input type="text" id="MERCHANT_EMAIL" name="types[MERCHANT_EMAIL]" class="form-control"
                     value="{{ paymentGatewayValue('paystack', 'MERCHANT_EMAIL') }}">
             </div>

             <div class="mb-3">
                 <label for="" class="form-label">{{ localize('Paystack Callback') }}</label>
                 <input type="text" id="" name="" class="form-control" disabled
                     value="{{ route('paystack.callback') }}">
             </div>

             <div class="mb-3">
                 <label for="PAYSTACK_CURRENCY_CODE"
                     class="form-label">{{ localize('Paystack Currency Code') }}</label>
                 <input type="text" id="PAYSTACK_CURRENCY_CODE" name="types[PAYSTACK_CURRENCY_CODE]" class="form-control"
                     value="{{ paymentGatewayValue('paystack', 'PAYSTACK_CURRENCY_CODE') }}">
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Paystack') }}</label>
                 <select id="enable_paystack" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{ paymentGateway('paystack')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('paystack')->is_active == '1' ? 'selected' : '' }}>
                         {{ localize('Enable') }}</option>
                 </select>
             </div>
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                 </button>
             </div>
         </form>
     </div>
 </div>
