@extends('backend.layouts.master')

@section('title')
{{ localize('Add New Employee Staff') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
<section class="tt-section pt-4">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card tt-page-header">
                    <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                        <div class="tt-page-title">
                            <h2 class="h5 mb-lg-0">{{ localize('Add New Staff') }}</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4 g-4">

            <!--left sidebar-->
            <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                <form action="{{ route('admin.staffs.store') }}" method="POST" class="pb-650">
                    @csrf
                    <!--basic information start-->
                    <div class="card mb-4" id="section-1">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                            <div class="mb-4">
                                <label for="name" class="form-label">{{ localize('Staff Name') }}<span class="text-danger ms-1">*</span></label>
                                <input class="form-control" type="text" id="name" placeholder="{{ localize('Type staff name') }}" name="name" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label for="email" class="form-label">{{ localize('Staff Email') }}<span class="text-danger ms-1">*</span></label>
                                <input class="form-control" type="email" id="email" placeholder="{{ localize('Type staff email') }}" name="email" value="{{old('email')}}">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>


                            <div class="mb-4">
                                <label class="form-label">{{ localize('Staff Role') }}<span class="text-danger ms-1">*</span></label>
                                <select class="select2 form-control" data-toggle="select2" name="role_id">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">{{ localize('Staff Phone') }}<span class="text-danger ms-1">{{ @getSetting('registration_with') == 'email_and_phone' ? '*' : '' }}</span></label>
                                <input class="form-control" type="text" id="phone" placeholder="{{ localize('Type staff phone') }}" name="phone" value="{{old('phone')}}" {{ @getSetting('registration_with') == 'email_and_phone' ? 'required' : '' }}>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">{{ localize('Password') }}<span class="text-danger ms-1">*</span></label>
                                <input class="form-control" type="password" id="password" placeholder="{{ localize('Type password') }}" name="password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--basic information end-->

                    <!-- submit button -->
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <button class="btn btn-primary" type="submit">
                                    <i data-feather="save" class="me-1"></i> {{ localize('Save Staff') }}
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
                        <h5 class="mb-4">{{ localize('Staff Information') }}</h5>
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