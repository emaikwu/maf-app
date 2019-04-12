@php    
    $page_title = "Manage About Page - Mafete n Gifts";
    $title = "ABOUT PAGE";
    $active = "About";
    $items = [
        ["name" => "Add page", "link" => "/admin/abouts/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')

  @if(count($abouts) > 0)
    @foreach($abouts as $about)
      <div class="card" style="background-color:#fff; border-color:darkblue;">
        <div class="card-body">
          <div style="width:145px;margin-bottom:25px">
            <a class="btn btn-primary btn-flat btn-sm" href="/admin/abouts/{{$about->id}}/edit"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
            <form style="display:inline-block;margin-left:13px" action="/admin/abouts/{{$about->id}}?_method=DELETE" method="POST">
              @csrf
              @method("DELETE")
              <button class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </form>
          </div>
          <div style="text-align: center">
            <img style="max-width:100%; height:auto" src="/images/abouts/{{$about->photo}}" alt="About page">
          </div>
          <h4 class="card-title">Title</h4>
          {!! $about->content !!}
        </div>
      </div>
    @endforeach
  @else
      <h5 class="text-center">You don't have an about page <a href="/admin/abouts/create">add page</a></h5>
  @endif

@endsection