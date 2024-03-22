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
                                <h2 class="h5 mb-lg-0">{{ localize('Popular Products') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data"
                        class="halal-popular-products-form">
                        @csrf
                        <!--slider info start-->
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="halal_popular_products_title"
                                        class="form-label">{{ localize('Title') }}</label>
                                    <input type="hidden" name="types[]" value="halal_popular_products_title">
                                    <input type="text" name="halal_popular_products_title"
                                        id="halal_popular_products_title" placeholder="{{ localize('Type title') }}"
                                        class="form-control" value="{{ getSetting('halal_popular_products_title') }}"
                                        required>
                                    <small>*{{ localize('Add your text in {_text here_} to make it colorful') }}</small>
                                </div>


                                <div class="mb-3">
                                    <label for="halal_popular_products_text"
                                        class="form-label">{{ localize('Text') }}</label>
                                    <input type="hidden" name="types[]" value="halal_popular_products_text">
                                    <input type="text" name="halal_popular_products_text"
                                        id="halal_popular_products_text" placeholder="{{ localize('Type text') }}"
                                        class="form-control" value="{{ getSetting('halal_popular_products_text') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    @php
                                        $halal_popular_product_categories = getSetting('halal_popular_product_categories') != null ? json_decode(getSetting('halal_popular_product_categories')) : [];
                                    @endphp
                                    <label class="form-label">{{ localize('Categories') }}</label>
                                    <input type="hidden" name="types[]" value="halal_popular_product_categories">
                                    <select class="select2 form-control halal_popular_product_categories"
                                        multiple="multiple" data-placeholder="{{ localize('Select categories') }}"
                                        name="halal_popular_product_categories[]" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (in_array($category->id, $halal_popular_product_categories)) selected @endif>
                                                {{ $category->collectLocalization('name') }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Popular Products') }}</label>
                                    <input type="hidden" name="types[]" value="halal_popular_products">
                                    <select class="select2 form-control halal_popular_products" multiple="multiple"
                                        data-placeholder="{{ localize('Select products') }}"
                                        name="halal_popular_products[]" required>

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
            getProducts();
        });

        //  get cities on state change
        $(document).on('change', '.halal_popular_product_categories', function() {
            getProducts();
        });

        // get top trending products
        function getProducts() {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{ route('admin.appearance.homepage.getProducts') }}',
                data: $('.halal-popular-products-form').serialize(),
                success: function(data) {
                    $('[name="city_id"]').html("");
                    $('.halal_popular_products').html(JSON.parse(data));
                }
            });
        }
    </script>
@endsection
