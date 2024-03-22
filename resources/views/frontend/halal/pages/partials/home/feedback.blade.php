<div class="section-space-sm-y">
    <div class="section-space-sm-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6 col-xxl-5">
                    <h2 class="mb-0 text-center display-6">
                        @php
                            $title = localize('Hear From Our Happy <br> {_Customers_}');
                            $title = str_replace('{_', '<span class="meat-primary">', $title);
                            $title = str_replace('_}', '</span>', $title);
                        @endphp

                        {!! $title !!}

                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="meat-feedback-slider-container">
                    <div class="swiper meat-feedback-slider">
                        <div class="swiper-wrapper">
                            @foreach ($client_feedback as $feedback)
                                <div class="swiper-slide">
                                    <div class="meat-feedback bg-white px-6 py-10">
                                        <div class="d-flex align-items-center gap-4 mb-6">
                                            <div class="w-13 h-13 rounded-circle overflow-hidden flex-shrink-0">
                                                <img src="{{ uploadedAsset($feedback->image) }}" alt=""
                                                    class="img-fluid w-100 h-100 object-fit-cover" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Peter Parker</h6>
                                                <ul class="list list--row gap-1">
                                                    {{ renderStarRatingFront($feedback->rating) }}
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="mb-0">
                                            {{ $feedback->review }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-pagination meat-feedback-slider-container__pagination mt-8"></div>
                </div>
            </div>
        </div>
    </div>
</div>
