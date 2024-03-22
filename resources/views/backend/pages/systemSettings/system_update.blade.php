@extends('backend.layouts.master')

@section('title')
    {{ localize('Update System') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    @php
        $currentVersion = currentVersion();
    @endphp
    <section class="tt-section pt-4">
        <div class="container">

            <div class="row mb-3">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('Update System') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('Update System') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-9">
                    <div class="alert alert-warning" role="alert">
                        <h5 class="alert-heading">Be Aware!! Before Update</h5>
                        <ol class="mb-0 ps-3">
                            <li>Please make that you have backup from your server's <strong>files</strong> and
                                <strong>database</strong>
                                before applying the update. Otherwies, we may lose your files if you have custom changes.
                            </li>
                            <li>Make sure you have <strong>write permission</strong> on your files and folder. To check the
                                files permission,
                                click on
                                <a href="{{ route('system.file-permission') }}" target="_blank"
                                    class="btn btn-dark btn-sm px-2 py-1">File Permission Check</a>
                            </li>
                            <li>Make sure you have stable internet connection</li>
                            <li>Do not close the tab while the process is running.</li>
                        </ol>
                    </div>

                </div>
            </div>

            <!-- one click update start -->
            <div class="row mb-5">
                <div class="col-9">
                    <h5>{{ localize('Update Your Application') }}</h5>
                    <div class="card border-0 shadow-sm mt-3">
                        <div class="card-header pb-0 pt-1 bg-light">
                            <ul class="nav nav-line-tab fw-semibold" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="#result4"
                                        data-bs-toggle="tab" role="tab" aria-controls="result4"
                                        aria-selected="true">{{ localize('One Click Update') }}</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="#html4"
                                        data-bs-toggle="tab" role="tab" aria-controls="html4" aria-selected="false"
                                        tabindex="-1">{{ localize('Manual Update') }} <small><span
                                                class="text-danger">*</span>{{ localize('Update File (Zip)') }}</small></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body px-lg-8 py-5">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="result4" role="tabpanel">
                                    <div class="d-flex justify-content-left">

                                        <div
                                            class="tt-version tt-your-version py-5 px-9 bg-secondary-subtle rounded d-flex flex-column border border-secondary me-5">
                                            <h6>{{ localize('Your Version') }}</h6>
                                            <div class="h2 fw-bold">v{{ currentVersion() }}</div>
                                            <div class="fs-md">{{ getSetting('last_update') }}</div>
                                        </div>
                                        <div
                                            class="tt-version tt-latest-version py-5 px-9 bg-secondary-subtle rounded d-flex flex-column border border-secondary">
                                            <h6>{{ localize('Latest Version') }}</h6>
                                            <div class="h2 fw-bold text-success"> 
                                                <div class="w-100 d-flex h-100 align-items-center justify-content-center messages-container-loader">
                                                    <div class="tt-text-preloader">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    <span id="latestVersion" class="me-2"></span>                                              
                                                 
                                                </div>
                                                
                                               </div>
                                            <div class="fs-md"> <a href="{{ route('system.file-permission') }}"
                                                    class="fw-medium">{{ localize('View Changelog') }}</a></div>
                                        </div>
                                    </div>
                                    <form action="{{ route('system.update') }}" method="GET">
                                        @if($is_purchase==false)
                                            @include('backend.pages.systemSettings.inc.license_admin', ['submit'=>false])
                                        @endif

                                        <div class="d-flex align-items-center justify-content-left mt-5">
                                            <button  class="btn btn-primary me-2 disabled" type="submit"
                                                id="update_now">{{ localize('Update Now') }}</button>
                                            <a href="{{ route('system.file-permission') }}" target="blank"
                                                class="btn btn-secondary me-2">{{ localize('Check Compatibility') }}</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="html4" role="tabpanel">
                                    {{-- <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="alert alert-warning alert-dismissible fade show mb-3"
                                                role="alert">
                                            
                                                <a href="https://admin.themetags.com/documentation/#update-version"
                                                    target="_blank">{{ localize('here') }}</a>.
                                            </div>
                                        </div>
                                    </div> --}}
                                    <form action="{{ route('admin.system.update-version') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="" id="section-2">
                                            <div class="mb-3">
                                                <label for="default_creativity"
                                                    class="form-label">{{ localize('Update File (Zip)') }}
                                                    <span class="text-danger ms-1">*</span></label>


                                                <div class="file-drop-area file-upload text-center rounded-3">
                                                    <input type="file" class="file-drop-input" name="updateFile"
                                                        id="json" />
                                                    <div class="file-drop-icon ci-cloud-upload">
                                                        <i data-feather="image"></i>
                                                    </div>
                                                    <p class="text-dark fw-bold mb-2 mt-3">
                                                        {{ localize('Drop your files here or') }}
                                                        <a href="javascript::void(0);"
                                                            class="text-primary">{{ localize('Browse') }}</a>
                                                    </p>
                                                    <p class="mb-0 file-name text-muted">

                                                        <small>* {{ localize('Allowed file types: ') }} .zip
                                                        </small>


                                                    </p>
                                                </div>
                                                @if ($errors->has('file'))
                                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                                @endif
                                            </div>
                                            @if($is_purchase == false)
                                                @include('backend.pages.systemSettings.inc.license_admin', ['submit'=>false])
                                            @endif
                                            <div class="d-flex align-items-center mt-4">
                                                <button class="btn btn-primary"
                                                    type="submit">{{ localize('Update Now') }}</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- one click update end -->

        </div>
    </section>
@endsection
@section('scripts')
    <script>
        "use strict";
        $(document).ready(function() {
            healthCheck();   
            $(document).on('click', '#refresh', function() {
                healthCheck();
            })          

            function healthCheck() {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    url: '{{ route('system.heath-check') }}',                  
                    success: function(data) {
                        if(data.status == true) {
                            $('#latestVersion').html(data.version);
                            $('#update_now').removeClass("disabled");
                            $('.tt-text-preloader').addClass('d-none');
                        }
                    },
                    error: function(data) {

                    }

                })
            }

        })
    </script>
    <script>
        "use strict";
        $(document).ready(function() {
 
            $(document).on('click', '#licesne_submit', function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    url: '{{ route('admin.settings.license.store') }}',                  
                    success: function(data) {
                        if(data.status == true) {
                            $('#license_div').addClass('d-none');                          
                        }
                    },
                    error: function(data) {

                    }

                })
            })          

            function healthCheck() {

                
            }

        })
    </script>
@endsection
