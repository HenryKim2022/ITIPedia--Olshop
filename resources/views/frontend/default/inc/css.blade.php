<!-- 3rd party -->
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/toastr.css') }}">
<!-- 3rd party -->
@if ($localLang->is_rtl == 1)
    <link rel="stylesheet" href="{{ staticAsset('frontend/default/assets/css/main-rtl.css') }}">
@else
    <link rel="stylesheet" href="{{ staticAsset('frontend/default/assets/css/main.css') }}">
@endif

<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/select2.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/custom.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/summernote-lite.min.css') }}">
<link rel="stylesheet" href="{{ staticAsset('frontend/common/css/summernote-custom.css') }}">

<style>
    @media (min-width: 1200px) {
        .choose-us-section::after {
            background-image: url({{ uploadedAsset(getSetting('halal_why_choose_us_large_img')) }});
        }

        .on-sale-banner {
            background-image: url({{ uploadedAsset(getSetting('halal_on_sale_banner')) }});
        }
</style>
