@extends('frontend.default.layouts.master')

@section('title')
    {{ localize('Home') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <!--hero section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.hero')
    <!--hero section end-->

    <!--category section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.category')
    <!--category section end-->

    <!--aboutUs section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.aboutUs')
    <!--aboutUs section end-->

    <!--popularProducts section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.popularProducts')
    <!--popularProducts section end-->

    <!--whyChooseUs section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.whyChooseUs')
    <!--whyChooseUs section end-->

    <!--feedback section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.feedback')
    <!--feedback section end-->

    <!--saleProducts section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.saleProducts')
    <!--saleProducts section end-->

    <!--blog section start-->
    @include('frontend.' . getTheme() . '.pages.partials.home.blogs', ['blogs' => $blogs])
    <!--blog section end-->
@endsection

@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready
        $(document).ready(function() {
            @if (\App\Models\Location::where('is_published', 1)->count() <=1)
                notifyMe('info', '{{ localize('Select your location if not selected') }}');
            @endif
        });
    </script>
@endsection
