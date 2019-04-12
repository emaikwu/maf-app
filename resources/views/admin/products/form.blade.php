@php    
    $page_title =  "Add Product - Mafete n Gifts";
    $title = "ADD PRODUCT";
    $active = "Add product";
    $items = [
        ["name" => "Products", "link" => "/admin/products"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')

<form action="/admin/products" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product name <span class="error">{{$errors->first("name")}}</span></label>
    <input type="text"class="form-control" name="name" id="name" value="{{old("name")}}">
    </div>
    <div class="form-group">
      <label for="price">Product price <span class="error">{{$errors->first("price")}}</span></label>
      <input type="text"class="form-control" name="price" id="price" value="{{old("price")}}">
    </div>
    <div class="form-group">
      <label for="images">Product images <span class="error">{{$errors->first("images")}}</span></label>
      <input type="file"class="form-control" name="images[]" id="images" multiple  value="{{old("images")}}">
    </div>
    <div class="form-group">
      <label for="category">Product category <span class="error">{{$errors->first("category")}}</span></label>
      <select class="form-control" name="category" id="category">
        <option checked value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}"
            {{old("category") == $category->id ? "selected" : false}}
            @isset($product)
                {{$product->category_id == $category->id ? "selected" : false}}   
            @endisset
            >{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="description">Product description <span class="error">{{$errors->first("description")}}</span></label>
        <textarea class="form-control" name="description" id="description" rows="3">{{old("description")}}</textarea>
    </div>
    <div class="form-group">
        <label for="" style="display:block;">Product status</label>
            <div class="form-check form-check-inline">
                <label for="in-stock">
                <input type="radio" name='status' id="in-stock" value="in stock"
                    @if(old("status") == "in stock")
                        checked
                    @else
                        @if (old("status") != "in stock" || "sold out")
                            {{"checked"}}
                        @endif
                    @endif
                    /> In stock
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="sold out">
                <input type="radio" name='status' id="sold out" value="sold out"
                @if(old("status") == "sold out")
                    checked
                @endif
                /> Sold out
                </label>
            </div>
        </div>
    <div class="form-group">
        <button id="admin-btn">Add Product</button>
    </div>
</form>

@endsection