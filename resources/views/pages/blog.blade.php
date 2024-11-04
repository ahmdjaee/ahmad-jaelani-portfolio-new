@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Blog</h1>
              <p class="mb-0">
                I share my knowledge and experience (Coming Soon)
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container">

        <div class="row mb-2">
          <div class="col-md-12 col-lg-6">
            <div
              class="row g-0 border border-secondary rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                {{-- <strong class="d-inline-block mb-2 text-primary">World</strong> --}}
                <h3 class="mb-0">Tutorial React js</h3>
                <div class="mb-1 text-secondary">Nov 12</div>
                <p class="card-text mb-auto">This is a wider card with supporting
                  text below as a natural lead-in to
                  additional content.</p>
                <a href="#"
                  class="icon-link gap-1 icon-link-hover stretched-link">
                  Continue reading
                  <i class="bi bi-chevron-right mb-1"></i>
                </a>
              </div>
              <div class="col-auto d-none d-md-block">
                <img style="max-width: 200px; max-height: 250px"
                  src="https://images.unsplash.com/photo-1730407890797-268219b206a5?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="">
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-6">
            <div
              class="row g-0 border border-secondary rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                {{-- <strong class="d-inline-block mb-2 text-primary">World</strong> --}}
                <h3 class="mb-0">Tutorial PHP Crud dasar`</h3>
                <div class="mb-1 text-secondary">Nov 12</div>
                <p class="card-text mb-auto">This is a wider card with supporting
                  text below as a natural lead-in to
                  additional content.</p>
                <a href="#"
                  class="icon-link gap-1 icon-link-hover stretched-link">
                  Continue reading
                  <i class="bi bi-chevron-right mb-1"></i>
                </a>
              </div>
              <div class="col-auto d-none d-md-block">
                <img style="max-width: 200px; max-height: 250px"
                src="https://images.unsplash.com/photo-1730407890797-268219b206a5?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt=""> 
              </div>
            </div>
          </div>

        </div>
      </div>

    </section><!-- /Services Section -->

  </main>
@endsection
