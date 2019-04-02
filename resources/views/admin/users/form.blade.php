@php    
    $page_title = $mode["edit"] ? "Edit User - Mafete n Gifts" : "Add User - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT USER" : "ADD USER";
    $active = $mode["edit"] ? "Edit users" : "Add users";
    $items = $mode["edit"] ?
    [
        ["name" => "Users", "link" => "/admin/users"], 
        ["name" => "Add users", "link" => "/admin/users/create"], 
    ]
    :
    [
        ["name" => "Users", "link" => "/admin/users"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
  <form action="{{$mode["edit"] ? "/admin/users/1" : "/admin/users"}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($mode["edit"])
      @method("PUT")
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first_name">First name <span class="error">{{$errors->first("first_name")}}</span></label>
          <input type="text" id="first_name" autoFocus class="form-control" name="first_name"
          value="{{old("first_name")}}"
          >
        </div>
      </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="last_name">Last name <span class="error">{{$errors->first("last_name")}}</span></label>
            <input id="last_name" type="text" class="form-control" name="last_name"
            value="{{old("last_name")}}"
            >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="photo">User photo <span class="error">{{$errors->first("photo")}}</span></label>
            <input id="photo" type="file" class="form-control" name="photo"
            value="{{old("photo")}}"
            />
          </div>
          <div class="form-group">
            <label for="email">Email address <span class="error">{{$errors->first("email")}}</span></label>
            <input id="email" type="text" class="form-control" name="email"
          value="{{old("email")}}"
            />
          </div>
          <div class="form-group">
            <label for="password">Password <span class="error">{{$errors->first("password")}}</span></label>
            <input id="password" type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm password <span class="error">{{$errors->first("password_confirmation")}}</span></label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"/>
          </div>
          <div class="form-group">
          <div ><label>User role <span class="error">{{$errors->first("role")}}</span></label></div>
            <div class="form-check form-check-inline">
              <label for="admin">
              <input type="radio" name='role' id="admin"
                value="admin"
              /> Admin
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label for="user">
              <input type="radio" name='role' id="user" checked
                value="user"
              /> User
              </label>
            </div>
          </div>
          <div class="form-group">
            <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "Add user"}}</button>
          </div>
        </div>
      </div>
  </form>

@endsection