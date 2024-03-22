<div class="form-check form-switch">
    <input type="checkbox" onchange="updateStatus(this)" class="form-check-input"
        @if ($status == 1) checked @endif value="{{ $model_id }}">
</div>
@section('scripts')
    <script>
        "use strict";

        function updateStatus(el) {
            if (el.checked) {
                var is_active = 1;
            } else {
                var is_active = 0;
            }
            $.post('{{ route('admin.update-status') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    is_active: is_active,
                    table: "{{ $table }}"
                },
                function(data) {
                    if (data == 1) {
                        notifyMe('success', '{{ localize('Status updated successfully') }}');
                    } else {
                        notifyMe('danger', '{{ localize('Something went wrong') }}');
                    }
                });
        }
    </script>
@endsection
