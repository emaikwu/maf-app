<?php 
$page_title = "Manage Products - Mafete n Gifts";
$title = "PRODUCTS";
$active = "Products";
$items = [
    ["name" => "Add product", "link" => "/admin/products/create"], 
];
?>
@extends('layouts.admin.admin')

@section('content')
    @if(count($products) > 0)
    <div class="card-deck">
        <div class="card">
            <div class="card-body table-responsive table-bordered">
                <table class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th>CATEGORY</th>
                            <th>STATUS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img style="width: 50px; height: 35px" src="/images/products/{{$product->images[0]}}">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->status}}</td>
                                <td><a class="btn btn-sm btn-outline-primary" href="/admin/products/{{$product->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                                    <td>
                                        <form class="delete-form" action="/admin/products/{{$product->id."?_method=DELETE"}}" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            {{method_field("DELETE")}}
                                            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
        <h5 class="text-center">You don't have any products yet <a href="/admin/products/create">Add products</a> here</h5>
    @endif
@endsection