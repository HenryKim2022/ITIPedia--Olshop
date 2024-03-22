@if(isset($category))
    <form action="{{ route('support.category.update') }}" class="pb-650" method="POST">
        <input type="hidden" value="{{$category->id}}" name="id">
@else
    <form action="{{ route('support.category.store') }}" class="pb-650" method="POST">
@endif
    @csrf
    <!-- Category info start-->
    <div class="card mb-4" id="section-2">
        <div class="card-body">
            @if(isset($category))
            <h5 class="mb-4">{{ localize('Edit Category') }}</h5>
            @else  
            <h5 class="mb-4">{{ localize('Add New Category') }}</h5>
            @endif

            <div class="mb-4">
                <label for="name" class="form-label">{{ localize('Category Name') }}<span
                        class="text-danger ms-1">*</span></label>
                <input class="form-control" type="text" id="name" name="name"
                    placeholder="{{ localize('Type category name') }}"
                    value="{{ old('name', isset($category) ? $category->name : '') }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="assign_staff"
                    class="form-label">{{ localize('Assign Staff') }}
                    <span class="text-danger ms-1"></span></label>

                <select class="form-select select2" id="assign_staff" name="assign_staff">
                    <option value="">
                        {{ localize('Select Staff') }}
                    </option>
                    @foreach ($staffs as $staff)
                        
                    <option value="" {{ isset($category) ? $category->assign_staff == $staff->id ? 'selected':'':''}}>
                        {{ $staff->name }}
                    </option>
                    @endforeach
                   
                 
                </select>
            </div>
            <div class="mb-4">
                <label for="status"
                    class="form-label">{{ localize('Status') }}
                    <span class="text-danger ms-1">*</span></label>

                <select class="form-select select2" id="status" name="status"
                    required>
                    <option value="1" {{ isset($category) ? $category->is_active == 1 ? 'selected':'':''}}>
                        {{ localize('Active') }}
                    </option>
                    <option value="0" {{ isset($category) ? $category->is_active == 0 ? 'selected':'':''}}>
                        {{ localize('Deactive') }}
                    </option>
                 
                </select>
            </div>
        </div>
    </div>
    <!-- Category info end-->

    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-primary" type="submit">
                    <i data-feather="save" class="me-1"></i> {{ localize('Save Category') }}
                </button>
            </div>
        </div>
    </div>
</form>