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

  Users

@endsection