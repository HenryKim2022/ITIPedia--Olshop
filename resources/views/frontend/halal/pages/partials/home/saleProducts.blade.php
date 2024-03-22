<div class="section-space-sm-y">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4">
                <div class="on-sale-banner">
                    <span class="d-inline-block meat-primary fs-14 fw-bold mb-2">
                        {{ localize(getSetting('halal_on_sale_sub_title')) }} </span>
                    <h2 class="display-6 clr-white mb-8">{{ localize(getSetting('halal_on_sale_title')) }}</h2>
                    <a href="{{ getSetting('halal_on_sale_link') }}"
                        class="meat-category-card__btn animated-btn-icon bg-primary-clr clr-white">
                        <span class="meat-category-card__btn-text fw-medium">
                            {{ localize(getSetting('halal_on_sale_link_text')) }} </span>
                        <span class="meat-category-card__btn-icon">
                            <i class="fas fa-arrow-right-long"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="box-shadow rounded-1 section-space-sm-y px-4 px-lg-6 px-xl-8 bg-white">
                    <div class="section-space-xsm-bottom">
                        <div class="row g-4 align-items-md-center">
                            <div class="col-md-8">
                                <h2 class="mb-0 display-6">{{ localize('On-Sale Products') }}</h2>
                            </div>
                            <div class="col-md-4">
                                <div class="on-sale-slider__nav justify-content-md-end">
                                    <div
                                        class="swiper-button-prev on-sale-slider__nav-btn on-sale-slider__nav-btn-prev">
                                    </div>
                                    <div
                                        class="swiper-button-next on-sale-slider__nav-btn on-sale-slider__nav-btn-next">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="swiper on-sale-slider">
                                <div class="swiper-wrapper">
                                    @php
                                        $halal_on_sale_products = getSetting('halal_on_sale_products') != null ? json_decode(getSetting('halal_on_sale_products')) : [];
                                        $products = \App\Models\Product::whereIn('id', $halal_on_sale_products)->get();
                                        $total = count($products);
                                        $devider = (int) $total / 6;                                        
                                        $loopProducts = $products->split($devider < 1 ? 1 : $devider);
                                        
                                    @endphp

                                    @foreach ($loopProducts as $products)
                                        <div class="swiper-slide">
                                            <div class="on-sale-slider__item">
                                                <div class="row g-4">
                                                    @foreach ($products as $product)
                                                        <div class="col-md-6">
                                                            @include(
                                                                'frontend.default.pages.partials.products.horizontal-product-card',
                                                                [
                                                                    'product' => (object) $product,
                                                                    'bgClass' => 'meat-card meat-card--row',
                                                                ]
                                                            )
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
