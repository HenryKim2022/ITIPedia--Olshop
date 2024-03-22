 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasMidtrans" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Midtrans Configuration') }}</h5>
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
             <input type="hidden" name="payment_method" value="midtrans">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="MIDTRANS_SERVER_KEY" class="form-label">{{ localize('Midtrans Server Key') }}</label>
                 <input type="text" id="MIDTRANS_SERVER_KEY" name="types[MIDTRANS_SERVER_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('midtrans', 'MIDTRANS_SERVER_KEY') }}">
             </div>

             <div class="mb-3">
                 <label for="MIDTRANS_CLIENT_KEY" class="form-label">{{ localize('Midtrans Client Key') }}</label>
                 <input type="text" id="MIDTRANS_CLIENT_KEY" name="types[MIDTRANS_CLIENT_KEY]" class="form-control"
                     value="{{ paymentGatewayValue('midtrans', 'MIDTRANS_CLIENT_KEY') }}">
             </div>
             
             <div class="mb-3">
                <label class="form-label">{{ localize('Finish URL') }}</label>
                <input type="text" class="form-control"
                value="{{route('midtrans.success')}}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ localize('Payment Notification URL') }}</label>
                <input type="text" class="form-control"
                value="{{route('midtrans.payment-notification')}}">
            </div>

            <div class="mb-3">
                <label class="form-label">{{ localize('Payment Failed URL') }}</label>
                <input type="text" class="form-control"
                value="{{route('midtrans.failed')}}">
            </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Midtrans') }}</label>
                 <select id="enable_midtrans" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{ paymentGateway('midtrans')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('midtrans')->is_active == '1' ? 'selected' : '' }}>
                         {{ localize('Enable') }}</option>
                 </select>
             </div>



             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Test Sandbox Mode') }}</label>
                 <select id="midtrans_sandbox" class="form-control select2" name="sandbox"
                     data-toggle="select2">
                     <option value="0" {{ paymentGateway('midtrans')->sandbox == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{ paymentGateway('midtrans')->sandbox == '1' ? 'selected' : '' }}>
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
