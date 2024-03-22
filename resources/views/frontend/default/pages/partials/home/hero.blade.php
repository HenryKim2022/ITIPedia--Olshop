<style>
.gshop-hero-slider {
  /* max-width: 1116px; */
  max-width: 100vw !important;
  height: 279px;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}

.gshop-hero-single {
  position: relative;
  display: flex;
  align-items: center;
}

.hero-right {
  width: 100%; /* Adjust the width as needed */
  height: 100%;
}

.hero-img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  border-radius: 10px; /* Adjust the border radius as needed */
}

/* PAGINATION BULLETS */
.gshop-hero-slider-pagination {
  position: absolute;
  bottom: 0;
  left: 0;
  transform: translate(50px, -8px); /* Adjust the values as needed */
  z-index: 2;
  display: flex; /* Add this line */
}

.gshop-hero-slider-pagination > * {
  flex: 0 0 auto; /* Add this line */
  margin-right: 5px; /* Adjust the spacing between bullets as needed */
}

.gshop-hero-slider-pagination.theme-slider-control {
  /* background-color: rgba(255, 255, 255, 0.5); */
  background-color: rgba(255, 255, 255, 0); /* Transparent background */
  border-radius: 5px;
}


/*  */
.hero-btns {
  position: absolute;
  bottom: 0;
  right: 0;
  transform: translate(-50px, -8px); /* Adjust the values as needed */
  z-index: 2;
  display: flex; /* Add this line */
}

.hero-btns > * {
  flex: 0 0 auto; /* Add this line */
  margin-left: 5px; /* Adjust the spacing between bullets as needed */
}

.special-btns-1{
  font-size: 10px;
}

.hero-btns .btn {
    padding: 3px 8px; /* Adjust the padding as needed */
}
/* col-xxl-10 col-xl-9 col-md-9 col-7 */

/* .gshop-hero-pt{
} */


@media (min-width: 75em) {
  .gshop-hero {
    padding-top: 1vw; /* For XXL breakpoint and above */
  }
}

@media (min-width: 62em) {
  .gshop-hero {
    padding-top: 2vw; /* For XL breakpoint and above */
  }
}

@media (min-width: 48em) {
  .gshop-hero {
    padding-top: 3vw; /* For LG breakpoint and above */
  }
}

@media (min-width: 37.5em) {
  .gshop-hero {
    padding-top: 5vw; /* For MD breakpoint and above */
  }
}

@media (min-width: 28.75em) {
  .gshop-hero {
    padding-top: 7vw; /* For SM breakpoint and above my laptop */
  }
}

/* @media (max-width: 28.74em) {
  .gshop-hero {
    padding-top: 1vw; For screens smaller than SM breakpoint
  }
} */

</style>


<section class="gshop-hero pt-xxl-custom pt-xl-custom pt-lg-custom pt-sm-custom pt-custom bg-white position-relative z-1 overflow-hidden">
{{-- <section class="gshop-hero pt-80 pt-lg bg-white position-relative z-1 overflow-hidden"> --}}
{{-- <section class="gshop-hero gshop-hero-pt bg-white position-relative z-1 overflow-hidden"> --}}
    {{-- <img src="{{ staticAsset('frontend/default/assets/img/shapes/leaf-shadow.png') }}" alt="leaf"
        class="position-absolute leaf-shape z-2 rounded-circle d-none d-lg-inline"> --}}
    <img src="{{ staticAsset('frontend/default/assets/img/shapes/mango.png') }}" alt="mango"
        class="position-absolute mango z--1" data-parallax='{"y": -120}'>

    <img src="{{ staticAsset('frontend/default/assets/img/shapes/hero-circle-sm.png') }}" alt="circle"
        class="position-absolute hero-circle circle-sm z--1 d-none d-md-inline">

    <div class="container">
        {{-- <div class="gshop-hero-slider swiper"> --}}
       
        <div class="gshop-hero-slider swiper swiper-initialized swiper-horizontal">
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <div class="swiper-slide gshop-hero-single">
                        {{-- <div class="row align-items-center justify-content-between"> --}}
                        <div class="align-items-center justify-content-between">
                            {{-- <div class="col-xl-5 col-lg-7 d-none"> --}}
                            <div class="col-xl-5 col-lg-7 d-none">
                                <div class="hero-left-content">
                                    <span
                                        class="gshop-subtitle fs-5 text-secondary mb-2 d-block">{{ $slider->sub_title }}</span>
                                    <h1 class="display-4 mb-3">{{ $slider->title }}</h1>
                                    <p class="mb-5 fs-6">{{ $slider->text }}</p>

                                    <div class="hero-btns d-flex align-items-center gap-3 gap-sm-5 flex-wrap">
                                        <a href="{{ $slider->link }}"
                                            class="btn btn-secondary">{{ localize('Explore Now') }}<span
                                                class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>
                                        <a href="{{ route('home.pages.aboutUs') }}"
                                            class="btn btn-primary">{{ localize('About Us') }}<span class="ms-2"><i
                                                    class="fa-solid fa-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 col-lg-5"> --}}
                                <div class="col-xl-12 col-lg-11">
                                    <div class="hero-right text-center position-relative z-1 mt-6 mt-xl-0">
                                        <img src="{{ uploadedAsset($slider->image) }}" alt="" class="img-fluid position-absolute end-0 top-50 hero-img">
                                        <img src="{{ staticAsset('frontend/default/assets/img/shapes/hero-circle-lg.png') }}" alt="circle shape" class="img-fluid hero-circle">
                                    </div>

                  
                                    <div class="gshop-hero-slider-pagination theme-slider-control position-absolute bottom-0 start-0 p-3 z-5">
                                        <!-- Pagination content... -->
                                    </div>

                                    <div class="hero-btns special-btns-1 d-flex align-items-center gap-3 gap-sm-5 flex-wrap position-absolute bottom-0 end-0 p-3 z-5">
                                        <a href="{{ $slider->link }}"
                                            class="btn btn-secondary">{{ localize('Explore Now') }}<span
                                                class="ms-2"><i class="fa-solid fa-arrow-right"></i></span></a>
                                    </div>

                            
                                   
                                </div>

                            

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

     
    </div>
    @if(getSetting('facebook_link') || getSetting('twitter_link') || getSetting('linkedin_link') || getSetting('youtube_link'))
        <div class="gs-hero-social d-none">
            <ul class="list-unstyled">
                @if(getSetting('facebook_link'))
                    <li><a href="{{ getSetting('facebook_link') }}"><i class="fab fa-facebook-f"></i></a></li>
                @endif
                @if(getSetting('twitter_link'))
                    <li><a href="{{ getSetting('twitter_link') }}"><i class="fab fa-twitter"></i></a></li>
                @endif
                @if(getSetting('linkedin_link'))
                    <li><a href="{{ getSetting('linkedin_link') }}"><i class="fab fa-linkedin-in"></i></a></li>
                @endif
                @if(getSetting('youtube_link'))
                    <li><a href="{{ getSetting('youtube_link') }}"><i class="fab fa-youtube"></i></a></li>
                @endif

            </ul>
            <span class="title fw-medium">{{localize('Follow on')}}</span>
        </div>
    @endif
    {{-- <div class="gshop-hero-slider-pagination theme-slider-control position-absolute top-50 translate-middle-y z-5">
    </div> --}}
    {{-- 
    <div class="gshop-hero-slider-pagination theme-slider-control position-absolute bottom-0 start-0 p-3 z-5">
    </div> --}}

</section>
