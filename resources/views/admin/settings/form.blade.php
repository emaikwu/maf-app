@php    
    $page_title = "Add Setting - Mafete n Gifts";
    $title = "ADD SETTING";
    $active = "Add settings";
    $items = [
        ["name" => "Settings", "link" => "/admin/settings"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
<form action="/admin/settings" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input type="text" id="facebook" autoFocus class="form-control" name="facebook"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="instagram">Instagram URL</label>
            <input id="instagram" type="text" class="form-control" name="instagram"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="twitter">Twitter URL</label>
                <input type="text" id="twitter" autoFocus class="form-control" name="twitter"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="whatsapp">Whatsapp number</label>
            <input id="whatsapp" type="text" class="form-control" name="whatsapp"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone_1">Phone number 1</label>
                <input type="text" id="phone_1" autoFocus class="form-control" name="phone_1"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="phone_2">Phone number 2</label>
            <input id="phone_2" type="text" class="form-control" name="phone_2"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="email_1">Email address 1</label>
                <input type="text" id="email_1" autoFocus class="form-control" name="email_1"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="email_2">Email address 2</label>
            <input id="email_2" type="text" class="form-control" name="email_2"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" type="text" class="form-control" name="address"></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
    <button id="admin-btn">ADD SETTING</button>
    </div>
</form>
@endsection