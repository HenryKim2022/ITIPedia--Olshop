@extends('backend.layouts.master')

@section('title')
    {{ localize('File Permission') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection
{{-- changes --}}
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
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('admin.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    
                                    <li class="breadcrumb-item">{{ localize('File Permission To Edit') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">
                                <a href="{{ route('system.healthCheck') }}"
                                    class="btn btn-warning">{{ localize('Re-Check') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row g-4">
                <div class="col-12">
                    <div class="accordion" id="accordionFaq">
                        @isset($versionLists)
                            @php
                                $notWritePerission = [];
                            @endphp
                            @foreach ($versionLists  as $key => $detail)
                       
                            @php
                                $status = isGreater(currentVersion(), $key, true) ?? true;
                            @endphp
                                <div class="card accordion-item border {{ $status == false ? ' border-success':'border-warning'}} {{ $status == true ? 'active' : '' }}">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#accordionFaq_{{ $key }}"
                                            aria-expanded="{{ $loop->iteration == 1 ? 'true' : 'false' }}"
                                            aria-controls="accordionFaq_{{ $key }}">
                                            {{ $key }} 
                                        </button>
                                    </h2>

                                    <div id="accordionFaq_{{ $key }}"
                                        class="accordion-collapse collapse {{ $status == true ? 'show' : '' }}"
                                        data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <div class=" mb-4" id="section-1">
                                                
                                                <div class="">
                                                    <table class="table tt-footable table-bordered table-responsive mt-4"
                                                        data-use-parent-width="true">
                                                        <thead>
                                                            <tr>
                                                                <th class="fw-medium bg-secondary text-center fs-xs">{{ localize('S/L') }}</th>
                                                                <th class="fw-medium bg-secondary fs-xs">{{ localize('Changes File') }}</th>
                                                                <th class="fw-medium bg-secondary text-center fs-xs">{{ localize('Editable?') }}</th>
                                                                <th class="fw-medium bg-secondary fs-xs"><a href="" target="_BLANK">How to give permission? <i data-feather="info" class="icon-14 cursor-pointer"></i></a></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($detail->changed_file_list as $key => $file)
                                                                <tr>
                                                                    <td class="text-center fs-xs">
                                                                        {{ $key + 1 }}
                                                                    <td class="fs-xs">{{ $file }}</td>
                                                                    <td class="text-center fs-xs">
                                                                        @if(file_exists($file))
                                                                        <i
                                                                @if (is_writable($file) == true) data-feather="check-circle" class="icon-14 me-2 text-success" 
                                                                @else  data-feather="x-circle" class="icon-14 me-2 text-danger" @endif>
                                                                        </i>
                                                                        @else
                                                                        new file
                                                                        @endif
                                                                    </td>
                                                                    <td class="fs-xs">
                                                                        CMD: <code class="copy-code text-dark bg-secondary p-1 roundered fs-xs">sudo chmod 777 -R {{ $file }}</code> <i data-feather="copy" class="text-primary copy-code-btn icon-14 cursor-pointer"></i> <br>
                                                                        
                                                                    </td>


                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.copy-code-btn', function(){
            var msg = '{{ localize('Code copied successfully') }}';
            copyText = $(this).parent().find('.copy-code').html();
            console.log(copyText);
            navigator.clipboard.writeText(copyText);
            notifyMe('success', msg);
        });
       
    </script>
@endsection