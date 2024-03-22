<div class="card mb-4" id="section-1">
    <div class="card-body">

        <div class="mb-3">
            <label for="title"
                class="form-label">{{ localize('Title') }}<span
                    class="text-danger ms-1">*</span></label>
            <input type="text" id="title" name="title"
                class="form-control">
                @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
        </div>
        @if(auth()->user()->user_type == 'admin')
            <div class="mb-3">
                <label for="staffs"
                    class="form-label">{{ localize('Assign Users') }}
                    <span class="text-danger ms-1"></span></label>
                <select class="form-select select2" id="staffs" name="staffs[]"
                    >
                    <option value="">{{ localize('Select Staffs') }}</option>
                    @foreach ($staffs as $staff) 
                        <option value="{{$staff->id}}">{{ $staff->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('staffs'))
                    <span class="text-danger">{{ $errors->first('staffs') }}</span>
                @endif
            </div>
        @endif
        <div class="mb-3">
            <label for="category"
                class="form-label">{{ localize('Category') }}
                <span class="text-danger ms-1">*</span></label>
            <select class="form-select select2" id="category" name="category"
                required>
                <option value="">
                    {{ localize('Select Category') }}
                </option>
                @foreach ($categories as $category) 
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="priority"
                class="form-label">{{ localize('Priority') }}
                <span class="text-danger ms-1">*</span></label>
            <select class="form-select select2" id="priority" name="priority"
                required>
                <option value="">
                    {{ localize('Select Priority') }}
                </option>
                @foreach ($priorities as $priority) 
                    <option value="{{$priority->id}}">{{ $priority->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">{{ localize('Attach File') }}
                <span class="text-danger ms-1"></span></label>


            <div class="file-drop-area file-upload text-center rounded-3">
                <input type="file" multiple class="file-drop-input" name="files[]" id="json" />
                <div class="file-drop-icon ci-cloud-upload">
                    <i data-feather="image"></i>
                </div>
                <p class="text-dark fw-bold mb-2 mt-3">
                    {{ localize('Drop your files here or') }}
                    <a href="javascript::void(0);"
                        class="text-primary">{{ localize('Browse') }}</a>
                </p>
                <p class="mb-0 file-name text-muted">
                 
                    <small>* {{ localize('Allowed file types: ') }} </small>
                   

                </p>
            </div>
            @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span>
            @endif
        </div>
    
    </div>
</div>