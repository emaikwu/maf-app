@extends("layouts.admin.admin")
@php
    $page_title = "Result for: $query - Mafete n Gifts";
    $title = "Searched for: $query";
    $items = [];
@endphp

@section('content')
  <div class="search-results">
    @foreach ($products as $product)
        <div class="card text-left">
          <div class="card-body">
            <img src="/images/products/{{$product->images[0]}}" alt="{{$product->title}}">
            <a href="/admin/products/{{$product->id}}"><h5 class="card-title">{{$product->name}}</h5></a>
          </div>
        </div>
    @endforeach
  </div>
@endsection