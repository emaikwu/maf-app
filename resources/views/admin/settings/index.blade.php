
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
    @foreach($settings as $setting)
      <div class="row">
        <div class="col-md-12">
          <div class="action">
            <a href="/admin/settings/{{$setting->id}}/edit" class="btn btn-sm btn-primary btn-flat">Edit</a>
            <form action="/admin/settings/{{$setting->id}}?_method=DELETE" method="POST" id="del">
              @csrf
              @method("DELETE")
              <button class="btn btn-danger btn-sm btn-flat">Delete</button>
            </form>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card-deck">
            <div class="card">
              <div class="card-body table-responsive table-bordered">
                  <table class="table table-bordered">
                    <thead class="bg-dark">
                      <tr>
                        <th>Setting</th>
                        <th>Value</th>
                      </tr>
                    <thead>
                      <tbody>
                        <tr>
                          <td>FACEBOOK</td>
                          <td><a href="{{$setting->facebook}}" target="_blank">{{$setting->facebook}}</a></td>
                        </tr>
                        <tr>
                          <td>TWITTER</td>
                          <td><a href="{{$setting->twitter}}" target="_blank">{{$setting->twitter}}</a></td>
                        </tr>
                        <tr>
                          <td>INSTAGRAM</td>
                          <td><a href="{{$setting->instagram}}" target="_blank">{{$setting->instagram}}</a></td>
                        </tr>
                        <tr>
                          <td>WHATSAPP</td>
                          <td>{{$setting->whatsapp}}</td>
                        </tr>
                        <tr>
                          <td>PHONE 1</td>
                          <td>{{$setting->phone_1}}</td>
                        </tr>
                        <tr>
                          <td>PHONE 2</td>
                          <td>{{$setting->phone_2}}</td>
                        </tr>
                        <tr>
                          <td>EMAIL 1</td>
                          <td>{{$setting->email_1}}</td>
                        </tr>
                        <tr>
                          <td>EMAIL 2</td>
                          <td>{{$setting->email_2}}</td>
                        </tr>
                        <tr>
                          <td>ADDRESS</td>
                          <td>{{$setting->address}}</td>
                        </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @else 
    <h5 class="text-center">There are no settings <a href="/admin/settings/create">add settings</a></h5>
  @endif

@endsection