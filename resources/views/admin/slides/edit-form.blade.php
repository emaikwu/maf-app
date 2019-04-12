@php    
    $page_title = "Edit Slide - Mafete n Gifts";
    $title = "EDIT SLIDE";
    $active = "Edit slide";
    $items = [
        ["name" => "Categories", "link" => "/admin/categories"], 
        ["name" => "Add slide", "link" => "/admin/slides/create"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
  <form action="/admin/slides/{{$slide->id}}?_method=PUT" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title">Slide title <span class="error">{{$errors->first("title")}}</span></label>
    <input type="text" class="form-control" name="title" id="title" value="{{$errors->first("title") ? old("title") : $slide->title}}">
    </div>
    <div class="form-group">
      <label for="photo">Slide photo <span class="error">{{$errors->first("photo")}}</span></label>
      <input type="file" class="form-control" name="photo" id="photo" value="{{$errors->first("photo") ? old("photo") : $slide->photo}}">
    </div>
    <div class="form-group">
      <label for="info">Slide info <span class="error">{{$errors->first("info")}}</span></label>
      <textarea name="info" id="info" rows="3" class="form-control">{{$errors->first("info") ? old("info") : $slide->info}}</textarea>
    </div>
    <div class="form-group">
      <button id="admin-btn">SAVE</button>
    </div>
  </form>
@endsection
