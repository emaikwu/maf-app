@extends('layouts.app')

@php
  $page_title = $product->name;
@endphp

@section("content")
  <div class="product">
    <div class="content-wrapper">
      <div class="single-product">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <img src="/images/products/{{$product->images[0]}}" alt="{{$product->name}}">
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="product-details">
                <h3>{{$product->name}}</h3>
                <h4>&#8358;{{$product->price}}</h4>
                <div class="meta">
                  <p>Category&colon;&NonBreakingSpace;<span><a href="/products/categories/{{$product->category_id}}">{{$category->name}}</a></span></p>
                  <p>Available&colon;&NonBreakingSpace;<span>{{$product->status}}</span></p>
                  <div class="info">
                    <h5>Product info</h5>
                    <p>{{$product->description}}</p>
                  </div>
                </div>
                <small><b>Click images view.</b></small>
                <div class="product-light-box">
                  <div id="product">
                    <div id="Product-images" class="product-light-box">
                      @foreach($product->images as $index => $image)
                        <a class="chocolat-image" href="/images/products/{{$image}}" title="{{$product->name . " - Mafete n Gifts"}}">
                        <img src="/images/products/{{$image}}" style="width:100px; height:auto" alt="{{$product->name}} {{$index + 1}}">
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="related-products container-fluid">
        <div class="title">
          <h4>related products</h4>
        </div>
        <div class="row">
          @foreach($related as $relate)
            <div class="col-sm-6 col-xs-12 col-md-3">
              <div class="card text-left">
                <div class="card-body">
                  <img class="card-img-top" src="/images/products/{{$relate->images[0]}}" alt="{{$relate->name}}">
                  <h3 class="card-title">{{$relate->name}}</h3>
                  <p><span class="price">&#8358;{{$relate->price}}</span></p>
                  <p>Category&colon;&NonBreakingSpace;<a href="/products/categories/{{$category->id}}">{{$category->name}}</p>
                  <div class="related-link">
                    <a class="link btn btn-flat btn-sm" href="/products/{{$relate->id}}">See details</a>
                  </div>
                </div>
              </div>
              
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection