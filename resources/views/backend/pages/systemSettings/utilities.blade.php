@extends('backend.layouts.master')

@section('title')
    {{ localize('Utilities') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('Utilities') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('Utilities') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      <!-- utility start -->
          <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-4">
              <a href="{{route('admin.clear-cache')}}">
                <div class="tt-utility-card rounded-3 shadow-sm card border-0 h-100 flex-column">
                  <div class="card-body p-lg-5">
                    <div class="d-flex align-items-center">
                      <div class="avatar me-2 flex-shrink-0">
                        <div class="text-center rounded-circle bg-soft-success">
                          <span class="text-success tt-utility-icon"><i data-feather="rotate-cw" class="icon-16"></i></span>
                        </div>
                      </div>
    
                      <div class="flex-grow-1">
                        <h5 class="mb-0">Clear Cache</h5>
                        <span class="fs-sm"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4">
              <a href="{{route('admin.clearLog')}}">
                <div class="tt-utility-card rounded-3 shadow-sm card border-0 h-100 flex-column">
                  <div class="card-body p-lg-5">
                    <div class="d-flex align-items-center">
                      <div class="avatar me-2 flex-shrink-0">
                        <div class="text-center rounded-circle bg-soft-success">
                          <span class="text-success tt-utility-icon"><i data-feather="rotate-cw" class="icon-16"></i></span>
                        </div>
                      </div>
    
                      <div class="flex-grow-1">
                        <h5 class="mb-0">Clear Log</h5>
                        <span class="fs-sm"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4">
              <a href="{{route('admin.debug')}}">
                <div class="tt-utility-card rounded-3 shadow-sm card border-0 h-100 flex-column">
                  <div class="card-body p-lg-5">
                    <div class="d-flex align-items-center">
                      <div class="avatar me-2 flex-shrink-0">
                        <div class="text-center rounded-circle bg-soft-danger">
                          <span class="text-danger tt-utility-icon"><i data-feather="terminal" class="icon-16"></i></span>
                        </div>
                      </div>
    
                      <div class="flex-grow-1">
                        <h5 class="mb-0">Debug Mode</h5>
                        <span class="fs-sm">{{ strtoupper(env('APP_DEBUG') ? 'true' :'false') }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- utility end -->
        
           
        </div>
    </section>
@endsection
