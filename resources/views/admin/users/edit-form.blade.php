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
      <div class="col-md-12">
        <div class="form-group">
        <div ><label>User role <span class="error">{{$errors->first("role")}}</span></label></div>
          <div class="form-check form-check-inline">
            <label for="admin">
            <input type="radio" name='role' id="admin" value="admin" @if($user && $user->role === "admin") checked @endif
            /> Admin
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label for="user">
            <input type="radio" name='role' id="user" value="user" @if($user && $user->role === "user") checked @endif
            /> User
            </label>
          </div>
        </div>
        <div class="form-group">
            <label for="password">Enter Password to save changes <span class="error">{{$errors->first("password")}}</span></label>
            <input id="password" type="password" class="form-control" name="password"/>
          </div>
        <div class="form-group">
          <button id="admin-btn">{{$mode["edit"] ? "SAVE" : "Add user"}}</button>
        </div>
      </div>
    </div>
  </form>

@endsection