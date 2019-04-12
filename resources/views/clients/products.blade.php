@extends('layouts.app')

@php
  $page_title = "Our Products";
  $title = "Products";
@endphp

@section("content")
  @include("includes.page-title")

  <div class="container">
    <div class="products">
      <div class="row">
        @if($products)
          @foreach($products as $index => $product)
            @if($index % 2 == 1)
              <div class="col-md-6 col-sm-6 col-lg-3 wow zoomIn">
                <div class="product-item">
                  <div class="product-inner">
                    <a href="/products/{{$product->id}}">
                    <img src="/images/products/{{$product->images[0]}}" alt="" class="img-resp">
                    <div class="product-info">
                      <h6>{{$product->name}}</h6>
                      <p><span class="price">&#8358;{{$product->price}}</p>
                      @if($categories)
                        @foreach($categories as $category)
                          @if($product->category_id == $category->id)
                            <p class="available">Available&colon;&NonBreakingSpace;<span>{{$product->status}}</span></p>
                          @endif
                        @endforeach
                      @endif
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-6 col-sm-6 col-lg-3 wow zoomIn" data-wow-delay="0.6s">
                <div class="product-item">
                  <div class="product-inner">
                    <a href="/products/{{$product->id}}">
                    <img src="/images/products/{{$product->images[0]}}" alt="" class="img-resp">
                    <div class="product-info">
                      <h6>{{$product->name}}</h6>
                      <p><span class="price">&#8358;{{$product->price}}</p>
                      @if($categories)
                        @foreach($categories as $category)
                          @if($product->category_id == $category->id)
                            <p class="available">Available&colon;&NonBreakingSpace;<span>{{$product->status}}</span></p>
                          @endif
                        @endforeach
                      @endif
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        @endif
      </div>
    </div>
    <div class="pagination">
      
    </div>
  </div>

@endsection