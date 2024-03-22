@extends('backend.layouts.master')

@section('title')
    {{ localize('Website Header Configuration') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Website Header Configuration') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        @csrf

                        <!--Topbar-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Topbar Information') }}</h5>

                                <div class="mb-3">
                                    <label for="topbar_welcome_text"
                                        class="form-label">{{ localize('Welcome Text') }}</label>
                                    <input type="hidden" name="types[]" value="topbar_welcome_text">
                                    <input type="text" name="topbar_welcome_text" id="topbar_welcome_text"
                                        class="form-control" placeholder="{{ localize('Welcome to our organic store') }}"
                                        value="{{ getSetting('topbar_welcome_text') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="topbar_email" class="form-label">{{ localize('Topbar Email') }}</label>
                                    <input type="hidden" name="types[]" value="topbar_email">
                                    <input type="email" name="topbar_email" id="topbar_email" class="form-control"
                                        placeholder="{{ localize('grostore@support.com') }}"
                                        value="{{ getSetting('topbar_email') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="topbar_location"
                                        class="form-label">{{ localize('Topbar Location') }}</label>
                                    <input type="hidden" name="types[]" value="topbar_location">
                                    <input type="text" name="topbar_location" id="topbar_location" class="form-control"
                                        placeholder="{{ localize('Washington, New York, USA - 254230') }}"
                                        value="{{ getSetting('topbar_location') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="facebook_link" class="form-label">{{ localize('Facebook Link') }}</label>
                                    <input type="hidden" name="types[]" value="facebook_link">
                                    <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                        placeholder="https://facebook.com/example"
                                        value="{{ getSetting('facebook_link') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="twitter_link" class="form-label">{{ localize('Twitter Link') }}</label>
                                    <input type="hidden" name="types[]" value="twitter_link">
                                    <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                        placeholder="https://twitter.com/example" value="{{ getSetting('twitter_link') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="linkedin_link" class="form-label">{{ localize('LinkedIn Link') }}</label>
                                    <input type="hidden" name="types[]" value="linkedin_link">
                                    <input type="url" name="linkedin_link" id="linkedin_link" class="form-control"
                                        placeholder="https://linkedin.com/example"
                                        value="{{ getSetting('linkedin_link') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">{{ localize('Youtube Link') }}</label>
                                    <input type="hidden" name="types[]" value="youtube_link">
                                    <input type="url" name="youtube_link" id="youtube_link" class="form-control"
                                        placeholder="https://youtube.com/example"
                                        value="{{ getSetting('youtube_link') }}">
                                </div>


                                <div class="mb-3">
                                    <label for="about_us" class="form-label">{{ localize('About Us') }}</label>
                                    <input type="hidden" name="types[]" value="about_us">
                                    <textarea name="about_us" id="about_us" class="form-control">{{ getSetting('about_us') }}</textarea>
                                </div>

                            </div>
                        </div>


                        <!--Navbar-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Navbar Information') }}</h5>

                                <div class="mb-3">
                                    <label class="form-label">{{ localize('Navbar Logo') }}</label>
                                    <input type="hidden" name="types[]" value="navbar_logo">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Navbar Logo') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="navbar_logo"
                                                    value="{{ getSetting('navbar_logo') }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label">{{ localize('Categories') }}</label>

                                        <input type="hidden" name="types[]" value="show_navbar_categories">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label fw-medium text-primary"
                                                for="show_navbar_categories">{{ localize('Show Categories?') }}</label>
                                            <input type="checkbox" class="form-check-input" id="show_navbar_categories"
                                                name="show_navbar_categories"
                                                @if (getSetting('show_navbar_categories') == 1) checked @endif>
                                        </div>
                                    </div>

                                    <input type="hidden" name="types[]" value="navbar_categories">

                                    @php
                                        $navbar_categories = getSetting('navbar_categories') != null ? json_decode(getSetting('navbar_categories')) : [];
                                    @endphp
                                    <select class="form-control select2" name="navbar_categories[]" class="w-100"
                                        data-toggle="select2" data-placeholder="{{ localize('Select categories') }}"
                                        multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (in_array($category->id, $navbar_categories)) selected @endif>
                                                {{ $category->collectLocalization('name') }}</option>
                                            @foreach ($category->childrenCategories as $childCategory)
                                                @include('backend.pages.products.categories.subCategory', [
                                                    'subCategory' => $childCategory,
                                                    'navbar_categories' => $navbar_categories,
                                                ])
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-3 mt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label">{{ localize('Active Themes') }}</label>

                                        <input type="hidden" name="types[]" value="show_theme_changes">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label fw-medium text-primary"
                                                for="show_theme_changes">{{ localize('Show Theme Changes?') }}</label>
                                            <input type="checkbox" class="form-check-input" id="show_theme_changes"
                                                name="show_theme_changes" @if (getSetting('show_theme_changes') == 1) checked @endif>
                                        </div>
                                    </div>

                                    <input type="hidden" name="types[]" value="active_themes">
                                    @php
                                        $active_themes = getSetting('active_themes') != null ? json_decode(getSetting('active_themes')) : [1];
                                    @endphp
                                    <select class="form-control select2" name="active_themes[]" class="w-100"
                                        data-toggle="select2" data-placeholder="{{ localize('Select themes') }}" multiple
                                        required>
                                        @foreach ($themes as $theme)
                                            <option value="{{ $theme->id }}"
                                                @if (in_array($theme->id, $active_themes)) selected @endif>
                                                {{ localize($theme->name) }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-3">

                                    <input type="hidden" name="types[]" value="header_menu_labels">
                                    <input type="hidden" name="types[]" value="header_menu_links">

                                    <label for="navbar_contact_number"
                                        class="form-label">{{ localize('Header Nav Menu') }}</label>

                                    <div class="header-menu-list">
                                        @php
                                            $labels = json_decode(getSetting('header_menu_labels')) ?? [];
                                            $menus = json_decode(getSetting('header_menu_links')) ?? [];
                                        @endphp
                                        @foreach ($menus as $menuKey => $menuItem)
                                            <div
                                                class="d-flex justify-content-between align-items-center each-menu-list mt-2">
                                                <input type="text" name="header_menu_labels[]"
                                                    class="form-control w-50 w-lg-25"
                                                    placeholder="{{ localize('Menu label') }}"
                                                    value="{{ $labels[$menuKey] }}" required>
                                                <input type="url" name="header_menu_links[]"
                                                    class="form-control ms-2"
                                                    placeholder="https://grostore.themetags.com/"
                                                    value="{{ $menuItem }}" required>

                                                <button type="button" data-toggle="remove-parent"
                                                    class="btn btn-link px-2 ms-2" data-parent=".each-menu-list">
                                                    <i data-feather="trash-2" class="text-danger"></i>
                                                </button>
                                            </div>
                                        @endforeach

                                    </div>

                                    <button class="btn btn-link px-0 fw-medium fs-base" type="button"
                                        data-toggle="add-more"
                                        data-content='<div class="d-flex justify-content-between align-items-center each-menu-list mt-2">
                                            <input type="text" name="header_menu_labels[]"
                                                class="form-control w-50 w-lg-25"
                                                placeholder="{{ localize('Menu label') }}" required>
                                            <input type="url" name="header_menu_links[]" class="form-control ms-2"
                                                placeholder="https://grostore.themetags.com/" required>

                                            <button type="button" data-toggle="remove-parent"
                                                class="btn btn-link px-2 ms-2" data-parent=".each-menu-list">
                                                <i data-feather="trash-2" class="text-danger"></i>
                                            </button>
                                        </div>'
                                        data-target=".header-menu-list">
                                        <i data-feather="plus" class="me-1"></i>
                                        {{ localize('Add New') }}
                                    </button>

                                </div>



                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label">{{ localize('Pages') }}</label>

                                        <input type="hidden" name="types[]" value="show_navbar_pages">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label fw-medium text-primary"
                                                for="show_navbar_pages">{{ localize('Show Pages?') }}</label>
                                            <input type="checkbox" class="form-check-input" id="show_navbar_pages"
                                                name="show_navbar_pages" @if (getSetting('show_navbar_pages') == 1) checked @endif>
                                        </div>
                                    </div>

                                    @php
                                        $navbar_pages = getSetting('navbar_pages') != null ? json_decode(getSetting('navbar_pages')) : [];
                                    @endphp
                                    <input type="hidden" name="types[]" value="navbar_pages">
                                    <select class="form-control select2" name="navbar_pages[]" class="w-100"
                                        data-toggle="select2" data-placeholder="{{ localize('Select pages') }}" multiple>
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}"
                                                @if (in_array($page->id, $navbar_pages)) selected @endif>
                                                {{ $page->collectLocalization('title') }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="navbar_contact_number"
                                        class="form-label">{{ localize('Contact Number') }}</label>
                                    <input type="hidden" name="types[]" value="navbar_contact_number">
                                    <input type="text" name="navbar_contact_number" id="navbar_contact_number"
                                        class="form-control" placeholder="+80 157 058 4567"
                                        value="{{ getSetting('navbar_contact_number') }}">
                                </div>

                            </div>
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Header Configuration') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Topbar Information') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">{{ localize('Navbar Information') }}</a>
                                    </li>
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
