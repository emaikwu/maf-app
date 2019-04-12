@extends('layouts.app')
@php
    $page_title = "Home"
@endphp
@section('content')
  <section class="teasers">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 teaser">
					<div class="teaser-inner">
						<div class="feature-icon">
							<img src="/imgs/1.png" alt="">
						</div>
						<h2>Gifts and presents</h2>
					</div>
				</div>
				<div class="col-md-4 teaser">
					<div class="teaser-inner">
						<div class="feature-icon">
							<img src="/imgs/2.png" alt="premium products">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 teaser">
					<div class="teaser-inner">
						<div class="feature-icon">
							<img src="/imgs/3.png" alt="#">
						</div>
						<h2>Celebrations & Events</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
  <div class="content-wrapper-alt" id="up">
    {{-- New Arrivals --}}
    <div class="new-arrivals">
      <div class="title wow bounceInDown">
        <h2>Latest Products</h2>
      </div>
      @if($latests)
        <div class="latest-slides owl-carousel owl-theme">
          @foreach($latests as $latest)
            <div>
              <div class="arrival-item">
                <img class="owl-lazy" data-src="/images/products/{{$latest->images[0]}}" alt="product">
                <h3>{{$latest->name}}</h3>
                <p>Price: &#8358;{{$latest->price}}</p>
                <div class="arrival-link">
                  <a href="/products/{{$latest->id}}">view product</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
    {{-- Products --}}
  <div class="title home" style="background-image:url('/imgs/logo.2.png')">
    <h2>Our products</h2>
  </div>
  <div class="container">
    <div class="products">
      <div class="row">
        @if($products)
          @foreach($products as $index => $product)
            @if($index % 2 == 1)
              <div class="col-md-6 col-sm-6 col-lg-3 wow zoomIn " data-wow-delay="0.6s">
                <div class="product-item">
                  <div class="product-inner">
                    <a href="/products/{{$product->id}}">
                    <img src="/images/products/{{$product->images[0]}}" alt="" class="embed-responsive">
                    <div class="product-info">
                      <h6>{{$product->name}}</h6>
                      <p><span class="price">&#8358;5000</span></p>
                      @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                          <p class="available">Available&colon;&NonBreakingSpace;<span>{{$product->status}}</span></p>
                        @endif
                      @endforeach
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-6 col-sm-6 col-lg-3 wow zoomIn">
                <div class="product-item">
                  <div class="product-inner">
                    <a href="/products/{{$product->id}}">
                    <img src="/images/products/{{$product->images[0]}}" alt="" class="embed-responsive">
                    <div class="product-info">
                      <h6>{{$product->name}}</h6>
                      <p><span class="price">&#8358;{{$product->price}}</span></p>
                      @foreach($categories as $category)
                        @if($product->category_id == $category->id)
                          <p class="available">Available&colon;&NonBreakingSpace;<span>{{$product->status}}</span></p>
                        @endif
                      @endforeach
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
  </div>
  <div class="more wow fadeInLeft">
    <a href="/products">More products</a>
  </div>

@endsection