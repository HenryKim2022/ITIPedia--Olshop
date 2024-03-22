<div class="section-space-sm-y">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="choose-us-section section-space-sm-y">
                    <div class="section-space-sm-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-xl-6 col-xxl-5">
                                    <h2 class="mb-4 display-6">
                                        @php
                                            $heading = localize(getSetting('halal_why_choose_us_title'));
                                            $heading = str_replace('{_', '<span class="meat-primary">', $heading);
                                            $heading = str_replace('_}', '</span>', $heading);
                                        @endphp
                                        {!! $heading !!}


                                    </h2>
                                    <p class="mb-0">
                                        {{ localize(getSetting('halal_why_choose_us_text')) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_one_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_one_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_one_text')) }}
                                    </p>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_two_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_two_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_two_text')) }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="choose-card">
                                    <div class="mb-6">
                                        <img src="{{ uploadedAsset(getSetting('halal_why_choose_us_feature_three_icon')) }}"
                                            alt="image" class="img-fluid" />
                                    </div>
                                    <h5 class="mb-2 fs-20">
                                        {{ localize(getSetting('halal_why_choose_us_feature_three_title')) }}</h5>
                                    <p class="mb-0 fs-14">
                                        {{ localize(getSetting('halal_why_choose_us_feature_three_text')) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
