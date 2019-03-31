<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        return view("clients.home");
    }

    public function products() {
        return view("clients.products");
    }

    public function show($id) {
        return view("clients.product");
    }

    public function contact() {
        return view("clients.contact");
    }

    public function about() {
        return view("clients.about");
    }
}
