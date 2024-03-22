<div class="gstore-breadcrumb position-relative z-1 overflow-hidden mt--50 pt-15 pb-2">
    @include('frontend.default.inc.breadcrumbBgImages.' . getTheme())
    <div class="container">
        <div class="row">
            <div class="col-12">
                @yield('breadcrumb-contents')
            </div>
        </div>
    </div>
</div>
