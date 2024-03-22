@extends('backend.layouts.master')


@section('title')
    {{ localize('Languages') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Invoice Fonts') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">
                <!--left sidebar-->
                <div class="col-xl-12 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="row">
                
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--language info start-->
                            <div class="card mb-4" id="section-2">
                                <div class="card-body">
                                    <h5 class="mb-4">{{ localize('Update Invoice Fonts') }}</h5>
                                    <div class="mb-4">
                                        <label for="">{{__('Select Language Font')}}</label>
                                        <select name="language" id="" class="form-control">
                                            @foreach ($languages as $lang)
                                                <option value="{{$lang->code}}" {{env('INVOICE_LANG') == $lang->code ? 'selected' : ''}}>{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--language info end-->

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-primary" type="submit">
                                            <i data-feather="save" class="me-1"></i> {{ localize('Update Invoice Font') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
