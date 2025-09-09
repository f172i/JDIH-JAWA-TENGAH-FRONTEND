@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
<section class="slider-three portfolio-area portfolio-one">
   <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <div class="section-title text-center  mt-10">
                <h3 class="title">{{ (app()->getLocale() == 'id') ? 'Video' : GoogleTranslate::trans('Tautan', app()->getLocale())  }}</h3>
                <p class="text">{{ (app()->getLocale() == 'id') ? 'Video Terkait JDIH Provinsi Jawa Tengah' : GoogleTranslate::trans('Video Terkait JDIH Provinsi Jawa Tengah', app()->getLocale())  }}
                  <h5 class="mt-10"><br/></h5>
              </div>
          </div>
      </div>

      <!-- row -->
      <div class="row grid">
        @foreach ($data as $video)
        <div class="col-lg-4 col-md-7 col-sm-9">
            <div class="features-style-two text-center d-flex">
                <iframe width="100%" height="300" src="{{str_replace('watch?v=','embed/',$video->link_youtube_video)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="portfolio-overlay d-flex align-items-center text-center">
              <div class="portfolio-content col-sm-12">
                 <div class="portfolio-text">
                    <p class="text">
                       {{ $video->judul_video }}
                    </p>
                 </div>
              </div>
           </div>
        </div>
        @endforeach
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== portfolio ONE PART ENDS ======-->

<!--====== gLightBox js ======-->
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>

<script>
      const filters = document.querySelectorAll(".portfolio-menu button");

      filters.forEach((filter) => {
        filter.addEventListener("click", function () {
          // ==== Filter btn toggle
          let filterBtn = filters[0];
          while (filterBtn) {
            if (filterBtn.tagName === "BUTTON") {
              filterBtn.classList.remove("active");
            }
            filterBtn = filterBtn.nextSibling;
          }
          this.classList.add("active");

          // === filter
          let selectedFilter = filter.getAttribute("data-filter");
          let itemsToHide = document.querySelectorAll(
            `.grid .col-lg-4:not([data-filter='${selectedFilter}'])`
          );
          let itemsToShow = document.querySelectorAll(
            `.grid [data-filter='${selectedFilter}']`
          );

          if (selectedFilter == "all") {
            itemsToHide = [];
            itemsToShow = document.querySelectorAll(".grid [data-filter]");
          }

          itemsToHide.forEach((el) => {
            el.classList.add("hide");
            el.classList.remove("show");
          });

          itemsToShow.forEach((el) => {
            el.classList.remove("hide");
            el.classList.add("show");
          });
        });
      });

      //========= glightbox
      const myGallery = GLightbox({
        selector: ".glightbox",
        type: "image",
        width: 900,
      });
    </script>
		@include('partial.footer')

@endsection
@section('footer')
    @include('partial.script')
@endsection
