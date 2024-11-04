@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Module App</h1>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Portfolio Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img
                    src={{ asset("assets/img/portfolio/thumbnail-project-5-large.png") }}
                    alt="">
                </div>
                {{-- 
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/product-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/branding-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/books-1.jpg" alt="">
                </div> --}}

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Backend</strong>: Firebase
                </li>
                <li><strong>Mobile</strong>: Kotlin, Xml
                </li>
                <li><strong>GitHub</strong>: <a
                    href="https://github.com/ahmdjaee/kotlin-module-pdf-apps-firebase">Module
                    App Viewer</a>
                </li>
                <li><strong>Project URL</strong>: <a href="">Not
                    available</a>
                </li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up"
              data-aos-delay="300">
              <h2>Feature and Details</h2>
              <p>

                This application is designed to display and manage training
                modules at my former training center, Kemnaker Bekasi.
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>
@endsection
