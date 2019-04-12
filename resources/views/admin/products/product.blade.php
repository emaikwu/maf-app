@extends("layouts.admin.admin")
@php
    $page_title = $product->name . " - Mafete n Gifts";
    $title = $product->name;
    $active = "Product";
    $items = [
      ["name" => "Products", "link" => "/admin/products"]
    ];
@endphp

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="action">
          <a class="btn btn-flat btn-sm btn-dark" href="/admin/products/create">Add Product</a>
          <a class="btn btn-flat btn-sm btn-primary" href="/admin/products/{{$product->id}}/edit">Edit</a>
          <form id="del" action="/admin/products/{{$product->id}}?_method=DELETE">
            @csrf
            @method("DELETE")
            <button class="btn btn-flat btn-sm btn-danger">Delete</button>
          </form>
        </div>
      </div>
    <div class="col-xs-12 col-md-6">
      <img class="embed-responsive" src="/images/products/{{$product->images[0]}}" alt="{{$product->name}}">
    </div>
    <div class="col-xs-12 col-md-6">
      <h3>{{$product->name}}</h3>
      <p>{{$product->description}}</p>
      <p>CATEGORY: <b>{{$category->name}}</b></p>
      <p>PRICE: <b>&#8358;{{$product->price}}</b></p>
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
@endsection