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
            <li data-filter=".filter-design">Design</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up"
            data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-6-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Blog App</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-6-large.png" title="Blog App"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/blog-app" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-design-1.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>One click Experience</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-design-1.png" title="One click Experience"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="https://www.figma.com/file/Dxv8D4wAo8grklXMxkNrxb/OneCllick-Experience?type=design&node-id=0%3A1&mode=design&t=Xrhd6YeChypczarN-1" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-1-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Larest Admin</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-1-large.png" title="Larest Admin"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/larest-admin" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-2-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Larest Client</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-2-large.png" title="Larest Client"
                    data-gallery="portfolio-gallery-product"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/larest-client" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-3-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Login Management</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-3-large.png" title="Login Management"
                    data-gallery="portfolio-gallery-branding"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/login-management" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-4-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Landing Page Nft</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-4-large.png" title="Landing Page Nft"
                    data-gallery="portfolio-gallery-book"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/landing-page-nft" title="More Details"
                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div
              class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/portfolio/thumbnail-project-5-large.png"
                  class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Module App</h4>
                  {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                  <a href="assets/img/portfolio/thumbnail-project-5-large.png" title="Module App"
                    data-gallery="portfolio-gallery-app"
                    class="glightbox preview-link"><i
                      class="bi bi-zoom-in"></i></a>
                  <a href="/project/module-app" title="More Details"
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
