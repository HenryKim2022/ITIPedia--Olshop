 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasStripe" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Stripe Configuration') }}</h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <!--stripe settings-->
             <input type="hidden" name="payment_method" value="stripe">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="STRIPE_KEY" class="form-label">{{ localize('Publishable Key') }}</label>
                 <input type="text" id="STRIPE_KEY" name="types[STRIPE_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('stripe', 'STRIPE_KEY') }}">
             </div>
             <div class="mb-3">
                 <label for="STRIPE_SECRET" class="form-label">{{ localize('Stripe Secret') }}</label>
                 <input type="text" id="STRIPE_SECRET" name="types[STRIPE_SECRET]" class="form-control"
                     value="{{ paymentGatewayValue('stripe', 'STRIPE_SECRET') }}">
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Stripe') }}</label>
                 <select id="enable_stripe" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{ paymentGateway('stripe')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('stripe')->is_active == '1' ? 'selected' : '' }}>
                         {{ localize('Enable') }}</option>
                 </select>
             </div>
             <!--stripe settings-->
             <div class="mb-3">
                 <button class="btn btn-primary" type="submit">
                     <i data-feather="save" class="me-1"></i> {{ localize('Save Configuration') }}
                 </button>
             </div>
         </form>
     </div>
 </div>
