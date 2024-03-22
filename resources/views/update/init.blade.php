@extends('layouts.setup')
@section('contents')
    <div class="container h-100 d-flex flex-column justify-content-center">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="h3">Update System - v4.2.0</h1>
                        <p class="mb-0">Please be careful of the following before proceeding.</p>
                    </div>
                    <div class="card-body pb-4">

                        <ul class="list-group list-group-flush">

                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>Php version 8.1</span>

                                @php
                                    $phpVersion = number_format((float) phpversion(), 2, '.', '');
                                @endphp
                                @if ($phpVersion >= 8.1)
                                    <i class="las la-check-circle fs-4 text-primary"></i>
                                @else
                                    <i class="las la-times-circle text-danger fs-4"></i>
                                @endif
                            </li>
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>Curl Enabled</span>

                                @php
                                    $phpVersion = number_format((float) phpversion(), 2, '.', '');
                                @endphp
                                @if ($permission['curl_enabled'])
                                    <i class="las la-check-circle fs-4 text-primary"></i>
                                @else
                                    <i class="las la-times-circle text-danger fs-4"></i>
                                @endif
                            </li>

                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>Mysqli Enabled</span>

                                @php
                                    $phpVersion = number_format((float) phpversion(), 2, '.', '');
                                @endphp
                                @if ($permission['mysqli_enable'])
                                    <i class="las la-check-circle fs-4 text-primary"></i>
                                @else
                                    <i class="las la-times-circle text-danger fs-4"></i>
                                @endif
                            </li>


                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span><b>.env</b> File Permission</span>

                                @php
                                    $phpVersion = number_format((float) phpversion(), 2, '.', '');
                                @endphp
                                @if ($permission['db_file_write_perm'])
                                    <i class="las la-check-circle fs-4 text-primary"></i>
                                @else
                                    <i class="las la-times-circle text-danger fs-4"></i>
                                @endif
                            </li>

                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span> <b>RouteServiceProvider.php</b> File Permission</span>

                                @php
                                    $phpVersion = number_format((float) phpversion(), 2, '.', '');
                                @endphp
                                @if ($permission['routes_file_write_perm'])
                                    <i class="las la-check-circle fs-4 text-primary"></i>
                                @else
                                    <i class="las la-times-circle text-danger fs-4"></i>
                                @endif
                            </li>
                        </ul>


                        <ol class="list-group list-group-flush">
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">
                                <span>You must take backup of from your server (files & database)</span>

                            </li>
                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0">

                                <span>Make sure you have stable internet connection</span>
                            </li>

                            <li
                                class="list-group-item text-semibold d-flex align-items-center justify-content-between py-2 px-0 text-danger">

                                <span>Do not close the tab while the process is running.</span>
                            </li>
                        </ol>
                        <br>

                        @if ($permission['curl_enabled'] == 1 &&
                                    $permission['db_file_write_perm'] == 1 &&
                                    $permission['routes_file_write_perm'] == 1 &&
                                    $phpVersion >= 8.1)
                        <a href="{{ route('update.complete') }}" class="btn btn-primary">
                            Update Now <i class="las la-arrow-right"></i>
                        @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
