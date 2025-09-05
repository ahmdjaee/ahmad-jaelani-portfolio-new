@extends('layouts.app')

@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading" style="padding-block: 50px"></div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="/blog">Blog</a></li>
          <li class="current">{{ $blog->title }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Service Details Section -->
  <section class="section">

    <div class="container">

      <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8">
          <h1>{{ $blog->title }}</h1>
          <p>{{ $blog->sub_title }}</p>
          <p class="text-end text-secondary">{{ $blog->getFormattedPublishedAt() }}</p>
          <hr />
          {!! $blog->content !!}
        </div>
      </div>

    </div>

  </section><!-- /Service Details Section -->
@endsection

@push('bottom-scripts')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/atom-one-dark.min.css"
    rel="stylesheet"
  >
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>

  <script>
    hljs.highlightAll();
  </script>
@endpush
