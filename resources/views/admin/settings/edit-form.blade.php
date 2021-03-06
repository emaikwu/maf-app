@php    
    $page_title = "Edit Setting - Mafete n Gifts";
    $title =  "EDIT SETTING";
    $active =  "Edit settings";
    $items = [
        ["name" => "Settings", "link" => "/admin/settings"], 
        ["name" => "Add setting", "link" => "/admin/settings/create"], 
    ];
@endphp

@extends('layouts.admin.admin')
@section('content')
<form action="/admin/settings/{{$setting->id}}?_method=DELETE" method="POST">
    @csrf
    @method("PUT")
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input type="text" id="facebook" autofocus class="form-control" name="facebook" value="{{$setting->facebook}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="instagram">Instagram URL</label>
            <input id="instagram" type="text" class="form-control" name="instagram"  value="{{$setting->instagram}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="twitter">Twitter URL</label>
                <input type="text" id="twitter" class="form-control" name="twitter"  value="{{$setting->twitter}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="whatsapp">Whatsapp number</label>
            <input id="whatsapp" type="text" class="form-control" name="whatsapp"  value="{{$setting->whatsapp}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone_1">Phone number 1</label>
                <input type="text" id="phone_1" class="form-control" name="phone_1"  value="{{$setting->phone_1}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label for="phone_2">Phone number 2</label>
            <input id="phone_2" type="text" class="form-control" name="phone_2"  value="{{$setting->phone_2}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="email_1">Email address 1</label>
                <input type="text" id="email_1" class="form-control" name="email_1"  value="{{$setting->email_1}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
            <label for="email_2">Email address 2</label>
            <input id="email_2" type="text" class="form-control" name="email_2"  value="{{$setting->email_2}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" id="address">{{$setting->address}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
    <button id="admin-btn">Save</button>
    </div>
</form>
@endsection