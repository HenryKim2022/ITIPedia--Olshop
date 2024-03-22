@extends('backend.layouts.master')

@section('title')
    {{ localize('Website Homepage Configuration') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('News & Blogs') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data"
                        class="halal-popular-blogs-form">
                        @csrf
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="mb-4">
                                    <label for="halal_blogs_title" class="form-label">{{ localize('Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_blogs_title">
                                    <input type="text" name="halal_blogs_title" id="halal_blogs_title"
                                        placeholder="{{ localize('Type title') }}" class="form-control"
                                        value="{{ getSetting('halal_blogs_title') }}" required>
                                    <small>*{{ localize('Add your text in {_text here_} to make it colorful') }}</small>
                                </div>


                                <div class="mb-3">
                                    <label for="halal_blog_text" class="form-label">{{ localize('Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_blog_text">
                                    <input type="text" name="halal_blog_text" id="halal_blog_text"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_blog_text') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_blogs_link_text"
                                        class="form-label">{{ localize('Link Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_blogs_link_text">
                                    <input type="text" name="halal_blogs_link_text" id="halal_blogs_link_text"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_blogs_link_text') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_blogs_link" class="form-label">{{ localize('Link') }}</label>
                                    <input type="hidden" name="types[]" value="halal_blogs_link">
                                    <input type="url" name="halal_blogs_link" id="halal_blogs_link"
                                        placeholder="{{ env('APP_URL') . '/example' }}" class="form-control"
                                        value="{{ getSetting('halal_blogs_link') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Blogs') }}</label>
                                    <input type="hidden" name="types[]" value="halal_blogs">
                                    @php
                                        $blogIds = getSetting('halal_blogs') != null ? json_decode(getSetting('halal_blogs')) : [];
                                    @endphp
                                    <select class="select2 form-control halal_blogs" multiple="multiple"
                                        data-placeholder="{{ localize('Select blogs') }}" name="halal_blogs[]" required>
                                        @foreach ($blogs as $blog)
                                            <option value="{{ $blog->id }}"
                                                @if (in_array($blog->id, $blogIds)) selected @endif>
                                                {{ $blog->collectLocalization('title') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--slider info end-->


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Homepage Configuration') }}</h5>
                            <div class="tt-vertical-step-link">
                                <ul class="list-unstyled">
                                    @include('backend.pages.appearance.halal.homepage.inc.rightSidebar')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
            getblogs();
        });
    </script>
@endsection
