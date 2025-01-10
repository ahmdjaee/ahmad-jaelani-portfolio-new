@php
  $images = [
      "assets/img/portfolio/larest-v2.png"
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Larest V2" :images="$images">
    <x-slot:project-information>
      <li><strong>Backend</strong>: Laravel, MySQL, Jwt</li>
      <li>
        <strong>Frontend</strong>: React js, Ant Design, Redux toolkit, RTK query
      </li>
      <li>
        <strong>Project URL</strong>: <a href="https://larest-v2.vercel.app/">larest-v2.vercel.app</a>
      </li>
    </x-slot:project-information>

    <x-slot:description>
      <p>
        Larest v2 (ongoing) is a development of the first larest, larest v2 aims for a more user friendly experience.
      </p>
    </x-slot:description>
  </x-project-details>
@endsection
