@extends("layouts.app")
@isset($q)
@php
    $page_title = "Search: $q"
@endphp
    
@endisset
@section('content')
  <div class="container">
    <div id="search">
      <div class="title">
        @isset($q)
          <h2>Results for&colon;&NonBreakingSpace;{{$q}}</h2>  
        @endisset
      </div>
      @if(count($products) > 0)
        @foreach($products as $product)
          <div class="search-data">
            <div class="card">
              <a href="/products/{{$product->id}}">
                <div class="card-body">
                  <img src="/images/products/{{$product->images[0]}}" alt="{{$product->name}}">
                  <div class="search-meta">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <p><span class="price">&#8358;{{$product->price}}</span></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        @endforeach
      @else
        <div class="no-result">
          <h3>Oops! no product matched your search query</h3>
        </div>
      @endif
    </div>
  </div>
@endsection