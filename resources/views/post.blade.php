{{--file ini untuk detail dari setiap post--}}

@extends('layouts.app')

@section('container')
  <article>
    <h1 class="mb-5">{{ $post->title }}</h1>

    <p>By: Asrofil Nadib in <a href="/categories/{{ $post->category->slug }}">
        {{ $post->category->name }}</a></p>

    {!! $post->body !!}
  </article>
  <a href="/blog" >Back to post</a>
@endsection
