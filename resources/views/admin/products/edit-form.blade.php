@php    
    $page_title = "Edit Product - Mafete n Gifts";
    $title = "EDIT PRODUCT";
    $active = "Edit product";
    $items = [
        ["name" => "Products", "link" => "/admin/products"], 
        ["name" => "Add products", "link" => "/admin/products/create"], 
    ]
@endphp

@extends('layouts.admin.admin')
@section('content')

<form action="/admin/products/{{$product->id}}?_method=PUT"" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="name">Product name <span class="error">{{$errors->first("name")}}</span></label>
    <input type="text"class="form-control" name="name" id="name"value="{{$errors->first("name") ? old("name") : $product->name}}">
    </div>
    <div class="form-group">
      <label for="price">Product price <span class="error">{{$errors->first("price")}}</span></label>
      <input type="text"class="form-control" name="price" id="price" value="{{$errors->first("price") ? old("price") : $product->price}}">
    </div>
    <div class="form-group">
      <label for="images">Product images <span class="error">{{$errors->first("images")}}</span></label>
      <input type="file"class="form-control" name="images[]" id="images" multiple  value="">
    </div>
    <div class="form-group">
      <label for="category">Product category <span class="error">{{$errors->first("category")}}</span></label>
      <select class="form-control" name="category" id="category">
        <option checked value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}"
            {{old("category") == $category->id ? "selected" : null}}
            @isset($product)
                {{$product->category_id == $category->id ? "selected" : null}}   
            @endisset
            >{{$category->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="description">Product description <span class="error">{{$errors->first("description")}}</span></label>
        <textarea class="form-control" name="description" id="description" rows="3">{{$errors->first("description") ? old("description") : $product->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="" style="display:block;">Product status <span class="error">{{$errors->first("status")}}</span></label>
            <div class="form-check form-check-inline">
                <label for="in-stock">
                <input type="radio" name='status' id="in-stock" value="in stock"
                @if(old("status") == "in stock")
                  checked
                @else
                  {{$product->status == 'in stock' ? "checked" : "checked" }}
                @endif
                /> In stock
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="sold out">
                <input type="radio" name='status' id="sold out" value="sold out"
                  @if(old("status") == "sold out")
                    checked
                  @else
                    {{$product->status == 'sold out' ? "checked" : null }}
                  @endif
                /> Sold out
                </label>
            </div>
        </div>
    <div class="form-group">
        <button id="admin-btn">SAVE</button>
    </div>
</form>

@endsection