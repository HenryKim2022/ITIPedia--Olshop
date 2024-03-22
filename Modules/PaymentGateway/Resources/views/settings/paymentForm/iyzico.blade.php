 <!-- Offcanvas -->
 <div class="offcanvas offcanvas-end" id="offcanvasIyzico" tabindex="-1">
     <div class="offcanvas-header border-bottom">
         <h5 class="offcanvas-title">{{ localize('Iyzico Configuration') }}</h5>
         <span
             class="btn btn-outline-danger rounded-circle btn-icon d-inline-flex align-items-center justify-content-center"
             data-bs-dismiss="offcanvas">
             <i data-feather="x"></i>
         </span>
     </div>
     <div class="offcanvas-body" data-simplebar>
         <form action="{{ route('payment-gateway-setting.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <input type="hidden" name="payment_method" value="iyzico">
             <input type="hidden" value="1" name="is_virtual">
             <div class="mb-3">
                 <label for="IYZICO_API_KEY" class="form-label">{{ localize('IyZico API Key') }}</label>
                 <input type="text" id="IYZICO_API_KEY" name="types[IYZICO_API_KEY]" class="form-control"
                     value="{{  paymentGatewayValue('iyzico', 'IYZICO_API_KEY') }}">
             </div>

             <div class="mb-3">
                 <label for="IYZICO_SECRET_KEY" class="form-label">{{ localize('IyZico Secret Key') }}</label>
                 <input type="text" id="IYZICO_SECRET_KEY" name="types[IYZICO_SECRET_KEY]" class="form-control"
                     value="{{  paymentGatewayValue('iyzico', 'IYZICO_SECRET_KEY') }}">
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable IyZico') }}</label>
                 <select id="enable_iyzico" class="form-control select2" name="is_active" data-toggle="select2">
                     <option value="0" {{paymentGateway('iyzico')->is_active == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{paymentGateway('iyzico')->is_active == '1' ? 'selected' : '' }}>
                         {{ localize('Enable') }}</option>
                 </select>
             </div>

             <div class="mb-3">
                 <label class="form-label">{{ localize('Enable Test Sandbox Mode') }}</label>
                 <select id="iyzico_sandbox" class="form-control select2" name="sandbox" data-toggle="select2">
                     <option value="0" {{paymentGateway('iyzico')->sandbox == '0' ? 'selected' : '' }}>
                         {{ localize('Disable') }}</option>
                     <option value="1" {{paymentGateway('iyzico')->sandbox == '1' ? 'selected' : '' }}>
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
