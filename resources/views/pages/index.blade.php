@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/image.png" alt="" data-aos="fade-in">

      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h2>Ahmad Jaelani</h2>
        <p style="max-width: 500px">I'm
          <span class="typed"
            data-typed-items="a fullstack developer passionate about building accessible web apps
            that users love."></span>
          <span class="typed-cursor typed-cursor--blink"></span>
        </p>
        <div class="social-links">
          <a href="https://github.com/">
            <i class="bi bi-github"></i>
          </a>
          <a href="https://www.facebook.com/ahmad.jailani.9822924/?locale=id_ID">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://www.instagram.com/jaee.eee_/">
            <i class="bi bi-instagram"></i>
          </a>
          <a target="_blank"
            href="https://wa.me/+6287735261470?text=Hello Ahmad Jaelani">
            <i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </section>
    <!-- /Hero Section -->

  </main>
@endsection
