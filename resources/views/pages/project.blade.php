@extends('layouts.app')

@section('content')
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
    <section class="portfolio section" id="portfolio">

      <div class="container">

        <div
          class="isotope-layout"
          data-default-filter=".filter-app"
          data-layout="masonry"
          data-sort="original-order"
        >

          <ul
            class="portfolio-filters isotope-filters"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            {{-- <li data-filter="*" class="filter-active">All</li> --}}
            <li class="filter-active" data-filter=".filter-app">App</li>
            <li data-filter=".filter-app-ongoing">App (Ongoing)</li>
            <li data-filter=".filter-design">Design</li>
            <li data-filter=".filter-freelance">Freelance</li>
          </ul><!-- End Portfolio Filters -->

          <div
            class="row gy-4 isotope-container"
            data-aos="fade-up"
            data-aos-delay="200"
          >

            @foreach ($projects as $project)
              <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $project->category == 'app-ongoing' || $project->category == 'freelance' ? 'filter-app' : '' }} filter-{{ $project->category }}"
              >
                <div class="portfolio-content h-100">
                  <img
                    class="img-fluid"
                    src="{{ asset($project->thumbnail) }}"
                    alt=""
                    style="min-height: 250px"
                  >
                  <div class="portfolio-info">
                    <h4>{{ $project->name }}</h4>
                      @if ($project->is_best)
                        <h4 class="bg-warning">
                          <svg
                            class="icon icon-tabler icons-tabler-outline icon-tabler-sparkles"
                            xmlns="http://www.w3.org/2000/svg"
                            width="12"
                            height="12"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          >
                            <path
                              stroke="none"
                              d="M0 0h24v24H0z"
                              fill="none"
                            />
                            <path
                              d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z"
                            />
                          </svg>
                          Best Project
                        </h4>
                      @endif
                    {{-- <p>Lorem ipsum, dolor sit amet consectetur</p> --}}
                    <a
                      class="glightbox preview-link"
                      data-gallery="portfolio-gallery-app"
                      href="{{ asset($project->thumbnail) }}"
                      title="{{ $project->name }}"
                    ><i class="bi bi-zoom-in"></i></a>
                    <a
                      class="details-link"
                      href="{{ route('project.show', $project->id) }}"
                      title="More Details"
                    ><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->
            @endforeach

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

  </main>
@endSection
