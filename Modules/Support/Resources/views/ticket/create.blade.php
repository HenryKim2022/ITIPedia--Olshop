@extends('frontend.default.layouts.master')
@section('title')
    {{ localize('Create Ticket') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
@section('contents')
    <section class="my-account pt-6 pb-120">
        <div class="container">

            @include('frontend.default.pages.users.partials.customerHero')

            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.default.pages.users.partials.customerSidebar')
                </div>

                <div class="col-xl-9">
               
                    <div class="update-profile bg-white py-5 px-4">
                        <form action="{{ route('support.ticket.store') }}" method="POST" enctype="multipart/form-data"
                            class="profile-form">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ localize('Title') }}<span
                                        class="text-danger ms-1">*</span></label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}"
                                    class="theme-input">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">{{ localize('Category') }}
                                    <span class="text-danger ms-1">*</span></label>
                                <select class="theme-input select2" id="category" name="category" required>
                                    <option value="">
                                        {{ localize('Select Category') }}
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="text-danger">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="priority" class="form-label">{{ localize('Priority') }}
                                    <span class="text-danger ms-1">*</span></label>
                                <select class="theme-input select2" id="priority" name="priority" required>
                                    <option value="">
                                        {{ localize('Select Priority') }}
                                    </option>
                                    @foreach ($priorities as $priority)
                                        <option value="{{ $priority->id }}"
                                            {{ old('priority') == $priority->id ? 'selected' : '' }}>
                                            {{ $priority->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('priority'))
                                    <span class="text-danger">{{ $errors->first('priority') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <textarea class="editor" name="description">{{ old('description') }} </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>


                            <div class="file-upload text-center rounded-3 mb-5">
                                <input type="file" name="files">
                                <img src="{{ staticAsset('frontend/default/assets/img/icons/image.svg') }}"
                                    alt="dp" class="img-fluid">
                                <p class="text-dark fw-bold mb-2 mt-3">{{ localize('Drop your files here or browse') }}
                                    <small>* (Only .jpg, .png, will be accepted) </small>
                                </p>
                                <p class="mb-0 file-name"></p>
                            </div>

                            <button class="btn btn-primary btn-create-content" type="submit">
                                <span class="me-2">{{ localize('Post a Ticket') }}</span>
                            </button>
                        </form>
                    </div>
                
                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{ staticAsset('backend/assets/js/vendors/summernote-lite.min.js') }}"></script>
    <script>
        // summernote
        $(".editor").each(function(el) {
            var $this = $(this);
            var buttons = $this.data("buttons");
            var minHeight = $this.data("min-height");
            var placeholder = $this.attr("placeholder");
            var format = $this.data("format");

            buttons = !buttons ? [
                    ["font", ["bold", "underline", "italic", "clear"]],
                    ['fontname', ['fontname']],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["style", ["style"]],
                    ['fontsize', ['fontsize']],
                    ["color", ["color"]],
                    ["insert", ["link", "picture", "video"]],
                    ["view", ["undo", "redo"]],
                ] :
                buttons;
            placeholder = !placeholder ? "" : placeholder;
            minHeight = !minHeight ? 150 : minHeight;
            format = typeof format == "undefined" ? false : format;

            $this.summernote({
                toolbar: buttons,
                placeholder: placeholder,
                height: minHeight,
                codeviewFilter: false,
                codeviewIframeFilter: true,
                disableDragAndDrop: true,
                callbacks: {

                },
            });

            var nativeHtmlBuilderFunc = $this.summernote(
                "module",
                "videoDialog"
            ).createVideoNode;

            $this.summernote("module", "videoDialog").createVideoNode = function(url) {
                var wrap = $(
                    '<div class="embed-responsive embed-responsive-16by9"></div>'
                );
                var html = nativeHtmlBuilderFunc(url);
                html = $(html).addClass("embed-responsive-item");
                return wrap.append(html)[0];
            };
        });
    </script>
@endsection
