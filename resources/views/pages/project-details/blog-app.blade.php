@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Blog App</h1>
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
                    src={{ asset("assets/img/portfolio/thumbnail-project-6-large.png") }}
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
                <li><strong>Backend</strong>: Laravel, MySQL, Sanctum</li>
                <li><strong>Frontend</strong>: React js, Ant Design, Redux toolkit
                  & Rtk Query, React Router, Quill Js</li>
                <li><strong>Project URL</strong>: <a
                    href="https://diggies-blog.vercel.app/">diggies-blog.vercel.app</a>
                </li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up"
              data-aos-delay="300">
              <h2>Feature and Details</h2>
              <p>The Blog App is designed for sharing content such as tutorials,
                articles, stories, and more. It includes the following features:
              </p>

              <h6>Guest</h6>
              <ul>
                <li><strong>Access All Articles:</strong> Guests can read all
                  available articles without needing to register or log in.</li>
              </ul>

              <h6>User</h6>
              <ul>
                <li><strong>Access All Articles:</strong> Registered users can
                  also read all available articles.</li>
                <li><strong>Like and Comment on Posts:</strong> Users have the
                  ability to like and comment on posts.</li>
                <li><strong>Create, Delete, and Edit Their Own Posts:</strong>
                  Users can manage their own posts.</li>
                <li><strong>Dashboard Panel:</strong> Users have access to a
                  dashboard where they can view data details about their posts,
                  such as total views, total posts, and more.</li>
              </ul>

              <h6>Admin</h6>
              <ul>
                <li><strong>Full Access:</strong> Admins have control over
                  everything, including creating categories, posts, and comments,
                  as well as deleting users and more.</li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>
@endsection
