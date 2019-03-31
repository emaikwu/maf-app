@php    
    $page_title = $mode["edit"] ? "Edit Setting - Mafete n Gifts" : "Add Setting - Mafete n Gifts";
    $title = $mode["edit"] ? "EDIT SETTING" : "ADD SETTING";
    $active = $mode["edit"] ? "Edit setting" : "Add setting";
    $items = $mode["edit"] ?
    [
        ["name" => "Setting", "link" => "/admin/settings"], 
        ["name" => "Add setting", "link" => "/admin/settings/create"], 
    ]
    :
    [
        ["name" => "Setting", "link" => "/admin/settings"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')

@endsection