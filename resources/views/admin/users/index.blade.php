@php    
    $page_title = "Manage Users - Mafete n Gifts";
    $title = "USERS";
    $active = "Users";
    $items = [
        ["name" => "Add user", "link" => "/admin/users/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')

  @if(count($users) > 0)
    <div class="card-deck">
      <div class="card">
        <div class="card-body table-responsive table-bordered">
          <table class="table">
            <thead class="bg-dark">
              <tr>
                <th>PHOTO</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLE</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td scope="row" style="text-align: center"><img id="user-thumbnail" src="/images/users/{{$user->photo}}" alt="{{$user->first_name}} {{$user->last_name}}"/></td>
                  <td>{{$user->first_name}} {{$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  <td><a class="btn btn-flat btn-primary btn-sm" href="/admin/users/{{$user->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                  <td>
                    <form action="/admin/users/{{$user->id}}?_method=DELETE" method="POST">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
    <h5 class="text-center">There are no users <a href="/admin/users/create">add users</a></h5>
  @endif
@endsection