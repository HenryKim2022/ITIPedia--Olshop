<section class="section-space-top section-space-sm-bottom">
    <div class="section-space-sm-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-8 col-xxl-6">
                    <h2 class="text-center h2 display-6 mb-4">
                        @php
                            $heading = localize(getSetting('halal_popular_products_title'));
                            $heading = str_replace('{_', '<span class="meat-primary">', $heading);
                            $heading = str_replace('_}', '</span>', $heading);
                        @endphp
                        {!! $heading !!}
                    </h2>
                    <p class="mb-0 text-center">
                        {{ localize(getSetting('halal_popular_products_text')) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="list-group d-flex flex-wrap flex-row gap-4 justify-content-center mb-12">
                    @php
                        $halal_popular_product_categories = getSetting('halal_popular_product_categories') != null ? json_decode(getSetting('halal_popular_product_categories')) : [];
                        $categories = \App\Models\Category::whereIn('id', $halal_popular_product_categories)->get();
                    @endphp
                    @foreach ($categories as $key => $category)
                        <a class="meat-category-tab {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="list"
                            href="#{{ $category->slug }}">{{ $category->collectLocalization('name') }}</a>
                    @endforeach
                </div>
                <div class="tab-content">

                    @php
                        $halal_popular_products = getSetting('halal_popular_products') != null ? json_decode(getSetting('halal_popular_products')) : [];
                        $products = \App\Models\Product::whereIn('id', $halal_popular_products)->get();
                    @endphp

                    @foreach ($categories as $keyCat => $cat)
                        <div class="tab-pane fade {{ $keyCat == 0 ? 'show active' : '' }}" id="{{ $cat->slug }}">
                            <div class="row g-4">
                                @foreach ($products as $product)
                                    @php
                                        $product_categories = $product
                                            ->product_categories()
                                            ->pluck('category_id')
                                            ->toArray();
                                    @endphp
                                    @if (in_array($cat->id, $product_categories))
                                        <div class="col-md-6 col-lg-4 col-xxl-3">
                                            @include(
                                                'frontend.default.pages.partials.products.trending-product-card',
                                                [
                                                    'product' => $product,
                                                    'bgClass' => 'meat-card',
                                                ]
                                            )
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
