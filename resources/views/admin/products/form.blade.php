@php    
    $page_title = $mode["edit"] ? "Edit Product - Mafete n Gifts" : "Add Product - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT PRODUCT" : "ADD PRODUCT";
    $active = $mode["edit"] ? "Edit product" : "Add product";
    $items = $mode["edit"] ?
    [
        ["name" => "Products", "link" => "/admin/products"], 
        ["name" => "Add products", "link" => "/admin/products/create"], 
    ]
    :
    [
        ["name" => "Products", "link" => "/admin/products"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')

<form action="/admin/products" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product name</label>
      <input type="text"class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="price">Product price</label>
      <input type="text"class="form-control" name="price" id="price">
    </div>
    <div class="form-group">
      <label for="images">Product images</label>
      <input type="file"class="form-control" name="images" id="images" multiple>
    </div>
    <div class="form-group">
      <label for="category_id">Product category</label>
      <select class="form-control" name="category_id" id="category_id">
        <option checked value="">Select a category</option>
      </select>
    </div>
    <div class="form-group">
        <label for="description">Product description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
    </div>
    <div class="form-group">
            <div class="form-check form-check-inline">
                <label for="available">
                <input type="radio" name='status' id="available"
                    value="available"
                    checked
                /> Available
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label for="sold out">
                <input type="radio" name='status' id="sold out"
                    value="sold out"
                /> Sold out
                </label>
            </div>
        </div>
    <div class="form-group">
        <button id="admin-btn">{{$mode["edit"] ? "save" : "Add Product"}}</button>
    </div>
</form>

@endsection