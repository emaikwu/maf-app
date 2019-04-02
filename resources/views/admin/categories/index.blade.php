@php    
    $page_title = "Manage Categories - Mafete n Gifts";
    $title = "CATEGORIES";
    $active = "Categories";
    $items = [
        ["name" => "Add category", "link" => "/admin/categories/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')
  @if(count($categories) > 0)
  <div class="card-deck">
    <div class="card">
      <div class="card-body table-responsive table-bordered">
        <table class="table table-bordered">
          <thead class="bg-dark">
            <tr>
              <th>CATEGORY NAME</th>
              <th>EDIT</th>
              <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($categories as $item)
                <tr scope="row">
                  <td>{{$item->name}}</td>
                  <td><a class="btn btn-sm btn-primary" href="/admin/categories/{{$item->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                  <td>
                    <form action="/admin/categories/{{$item->id}}?_method=DELETE" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
  @else 
    <h1>You don't have any category yet.</h1>
  @endif

@endsection