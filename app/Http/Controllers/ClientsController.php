<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slides;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $slides = Slides::get();
        return view("clients.home")->with(["slides" => $slides]);
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
