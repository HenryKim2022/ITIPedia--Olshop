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
                                <h2 class="h5 mb-lg-0">{{ localize('Feature Widgets') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="halal_about_us_feature_one_title"
                                        class="form-label">{{ localize('Feature 1 Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_one_title">
                                    <input type="text" name="halal_about_us_feature_one_title"
                                        id="halal_about_us_feature_one_title" placeholder="{{ localize('Type title') }}"
                                        class="form-control" value="{{ getSetting('halal_about_us_feature_one_title') }}"
                                        required>
                                </div>


                                <div class="mb-4">
                                    <label for="halal_about_us_feature_one_text"
                                        class="form-label">{{ localize('Feature 1 Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_one_text">
                                    <input type="text" name="halal_about_us_feature_one_text"
                                        id="halal_about_us_feature_one_text" placeholder="{{ localize('Type text') }}"
                                        class="form-control" value="{{ getSetting('halal_about_us_feature_one_text') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Feature 1 Icon') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_one_icon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Icon') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="halal_about_us_feature_one_icon"
                                                    value="{{ getSetting('halal_about_us_feature_one_icon') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="halal_about_us_feature_two_title"
                                        class="form-label">{{ localize('Feature 2 Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_two_title">
                                    <input type="text" name="halal_about_us_feature_two_title"
                                        id="halal_about_us_feature_two_title" placeholder="{{ localize('Type title') }}"
                                        class="form-control" value="{{ getSetting('halal_about_us_feature_two_title') }}"
                                        required>
                                </div>


                                <div class="mb-4">
                                    <label for="halal_about_us_feature_two_text"
                                        class="form-label">{{ localize('Feature 2 Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_two_text">
                                    <input type="text" name="halal_about_us_feature_two_text"
                                        id="halal_about_us_feature_two_text" placeholder="{{ localize('Type text') }}"
                                        class="form-control" value="{{ getSetting('halal_about_us_feature_two_text') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Feature 2 Icon') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_two_icon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Icon') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="halal_about_us_feature_two_icon"
                                                    value="{{ getSetting('halal_about_us_feature_two_icon') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="halal_about_us_feature_three_title"
                                        class="form-label">{{ localize('Feature 3 Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_three_title">
                                    <input type="text" name="halal_about_us_feature_three_title"
                                        id="halal_about_us_feature_three_title"
                                        placeholder="{{ localize('Type title') }}" class="form-control"
                                        value="{{ getSetting('halal_about_us_feature_three_title') }}" required>
                                </div>


                                <div class="mb-4">
                                    <label for="halal_about_us_feature_three_text"
                                        class="form-label">{{ localize('Feature 3 Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_three_text">
                                    <input type="text" name="halal_about_us_feature_three_text"
                                        id="halal_about_us_feature_three_text" placeholder="{{ localize('Type text') }}"
                                        class="form-control"
                                        value="{{ getSetting('halal_about_us_feature_three_text') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Feature 3 Icon') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_three_icon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Icon') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="halal_about_us_feature_three_icon"
                                                    value="{{ getSetting('halal_about_us_feature_three_icon') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="halal_about_us_feature_four_title"
                                        class="form-label">{{ localize('Feature 4 Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_four_title">
                                    <input type="text" name="halal_about_us_feature_four_title"
                                        id="halal_about_us_feature_four_title" placeholder="{{ localize('Type title') }}"
                                        class="form-control"
                                        value="{{ getSetting('halal_about_us_feature_four_title') }}" required>
                                </div>


                                <div class="mb-4">
                                    <label for="halal_about_us_feature_four_text"
                                        class="form-label">{{ localize('Feature 4 Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_four_text">
                                    <input type="text" name="halal_about_us_feature_four_text"
                                        id="halal_about_us_feature_four_text" placeholder="{{ localize('Type text') }}"
                                        class="form-control" value="{{ getSetting('halal_about_us_feature_four_text') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Feature 4 Icon') }}</label>
                                    <input type="hidden" name="types[]" value="halal_about_us_feature_four_icon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Icon') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="halal_about_us_feature_four_icon"
                                                    value="{{ getSetting('halal_about_us_feature_four_icon') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
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
        });
    </script>
@endsection
