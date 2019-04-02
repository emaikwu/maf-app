@php    
    $page_title = "Manage Slides - Mafete n Gifts";
    $title = "SLIDES";
    $active = "Slides";
    $items = [
        ["name" => "Add slide", "link" => "/admin/slides/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')

  @if(count($slides) > 0) 
    <div class="card-deck">
      <div class="card">
        <div class="card-body">
            <div class="owl-carousel owl-theme">
              @foreach($slides as $slide)
                <div class="item">
                  <img src="/images/slides/{{$slide->photo}}" alt="{{$slide->title}}"/>
                  <h3>{{$slide->title}}</h3>
                  <p>{{$slide->info}}</p>
                  <div>
                    <a href="/admin/slides/{{$slide->id}}/edit" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                    <form style="display:inline-block;margin-left:13px" action="/admin/slides/{{$slide->id}}?_method=DELETE" method="POST">
                      @csrf
                      @method("DELETE")
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>
    </div>  
  @else 
    <h5 class="text-center">Your there are no slides yet <a href="/admin/slides/create">add slides</a> here</h5>
  @endif

@endsection