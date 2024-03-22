<section class="meat-about-us">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5">
                <div class="meat-about-info-left">
                    <img src="{{ uploadedAsset(getSetting('halal_about_us_large_img')) }}" alt=""
                        class="img-fluid rounded-3" />
                    <div class="expert-box bg-meat-primary text-light rounded-circle shadow-lg">
                        <div class="expert-info">
                            <div class="fw-bolder mb-2 display-5 lh-0">{{ getSetting('halal_about_us_counter') }}</div>
                            <br />
                            <span>{{ localize(getSetting('halal_about_us_counter_text')) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="meat-about-info-right">
                    <strong
                        class="meat-primary mb-2 d-block">{{ localize(getSetting('halal_about_us_sub_title')) }}</strong>
                    <h2 class="fw-bolder display-6 mb-4">
                        @php
                            $heading = localize(getSetting('halal_about_us_title'));
                            $heading = str_replace('{_', '<span class="meat-primary">', $heading);
                            $heading = str_replace('_}', '</span>', $heading);
                        @endphp
                        {!! $heading !!}
                    </h2>

                    <p class="mb-12">
                        {{ localize(getSetting('halal_about_us_text')) }}
                    </p>

                    <div class="d-flex align-items-center flex-wrap gap-15 mt-6">
                        <a href="{{ getSetting('halal_about_us_link') }}" class="btn btn-dark animated-btn-icon">
                            {{ localize(getSetting('halal_about_us_link_text')) }}
                            <span class="ms-2">
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </a>
                        <div class="d-flex align-items-center gap-4">
                            <div class="w-18 h-18 rounded-circle overflow-hidden flex-shrink-0">
                                <img src="{{ uploadedAsset(getSetting('halal_about_us_user_avatar')) }}" alt=""
                                    class="img-fluid w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fs-18">{{ localize(getSetting('halal_about_us_user_name')) }}</h6>
                                <p class="mb-0">{{ localize(getSetting('halal_about_us_user_designation')) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.halal.pages.partials.home.features')
    </div>
</section>
