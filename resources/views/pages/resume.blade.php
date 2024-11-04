@extends("layouts.app")

@section("content")
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Resume</h1>
              <p class="mb-0">On this page, I display my work experience, formal
                education, non-formal education, and provide details for each of
                them.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Resume</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>

            <div class="resume-item">
              <h4>Mobile Developer Intern</h4>
              <h5>Oct-2023 - Jan-2024</h5>
              <ul>
                <li>Implementation of Figma designs into a mobile application</li>
                <li> Developed user interface components</li>
                <li>Integrated API connections using the MVVM architecture</li>
                <li>Conducted API testing with Postman</li>
                <li>Performed unit testing to avoid undetected bugs from manual
                  testing</li>
                <li>Collaborated with other developers using GitHub for structured
                  and collaborative work
                <li>Utilized workflow management tools like Trello for validation
                  and review
                </li>
              </ul>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>Technician Project</h4>
              <h5>Jun-2021 - Aug-2022</h5>
              <p><em>The experience is not displayed because I consider it less
                  relevant.</em></p>
            </div><!-- Edn Resume Item -->

            <div class="resume-item pb-0">
              <h4>Maintenance Support</h4>
              <h5>Nov-2018 - Mar-2020</h5>
              <p><em>The experience is not displayed because I consider it less
                  relevant.</em></p>
            </div><!-- Edn Resume Item -->

           

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h3 class="resume-title">Formal Education</h3>
            <div class="resume-item">
              <h4>S1 Information Systems</h4>
              <h5>2022 - Present</h5>
              <p><em>Bina Insany University, Bekasi, Indonesia</em></p>
              <p>
                I am currently studying at Universitas Bina Insani, attending
                evening classes up to four times a week, conducted both offline
                and online.</p>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>Vocational High School</h4>
              <h5>2015 - 2018</h5>
              <p><em>SMK Taruna Bangsa, Bekasi, Indonesia</em></p>
              <p>At this school, I majored in Audio Video Electronics Engineering
                and successfully graduated in 2018.</p>
            </div><!-- Edn Resume Item -->
            <h3 class="resume-title">Non Formal Education</h3>
            <div class="resume-item">
              <h4>Mobile Developer Technical</h4>
              <h5>Feb-2023 - Sep-2023</h5>
              <p><em>Kemnaker Bekasi, Indonesia</em></p>
              <p>
                Here, I learned Kotlin from basics to advanced levels and successfully developed a modular app project, which led to my graduation.</p>
            </div><!-- Edn Resume Item -->

            <div class="resume-item">
              <h4>Embbedded Systems</h4>
              <h5>Apr-2021 - Jun-2021</h5>
              <p><em>Kemnaker Bekasi, Indonesia</em></p>
              <p><em>The experience is not displayed because I consider it less
                relevant.</em></p>
            </div><!-- Edn Resume Item -->

          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

  </main>
@endSection
