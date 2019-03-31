@php    
    $page_title = $mode["edit"] ? "Edit Slide - Mafete n Gifts" : "Add Slide - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT SLIDE" : "ADD SLIDE";
    $active = $mode["edit"] ? "Edit slide" : "Add slide";
    $items = $mode["edit"] ?
    [
        ["name" => "Categories", "link" => "/admin/categories"], 
        ["name" => "Add slide", "link" => "/admin/slides/create"], 
    ]
    :
    [
        ["name" => "Slides", "link" => "/admin/slides"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
  <form action="{{$mode["edit"] ? "/admin/slides/1" : "/admin/slides"}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Slide title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="photo">Slide photo</label>
      <input type="file" class="form-control" name="photo" id="photo">
    </div>
    <div class="form-group">
      <label for="info">Slide info</label>
      <textarea name="info" id="info" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "ADD Slide"}}</button>
    </div>
  </form>
@endsection