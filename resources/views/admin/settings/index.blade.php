
@php    
    $page_title = "App Settings - Mafete n Gifts";
    $title = "APP SETTINGS";
    $active = "Setting";
    $items = [
        ["name" => "Add setting", "link" => "/admin/settings/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')

  Settins

@endsection