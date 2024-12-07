@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Landing Page Nft</h1>
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
                    src={{ asset("assets/img/portfolio/thumbnail-project-4-large.png") }}
                    alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Frontend</strong>: Html, Css</li>
                <li><strong>Project URL</strong>: <a
                    href="https://nft-website-navy.vercel.app/">nft-website-navy.vercel.app</a>
                </li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up"
              data-aos-delay="300">
              <h2>Feature and Details</h2>
              <p>
                Only slicing an nft-themed website using html and css.
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>
@endsection
