@extends('layouts.app')

@php
  $page_title = "About Us";
  $title = "About Us";
@endphp

@section("content")
  @include('includes.page-title')

  <div class="content-wrapper">
    @isset($abouts)
      <div class="about">
        @foreach ($abouts as $about)
            <img src="/images/abouts/{{$about->photo}}" alt="">
            {!!$about->content!!}
        @endforeach
      </div>  
    @endisset
  </div>
@endsection