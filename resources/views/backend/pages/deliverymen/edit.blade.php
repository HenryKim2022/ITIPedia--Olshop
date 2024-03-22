@extends('backend.layouts.master')

@section('title')
    {{ localize('Update Deliveryman') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0">{{ localize('Update Deliveryman') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('admin.deliverymen.update', $user->id) }}" method="POST" class="pb-650">
                        @csrf

                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ localize('Name') }}</label>
                                    <input class="form-control" type="text" id="name"
                                        placeholder="{{ localize('Type name') }}" name="name" required
                                        value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>


                                <div class="mb-4">
                                    <label for="email" class="form-label">{{ localize('Email') }}</label>
                                    <input class="form-control" type="email" id="email"
                                        placeholder="{{ localize('Type email') }}" name="email" required
                                        value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>


                                <div class="mb-4">
                                    <label for="phone" class="form-label">{{ localize('Phone') }}</label>
                                    <input class="form-control" type="text" id="phone"
                                        placeholder="{{ localize('Type phone') }}" name="phone"
                                        value="{{ $user->phone }}">

                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <label for="location_id" class="form-label">{{ localize('Select Location') }}</label>
                                    <select class="form-select select2" name="location_id">
                                        <option value="">{{ localize('Select location') }}</option>
                                        @foreach (\App\Models\Location::where('is_published', 1)->get() as $key => $location)
                                            <option value="{{ $location->id }}"
                                                @if ($user->location_id == $location->id) selected @endif>
                                                {{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                @if (getSetting('delivery_boy_payment_type') == 'salary')
                                    <div class="mb-4">
                                        <label for="salary" class="form-label">{{ localize('Salary') }}</label>
                                        <input type="number" step="any" name="salary" class="form-control"
                                            placeholder="{{ localize('Deliveryman Salary') }}" id="salary"
                                            value="{{ $user->salary }}">

                                        @if ($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>
                                @endif


                                <div class="mb-4">
                                    <label for="address" class="form-label">{{ localize('Address') }}<span
                                            class="text-danger ms-1">*</span></label>
                                    <textarea class="form-control" type="address" id="address" placeholder="{{ localize('Type address') }}"
                                        name="address" rows="4">{{ $user->address }}</textarea>

                                        @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>


                                <div class="mb-4">
                                    <label for="password" class="form-label">{{ localize('Password') }}</label>
                                    <input class="form-control" type="password" id="password"
                                        placeholder="{{ localize('Type password') }}" name="password">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Avatar') }} </label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Avatar Image') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image" value="{{ $user->avatar }}">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Save Changes') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Deliveryman Information') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Basic Information') }}</a>
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
