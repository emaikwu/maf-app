
@php    
    $page_title = "App Settings - Mafete n Gifts";
    $title = "APP SETTINGS";
    $active = "Setting";
    $items = [
        ["name" => "Add settings", "link" => "/admin/settings/create"], 
];
@endphp

@extends('layouts.admin.admin')
@section('content')

  @if(count($settings)> 0)
  @else 
    <h5 class="text-center">There are no settings yet <a href="/admin/settings/create">add settings</a> here</h5>
  @endif

@endsection