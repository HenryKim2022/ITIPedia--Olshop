 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasRazorpay" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Razorpay Configuration') }}</h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="payment_method" value="razorpay">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="RAZORPAY_KEY" class="form-label">{{ localize('Razorpay Key') }}</label>
                 <input type="text" id="RAZORPAY_KEY" name="types[RAZORPAY_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('razorpay', 'RAZORPAY_KEY') }}">
             </div>
             <div class="mb-3">
                 <label for="RAZORPAY_SECRET" class="form-label">{{ localize('Razorpay Secret') }}</label>
                 <input type="text" id="RAZORPAY_SECRET" name="types[RAZORPAY_SECRET]" class="form-control"
                     value="{{ paymentGatewayValue('razorpay', 'RAZORPAY_SECRET') }}">
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Razorpay') }}</label>
                 <select id="enable_razorpay" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{ paymentGateway('razorpay')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('razorpay')->is_active == '1' ? 'selected' : '' }}>
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
