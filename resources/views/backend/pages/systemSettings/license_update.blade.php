@extends('backend.layouts.master')

@section('title')
    {{ localize('Purchase Code') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('Purchase Code') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('Purchase Code') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                   
                    <form action="{{ route('admin.settings.license.store') }}" class="pb-650" method="POST">
                        @csrf
                        <!-- tag info start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Write here Writebot Purchase Code') }}</h5>
                    
                                <div class="mb-4">
                                    <label for="purchase_code" class="form-label">{{ localize('Purchase Code') }} <x-required-star/></label>
                                    <input class="form-control" type="text" id="purchase_code" name="purchase_code"
                                        placeholder="" value="{{ old('purchase_code') }}" required>
                                    <x-error :name="'purchase_code'"/>
                                </div>
                            </div>
                        </div>
                        <!-- tag info end-->
                    
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

            </div>
        </div>
    </section>
@endsection
