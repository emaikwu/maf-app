@php    
    $page_title = $mode["edit"] ? "Edit About Page - Mafete n Gifts" : "Add About Page - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT ABOUT PAGE" : "ADD ABOUT PAGE";
    $active = $mode["edit"] ? "Edit Page" : "Add Page";
    $items = $mode["edit"] ?
    [
        ["name" => "About", "link" => "/admin/abouts"], 
        ["name" => "Add page", "link" => "/admin/abouts/create"], 
    ]
    :
    [
        ["name" => "About", "link" => "/admin/abouts"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')

  <form action="{{$mode["edit"] ? "/admin/abouts/1" : "/admin/abouts"}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="photo">Page photo</label>
      <input type="file" class="form-control" name="photo" id="photo"">
    </div>
    <div class="form-group">
      <label for="content">Page content</label>
      <div name="content" id="content" class="form-control content"></div>
    </div>
    <div class="form-group">
      <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "ADD PAGE"}}</button>
    </div>
  </form>

@endsection