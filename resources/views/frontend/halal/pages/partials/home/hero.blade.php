<section class="gshop-hero meat-hero ptb-120 bg-meat-primary position-relative z-1 overflow-hidden"
    style="background: url({{ staticAsset('frontend/default/assets/img/home-5/bg-shape.png') }})no-repeat center top">
    <img src="{{ staticAsset('frontend/default/assets/img/shapes/leaf-shadow.png') }}" alt="leaf"
        class="position-absolute leaf-shape z--1 rounded-circle">
    <img src="{{ staticAsset('frontend/default/assets/img/shapes/mango.png') }}" alt="mango"
        class="position-absolute mango z--1" data-parallax='{"y": -120}'>
    <img src="{{ staticAsset('frontend/default/assets/img/shapes/hero-circle-sm.png') }}" alt="circle"
        class="position-absolute hero-circle circle-sm z--1">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-5 col-lg-8">
                <div class="hero-left-content">
                    <h1 class="display-3 fw-bolder mb-3"><span
                            class="fs-1">{{ localize(getSetting('halal_hero_sub_title')) }} </span> <br>
                        {{ localize(getSetting('halal_hero_title')) }}</h1>
                    <p class="mb-7 fs-6">{{ localize(getSetting('halal_hero_text')) }}</p>
                    <div class="hero-btns d-flex align-items-center gap-3 gap-sm-5 flex-wrap animated-btn-icon">
                        <a href="{{ getSetting('halal_hero_link') }}"
                            class="btn btn-dark">{{ localize(getSetting('halal_hero_link_text')) }}<span
                                class="ms-2"><i class="fas fa-arrow-right-long"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <div class="hero-right text-center position-relative z-1 mt-8 mt-xl-0">
                    <img src="{{ uploadedAsset(getSetting('halal_hero_img')) }}" alt="fruits"
                        class="img-fluid hero-img">
                </div>
            </div>
        </div>
    </div>
</section>

<!--counter promo start-->
<div class="counter-promo">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="promo-info-wrap d-flex align-items-center justify-content-around p-4 bg-overlay-img rounded"
                    style="background: url({{ staticAsset('frontend/default/assets/img/home-5/promo-bg.png') }})no-repeat center top">
                    <div class="singl-promo-info text-center text-light">
                        <span class="fw-bolder display-4">{{ getSetting('halal_hero_counter_one') }}</span>
                        <strong class="d-block">{{ getSetting('halal_hero_counter_one_text') }}</strong>
                    </div>
                    <div class="singl-promo-info text-center text-light">
                        <span class="fw-bolder display-4">{{ getSetting('halal_hero_counter_two') }}</span>
                        <strong class="d-block">{{ getSetting('halal_hero_counter_two_text') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--counter promo end-->
