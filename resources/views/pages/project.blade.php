@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Project</h1>
              <p class="mb-0">
                Here are some of my projects
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Project</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
          data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up"
            data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-app-ongoing">App (Ongoing)</li>
            <li data-filter=".filter-design">Design</li>
            <li data-filter=".filter-freelance">Freelance</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up"
            data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-freelance">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/details/irkaexpress-1.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Irka Express</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/details/irkaexpress-1.png" title="Irka Express"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/irkaexpress" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

  </main>
@endSection
