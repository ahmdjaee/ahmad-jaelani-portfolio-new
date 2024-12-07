@php
  $images = [
      "assets/img/portfolio/thumbnail-project-2-large.png",
      "assets/img/portfolio/details/larest-1.png",
      "assets/img/portfolio/details/larest-2.png",
      "assets/img/portfolio/details/larest-3.png",
      "assets/img/portfolio/details/larest-4.png",
      "assets/img/portfolio/details/larest-5.png",
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Larest Client" :images="$images">
    <x-slot:project-information>
      <li><strong>Backend</strong>: Laravel, MySQL, Jwt</li>
      <li>
        <strong>Frontend</strong>: React js, Tailwind Css, Context & Reducer, React Router, Joy Ui
      </li>
      <li>
        <strong>Project URL</strong>: <a href="https://larest.vercel.app/">larest.vercel.app</a>
      </li>
    </x-slot:project-information>

    <x-slot:description>
      <p>
        "Larest" is the name I chose for this application (Client version), which aims to
        digitize a restaurant experience. Through this app, customers can
        place orders directly, with features like cart, reservation, and
        online transactions intended to make ordering from home easier and
        more convenient.
      </p>
    </x-slot:description>
  </x-project-details>
@endsection
