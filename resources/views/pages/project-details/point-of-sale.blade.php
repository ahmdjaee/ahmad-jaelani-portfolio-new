@php
  $images = [
      "assets/img/portfolio/pos.jpg"
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Point of Sale" :images="$images">
    <x-slot:project-information>
      <li><strong>Tech Stack</strong>: Laravel, MySQL, Jquery, Boostrap</li>
    </x-slot:project-information>

    <x-slot:description>
      <p>
        Point of sale (ongoing) later this application will have features such as cashier (to manage orders), reports, and order history etc.
      </p>
    </x-slot:description>
  </x-project-details>
@endsection
