@php    
    $page_title = "Edit Slide - Mafete n Gifts";
    $title = "ADD SLIDE";
    $active = "Add slide";
    $items = [
        ["name" => "Slides", "link" => "/admin/slides"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
  <form action="/admin/slides" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Slide title <span class="error">{{$errors->first("title")}}</span></label>
    <input type="text" class="form-control" name="title" id="title" value="{{old("title")}}">
    </div>
    <div class="form-group">
      <label for="photo">Slide photo <span class="error">{{$errors->first("photo")}}</span></label>
      <input type="file" class="form-control" name="photo" id="photo" value="{{old("photo")}}">
    </div>
    <div class="form-group">
      <label for="info">Slide info <span class="error">{{$errors->first("info")}}</span></label>
      <textarea name="info" id="info" rows="3" class="form-control">{{old("info")}}</textarea>
    </div>
    <div class="form-group">
      <button id="admin-btn">ADD Slide</button>
    </div>
  </form>
@endsection