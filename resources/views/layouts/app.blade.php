<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Personal Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet"
    href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}>
  <link rel="stylesheet"
    href={{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}>
  <link rel="stylesheet" href={{ asset("assets/vendor/aos/aos.css") }}>
  <link rel="stylesheet"
    href={{ asset("assets/vendor/swiper/swiper-bundle.min.css") }}>
  <link rel="stylesheet"
    href={{ asset("assets/vendor/glightbox/css/glightbox.min.css") }}>

  <!-- Main CSS File -->
  <link href={{ asset("assets/css/main.css") }} rel="stylesheet">

  @vite(["resources/css/app.css", "resources/js/app.js"])

  <!-- =======================================================
  * Template Name: Personal
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <div class="root">
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div
        class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Portfolio</h1>
        </a>

        @php
          $menuItems = [
              "/" => "Home",
              "about" => "About",
              "resume" => "Resume",
              "project" => "Project",
              "blog" => "Blog",
              "contact" => "Contact",
          ];
        @endphp

        <nav id="navmenu" class="navmenu">
          <ul>
            @foreach ($menuItems as $url => $label)
              <li>
                <a href="{{ url($url) }}"
                  class="{{ request()->is($url) ? "active" : "" }}">
                  {{ $label }}
                </a>
              </li>
            @endforeach
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>
    </header>
    @yield("content")
    <footer id="footer" class="footer dark-background">
      <div class="container">
        <h3 class="sitename">Personal</h3>
        <p>Visit my social media for more information about me. </p>
        <div class="social-links d-flex justify-content-center">
          <a href="https://github.com/"><i class="bi bi-github"></i></a>
          <a
            href="https://www.facebook.com/ahmad.jailani.9822924/?locale=id_ID"><i
              class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/jaee.eee_/"><i
              class="bi bi-instagram"></i></a>
          <a target="_blank"
            href="https://wa.me/+6287735261470?text=Hello Ahmad Jaelani">
            <i class="bi bi-whatsapp"></i></a>
        </div>
        <div class="container">
          <div class="copyright">
            <span>Copyright</span><strong
              class="px-1 sitename">Personal</strong>
            <span>All Rights Reserved</span>
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Thanks to <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src={{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}>
  </script>
  <script src={{ asset("assets/vendor/php-email-form/validate.js") }}></script>
  <script src={{ asset("assets/vendor/aos/aos.js") }}></script>
  <script src={{ asset("assets/vendor/typed.js/typed.umd.js") }}></script>
  <script src={{ asset("assets/vendor/purecounter/purecounter_vanilla.js") }}>
  </script>
  <script src={{ asset("assets/vendor/waypoints/noframework.waypoints.js") }}>
  </script>
  <script src={{ asset("assets/vendor/swiper/swiper-bundle.min.js") }}></script>
  <script src={{ asset("assets/vendor/glightbox/js/glightbox.min.js") }}>
  </script>
  <script src={{ asset("assets/vendor/imagesloaded/imagesloaded.pkgd.min.js") }}>
  </script>
  <script src={{ asset("assets/vendor/isotope-layout/isotope.pkgd.min.js") }}>
  </script>

  <!-- Main JS File -->
  <script src={{ asset("assets/js/main.js") }}></script>

</body>

</html>
