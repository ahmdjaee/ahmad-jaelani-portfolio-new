@php
  $images = [
      "assets/img/portfolio/thumbnail-project-6-large.png",
      "assets/img/portfolio/details/diggies-1.png",
      "assets/img/portfolio/details/diggies-2.png",
      "assets/img/portfolio/details/diggies-3.png",
      "assets/img/portfolio/details/diggies-4.png",
      "assets/img/portfolio/details/diggies-5.png",
  ];
@endphp

@extends("layouts.app")

@section("content")
  <x-project-details title="Blog App" :images="$images">
    <x-slot:project-information>
      <li><strong>Backend</strong>: Laravel, MySQL, Sanctum</li>
      <li><strong>Frontend</strong>: React js, Ant Design, Redux toolkit
        & Rtk Query, React Router, Quill Js</li>
      <li>
        <strong>Project URL</strong>: <a
          href="https://diggies-blog.vercel.app/">diggies-blog.vercel.app</a>
      </li>
    </x-slot:project-information>

    <x-slot:description>
      <p>The Blog App is designed for sharing content such as tutorials,
        articles, stories, and more. It includes the following features:
      </p>

      <h6>Guest</h6>
      <ul>
        <li><strong>Access All Articles:</strong> Guests can read all
          available articles without needing to register or log in.</li>
      </ul>

      <h6>User</h6>
      <ul>
        <li><strong>Access All Articles:</strong> Registered users can
          also read all available articles.</li>
        <li><strong>Like and Comment on Posts:</strong> Users have the
          ability to like and comment on posts.</li>
        <li><strong>Create, Delete, and Edit Their Own Posts:</strong>
          Users can manage their own posts.</li>
        <li><strong>Dashboard Panel:</strong> Users have access to a
          dashboard where they can view data details about their posts,
          such as total views, total posts, and more.</li>
      </ul>

      <h6>Admin</h6>
      <ul>
        <li><strong>Full Access:</strong> Admins have control over
          everything, including creating categories, posts, and comments,
          as well as deleting users and more.</li>
      </ul>

      <h6>Testing account admin</h6>
      <ul>
        <li><strong>Email: </strong>admin@gmail.com</li>
        <li><strong>Password: </strong>admin</li>
      </ul>

      <h6>Testing account user</h6>
      <ul>
        <li><strong>Email: </strong>user@gmail.com</li>
        <li><strong>Password: </strong>user</li>
      </ul>
    </x-slot:description>
  </x-project-details>
@endsection
