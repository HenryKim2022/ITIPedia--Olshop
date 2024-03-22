<div class="section-space-sm-top section-space-bottom">
    <div class="section-space-sm-bottom">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-between">
                <div class="col-lg-5 col-xxl-4">
                    <h2 class="mb-0 display-6">
                        @php
                            $title = localize(getSetting('halal_blogs_title'));
                            $title = str_replace('{_', '<span class="meat-primary">', $title);
                            $title = str_replace('_}', '</span>', $title);
                        @endphp
                        {!! $title !!}
                    </h2>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <p class="mb-2">
                        {{ localize(getSetting('halal_blog_text')) }}
                    </p>
                    <a href="{{ getSetting('halal_blogs_link') }}"
                        class="meat-category-card__btn animated-btn-icon clr-primary px-0">
                        <span class="meat-category-card__btn-text fw-semibold">
                            {{ localize(getSetting('halal_blogs_link_text')) }} </span>
                        <span class="meat-category-card__btn-icon">
                            <i class="fas fa-arrow-right-long"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row g-4">
            @php
                $halal_blogs = getSetting('halal_blogs') != null ? json_decode(getSetting('halal_blogs')) : [];
                $blogs = \App\Models\Blog::whereIn('id', $halal_blogs)->get();
            @endphp
            @foreach ($blogs as $key => $blog)
                @if ($key == 0)
                    <div class="col-md-6 col-lg-4">
                        <div class="event-post">
                            <div class="event-post__img h-100 rounded-2 overflow-hidden">
                                <img src="{{ uploadedAsset($blog->thumbnail_image) }}" alt=""
                                    class="img-fluid w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="event-post__overlay">
                                <div class="event-post__overlay-content mt-auto">
                                    <div class="d-flex flex-wrap gap-4 align-items-center mb-4">
                                        <div class="d-flex align-items-center gap-1 clr-white">
                                            <div class="d-inline-block flex-shrink-0 fs-14">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            <div class="d-inline-block fs-14">{{ optional($blog->blog_category)->name }}
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center gap-1 clr-white">
                                            <div class="d-inline-block flex-shrink-0 fs-14">
                                                <i class="fas fa-stopwatch"></i>
                                            </div>
                                            <div class="d-inline-block fs-14">
                                                {{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                                        </div>
                                    </div>
                                    <h2 class="mb-2 fs-24 clr-white">
                                        <a href="{{ route('home.blogs.show', $blog->slug) }}"
                                            class="link d-inline-block clr-white :clr-primary">
                                            {{ $blog->collectLocalization('title') }} </a>
                                    </h2>
                                    <p class="mb-0 clr-white">
                                        {{ $blog->collectLocalization('short_description') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-lg-4">
                        <article class="blog-card rounded-2 overflow-hidden bg-white">
                            <div class="thumbnail overflow-hidden">
                                <a href="{{ route('home.blogs.show', $blog->slug) }}"><img
                                        src="{{ uploadedAsset($blog->thumbnail_image) }}" alt="blog thumb"
                                        class="img-fluid w-100"></a>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta d-flex align-items-center gap-3 mb-1">
                                    <span class="fs-xs fw-medium"><i
                                            class="fa-solid fa-tags me-1"></i>{{ optional($blog->blog_category)->name }}</span>
                                    <span class="fs-xs fw-medium"><i
                                            class="fa-regular fa-clock me-1"></i>{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                                </div>
                                <a href="#">
                                    <h4 class="mb-3">{{ $blog->collectLocalization('title') }}</h4>
                                </a>
                                <p class="mb-0"> {{ $blog->collectLocalization('short_description') }}
                                </p>
                            </div>
                        </article>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
