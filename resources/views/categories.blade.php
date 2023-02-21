{{--
@dd($posts)
--}}

{{--file ini dibuat untuk menampilkan category pagination--}}

@extends('layouts.app')

@section('container')
  <h1 class="mb-5">Post Category</h1>
  @foreach($categories as $category)
    <ul>
      <li>
        <h2><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h2>
      </li>
    </ul>
  @endforeach
@endsection
