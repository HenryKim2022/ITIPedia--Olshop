@extends('support::layouts.master')
@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('View Ticket') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="#">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('View Ticket') }}</li>
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
                <div class="col-xl-12 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('support.ticket.store') }}" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <!--left form data-->
                                @include('support::ticket.inc.left_form') 
                                <!--end left form data-->
                            </div>
                            <div class="col-xl-6 order-1 order-md-1 order-lg-1 order-xl-2">
                                @include('support::ticket.inc.editor')                          
                            </div>
                        </div>
                       


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> {{ localize('Save Ticket') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection