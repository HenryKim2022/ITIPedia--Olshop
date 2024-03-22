@extends('backend.layouts.master')

@section('title')
{{ localize('File Permission') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
<section class="tt-section pt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="tt-page-header">
                    <div class="d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title mb-3 mb-lg-0">
                            <h1 class="h4 mb-lg-1">{{ localize('File Permission') }}</h1>
                            <ol class="breadcrumb breadcrumb-angle text-muted">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.settings.openAi') }}">{{ localize('Settings') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ localize('File Permission To Edit') }}</li>
                            </ol>
                        </div>
                        <div class="tt-action">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="tt-section-heading text-center mb-5">
                        <h2>{{ localize('Frequently Asked Questions') }}</h2>
                        <p>{{ localize('Everything you need to know about the product and billing.') }}</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion" id="accordionFaq">
                        @isset($versionLists)
                            @foreach ($versionLists as $detail)
                                <div class="card accordion-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#accordionFaq 1"
                                            aria-expanded="{{ $loop->iteration == 1 ? 'true' : 'false' }}"
                                            aria-controls="accordionFaq 1">
                                            {{ $faq->collectLocalization('question') }}
                                        </button>
                                    </h2>

                                    <div id="accordionFaq 1"
                                        class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                        data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach                            
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection