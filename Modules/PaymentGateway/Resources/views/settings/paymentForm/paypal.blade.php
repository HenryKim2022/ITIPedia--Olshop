 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasPaypal" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Paypal Configuration') }}</h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">            
             @csrf
             <input type="hidden" value="1" name="is_virtual">
             <!--paypal settings-->
             <input type="hidden" name="payment_method" value="paypal">
             <div class="mb-3">
                 <label for="PAYPAL_CLIENT_ID" class="form-label">{{ localize('Paypal Client ID') }}</label>
                 <input type="text" id="PAYPAL_CLIENT_ID" name="types[PAYPAL_CLIENT_ID]" class="form-control"
                     value="{{ paymentGatewayValue('paypal', 'PAYPAL_CLIENT_ID') }}">
             </div>
             <div class="mb-3">
                 <label for="PAYPAL_CLIENT_SECRET" class="form-label">{{ localize('Paypal Client Secret') }}</label>
                 <input type="text" id="PAYPAL_CLIENT_SECRET" name="types[PAYPAL_CLIENT_SECRET]" class="form-control"
                     value="{{  paymentGatewayValue('paypal','PAYPAL_CLIENT_SECRET') }}">
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Paypal') }}</label>
                 <select id="enable_paypal" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{ paymentGateway('paypal')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('paypal')->is_active == '1' ? 'selected' : '' }}>
                         {{ localize('Enable') }}</option>
                 </select>
             </div>


             <div class="mb-3">
                 <label class="form-label">{{ localize('Gateway') }} <span><small>Sandbox/Live</small></span></label>
                 <select id="paypal_type" class="form-control select2" name="payment_type" data-toggle="select2">
                     <option value="sandbox" {{paymentGateway('paypal')->type == 'sandbox' ? 'selected' : '' }}>
                         {{ localize('Sandbox') }}</option>
                     <option value="live" {{paymentGateway('paypal')->type == 'live' ? 'selected' : '' }}>
                         {{ localize('Live') }}</option>
                 </select>
             </div>
             
             <!--paypal settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                 </button>
             </div>
         </form>
     </div>
 </div>
