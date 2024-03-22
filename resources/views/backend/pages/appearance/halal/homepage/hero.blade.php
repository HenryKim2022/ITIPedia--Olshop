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
                                <h2 class="h5 mb-lg-0">{{ localize('Hero Section Configuration') }}</h2>
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
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="halal_hero_sub_title" class="form-label">{{ localize('Sub Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_sub_title">
                                    <input type="text" name="halal_hero_sub_title" id="halal_hero_sub_title"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_sub_title') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_title" class="form-label">{{ localize('Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_title">
                                    <input type="text" name="halal_hero_title" id="halal_hero_title"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_title') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_text" class="form-label">{{ localize('Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_text">
                                    <input type="text" name="halal_hero_text" id="halal_hero_text"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_text') }}" required>
                                </div>


                                <div class="mb-3">
                                    <label for="halal_hero_link_text"
                                        class="form-label">{{ localize('Link Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_link_text">
                                    <input type="text" name="halal_hero_link_text" id="halal_hero_link_text"
                                        placeholder="{{ localize('Type text') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_link_text') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_link" class="form-label">{{ localize('Link') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_link">
                                    <input type="url" name="halal_hero_link" id="halal_hero_link"
                                        placeholder="{{ env('APP_URL') . '/example' }}" class="form-control"
                                        value="{{ getSetting('halal_hero_link') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Banner Image') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_img">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Banner Image') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="halal_hero_img"
                                                    value="{{ getSetting('halal_hero_img') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="halal_hero_counter_one"
                                        class="form-label">{{ localize('Counter One') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_counter_one">
                                    <input type="text" name="halal_hero_counter_one" id="halal_hero_counter_one"
                                        placeholder="345+" class="form-control"
                                        value="{{ getSetting('halal_hero_counter_one') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_counter_one_text"
                                        class="form-label">{{ localize('Counter One Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_counter_one_text">
                                    <input type="text" name="halal_hero_counter_one_text"
                                        id="halal_hero_counter_one_text"
                                        placeholder="{{ localize('Tons of Meat Every Month') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_counter_one_text') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_counter_two"
                                        class="form-label">{{ localize('Counter Two') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_counter_two">
                                    <input type="text" name="halal_hero_counter_two" id="halal_hero_counter_two"
                                        placeholder="345+" class="form-control"
                                        value="{{ getSetting('halal_hero_counter_two') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="halal_hero_counter_two_text"
                                        class="form-label">{{ localize('Counter Two Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_hero_counter_two_text">
                                    <input type="text" name="halal_hero_counter_two_text"
                                        id="halal_hero_counter_two_text"
                                        placeholder="{{ localize('Tons of Meat Every Month') }}" class="form-control"
                                        value="{{ getSetting('halal_hero_counter_two_text') }}" required>
                                </div>

                            </div>
                        </div>
                        <!--slider info end-->


                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Save Changes') }}
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
