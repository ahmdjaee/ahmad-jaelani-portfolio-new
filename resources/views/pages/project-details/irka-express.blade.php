@php
  $images = [
      "assets/img/portfolio/details/irkaexpress-1.png",
      "assets/img/portfolio/details/irkaexpress-2.png",
      "assets/img/portfolio/details/irkaexpress-3.png",
      "assets/img/portfolio/details/irkaexpress-4.png",
      // "assets/img/portfolio/details/irkaexpress-mobile-1.png",
      // "assets/img/portfolio/details/irkaexpress-mobile-2.png",
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Irka Express" :images="$images">
    <x-slot:project-information>
      <li><strong>Backend</strong>: Laravel, MySQL, Laravel Excel</li>
      <li><strong>Frontend</strong>: Jquery, Boostrap</li>
      <li>
        <strong>Project URL</strong>: <a href="https://irkaexpress.com/">irkaexpress.com</a>
      </li>
    </x-slot:project-information>

    <x-slot:description>
      <p>
        Irka Express is a logistics application I developed based on a client's request. The
        application features functionalities such as importing Excel files, creating, updating, and
        deleting data, as well as tracking shipments and checking shipping costs.
      </p>
    </x-slot:description>
  </x-project-details>
@endsection
