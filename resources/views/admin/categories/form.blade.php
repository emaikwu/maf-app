@php    
    $page_title = $mode["edit"] ? "Edit Category - Mafete n Gifts" : "Add Category - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT CATEGORY" : "ADD CATEGORY";
    $active = $mode["edit"] ? "Edit categories" : "Add categories";
    $items = $mode["edit"] ?
    [
        ["name" => "Categories", "link" => "/admin/categories"], 
        ["name" => "Add categories", "link" => "/admin/categories/create"], 
    ]
    :
    [
        ["name" => "Categories", "link" => "/admin/categories"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
<form action="{{$mode["edit"] ? "/admin/categories/1" : "/admin/categories"}}" method="POST">
    <div class="form-group">
      <label for="name">Category name</label>
      <input type="text"
        class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
    <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "ADD Category"}}</button>
    </div>
  </form>
@endsection