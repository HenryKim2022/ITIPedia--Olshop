<section class="section-space-y ptb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center mb-5">
                    <h2 class="display-6 fw-bolder">
                        @php
                            $heading = localize(getSetting('halal_top_categories_title'));
                            $heading = str_replace('{_', '<mark class="bg-transparent meat-primary">', $heading);
                            $heading = str_replace('_}', '</mark>', $heading);
                        @endphp
                        {!! $heading !!}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @php
                    $halal_top_category_ids = getSetting('halal_top_category_ids') != null ? json_decode(getSetting('halal_top_category_ids')) : [];
                    $categories = \App\Models\Category::whereIn('id', $halal_top_category_ids)->get();
                @endphp

                <div class="meat-category-slider-container">
                    <div class="swiper meat-category-slider">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $category)
                                <div class="swiper-slide">
                                    <div class="meat-category-card"
                                        style="background: url({{ uploadedAsset(getSetting('halal_top_cat_bg_img')) }})">
                                        <div class="meat-category-card__icon">
                                            <div class="meat-category-card__icon-is">
                                                <img src="{{ uploadedAsset($category->collectLocalization('thumbnail_image')) }}"
                                                    alt="" class="img-fluid mx-auto" />
                                            </div>
                                        </div>
                                        <div class="meat-category-card__body">
                                            <h5 class="meat-category-card__title">
                                                {{ $category->collectLocalization('name') }}</h5>
                                            <p class="meat-category-card__para">
                                                {{ $category->collectLocalization('description') }}
                                            </p>
                                            <a href="{{ route('products.index') }}?&category_id={{ $category->id }}"
                                                class="meat-category-card__btn animated-btn-icon">
                                                <span class="meat-category-card__btn-text"> {{ localize('Shop Now') }}
                                                </span>
                                                <span class="meat-category-card__btn-icon">
                                                    <i class="fas fa-arrow-right-long"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination meat-category-slider__pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
