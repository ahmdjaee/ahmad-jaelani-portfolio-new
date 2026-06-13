@extends("layouts.app")

@section("content")
  <x-project-details title="{{ $project->name}}" :images="$project->images">
    <x-slot:project-information>
    {!! $project->project_information !!}
    </x-slot:project-information>

    <x-slot:description>
      {!! $project->detail_features!!}
    </x-slot:description>
  </x-project-details>
@endsection
