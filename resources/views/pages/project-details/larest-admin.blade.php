@php
  $images = [
      "assets/img/portfolio/thumbnail-project-1-large.png",
      "assets/img/portfolio/details/larest-admin-1.png",
      "assets/img/portfolio/details/larest-admin-2.png",
      "assets/img/portfolio/details/larest-admin-3.png",
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Larest Admin" :images="$images">
    <x-slot:project-information>
      <li><strong>Backend</strong>: Laravel, MySQL, Jwt</li>
      <li><strong>Frontend</strong>: React js, Tailwind Css, Context &
        Reducer, React Router, Joy Ui</li>
      <li><strong>Project URL</strong>: <a
          href="https://larest-admin.vercel.app/">larest-admin.vercel.app</a>
      </li>
    </x-slot:project-information>

    <x-slot:description>
      <p>This is the admin side of the Larest client. In short, it's an
        application for managing a restaurant app, which I named "Larest."
      </p>
    </x-slot:description>
  </x-project-details>
@endsection