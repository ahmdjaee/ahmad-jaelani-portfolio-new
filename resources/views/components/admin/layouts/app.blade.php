<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title ?? 'Page Title' }}</title>

  <!-- plugins:css -->
  <link href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}"
    rel="stylesheet"
  >
  <link href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">
  <!-- endinject -->

  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
  <!-- End layout styles -->
  <link href="{{ asset('admin/assets/images/favicon.png') }}" rel="shortcut icon" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
</head>

<body>
  <div class="container-scroller">
    @include('components.admin.layouts._sidebar')
    <div class="container-fluid page-body-wrapper">
      @include('components.admin.layouts._navbar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title text-capitalize">{{request()->segment(count(request()->segments()))}}</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                @php
                  $url = url()->full();

                  $path = parse_url($url, PHP_URL_PATH);

                  $parts = explode('/admin-panel', $path);

                  // Hasil setelah admin-panel ada di index ke-1
                  $string = $parts[1] ?? '';

                  $listPath = explode( '/', $string);
                @endphp
                @foreach ($listPath as $path)
                  @if ($loop->last)
                    {{-- Jika ini adalah bagian terakhir, tampilkan sebagai aktif --}}
                    <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ $path }}</li>
                  @else
                    <li class="breadcrumb-item  text-capitalize"><a href="{{url("/admin-panel/$path")}}" wire:navigate>{{ $path }}</a></li>
                  @endif
                @endforeach
              </ol>
              {{-- <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Buttons</li>
                </ol> --}}
            </nav>
          </div>
          @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('message') }}
              <button
                class="close"
                data-dismiss="alert"
                type="button"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <script>
              setTimeout(() => {
                document.querySelector('.alert').remove();
              }, 3000);
            </script>
          @endif
          {{ $slot }}
        </div>
        <!-- content-wrapper ends -->
        @include('components.admin.layouts._footer')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script
    src="https://cdn.tiny.cloud/1/5szika0mnl706vrd6zx6a9rui1g2yjbklt9d7lwb3rdm2uau/tinymce/8/tinymce.min.js"
    referrerpolicy="origin"
    crossorigin="anonymous"
  ></script>

  @filepondScripts
  <!-- End custom js for this page -->
  @stack('bottom-script')
  {{-- <script type="module" src="{{asset('admin/assets/vendors/filepond/dist/filepond.js')}}" data-navigate-once defer data-navigate-track></script> --}}
  @livewireScripts

</body>

</html>
