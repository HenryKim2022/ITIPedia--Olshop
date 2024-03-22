@if(isset($priority))
    <form action="{{ route('support.priority.update') }}" class="pb-650" method="POST">
        <input type="hidden" value="{{$priority->id}}" name="id">
@else
    <form action="{{ route('support.priority.store') }}" class="pb-650" method="POST">
@endif
    @csrf
    <!-- Priority info start-->
    <div class="card mb-4" id="section-2">
        <div class="card-body">
            @if(isset($priority))
            <h5 class="mb-4">{{ localize('Edit Priority') }}</h5>
            @else  
            <h5 class="mb-4">{{ localize('Add New Priority') }}</h5>
            @endif

            <div class="mb-4">
                <label for="name" class="form-label">{{ localize('Priority Name') }}<span
                        class="text-danger ms-1">*</span></label>
                <input class="form-control" type="text" id="name" name="name"
                    placeholder="{{ localize('Type Priority name') }}"
                    value="{{ old('name', isset($priority) ? $priority->name : '') }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="row mb-4">
                <div class="col-6">
                        <label for="status"
                            class="form-label">{{ localize('Color') }}
                            <span class="text-danger ms-1">*</span></label>
                            <input class="form-control" type="color" id="color" name="color"
                            placeholder="" style="height : 46px"
                            value="{{ old('color', isset($priority) ? $priority->color : '') }}" required>
                        @if ($errors->has('color'))
                            <span class="text-danger">{{ $errors->first('color') }}</span>
                        @endif
                       
                </div>
                <div class="col-6">
                        <label for="status"
                            class="form-label">{{ localize('Status') }}
                            <span class="text-danger ms-1">*</span></label>
        
                        <select class="form-select select2" id="status" name="status"
                            required>
                            <option value="1" {{ isset($priority) ? $priority->is_active == 1 ? 'selected':'':''}}>
                                {{ localize('Active') }}
                            </option>
                            <option value="0" {{ isset($priority) ? $priority->is_active == 0 ? 'selected':'':''}}>
                                {{ localize('Deactive') }}
                            </option>
                         
                        </select>
                </div>
            </div>
            
            
        </div>
    </div>
    <!-- Priority info end-->

    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-primary" type="submit">
                    <i data-feather="save" class="me-1"></i> {{ localize('Save Priority') }}
                </button>
            </div>
        </div>
    </div>
</form>