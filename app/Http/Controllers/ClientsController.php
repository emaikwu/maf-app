<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slides;
use App\About;
use App\Setting;
use App\Category;
use Session;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $slides = Slides::get();
        $latests = Product::orderBy("created_at", "desc")->take(5)->get();
        $products = Product::get()->take(12);
        $settings = Setting::get();
        foreach($products as $product) {
            $product->images = json_decode($product->images);
        }
        foreach($latests as $latest) {
            $latest->images = json_decode($latest->images);
        }
        $categories = Category::get();
        return view("clients.home")
                ->with([
                    "slides" => $slides, 
                    "products" => $products, 
                    "categories" => $categories,
                    "latests" => $latests,
                    "settings" => $settings
                ]);
    }

    public function products() {
        $settings = Setting::get();
        $products = Product::orderBy("name", "asc")->paginate(20);
        foreach($products as $product) {
            $product->images = json_decode($product->images);
        }
        $categories = Category::get();
        return view("clients.products")
                ->with([
                    "products" => $products, 
                    "categories" => $categories, 
                    "settings" => $settings
                    ]);
    }

    public function show($id) {
        $settings = Setting::get();
        $product = Product::findOrFail($id);
        $related = Product::where("category_id", $product->category_id)->take(4)->get();
        $category = Category::findOrFail($product->category_id);
        foreach ($related as $relate) {
            $relate->images = json_decode($relate->images);
        }
        $product->images = json_decode($product->images);
    
        return view("clients.product")->
                with([
                    "product" => $product, 
                    "related" => $related, 
                    "category" => $category,
                    "settings" => $settings,
                    ]);
    }

    public function contact() {
        $settings = Setting::get();
        return view("clients.contact")->with([
            "settings" => $settings,
            ]);
        }
        
    public function about() {
        $settings = Setting::get();
        $abouts = About::get();
            return view("clients.about")->with(["abouts" => $abouts, "settings" => $settings]);
    }

    public function search() {
        $settings = Setting::get();
        if(request('q') !== null) {
            if(request("ajax")) {
                $products = Product::where('name', 'like', "%".request("q")."%")->take(6)->get();
                return response()->json($products, 200);
            } else {
                $products = Product::where('name', 'like', "%".request("q")."%")->take(15)->get();
                foreach($products as $product) {
                    $product->images = json_decode($product->images);
                }
                $q = request("q");
                $categories = Category::get();
                return view("clients.search")->with([
                    "products" => $products, 
                    "q" => $q,
                    "categories" => $categories,
                    "settings" => $settings,
                ]);
            }
        } else {
            return view("clients.search")->with(["products" => [], "settings" => $settings,]);
        }
    }

    public function feedback(Request $request) {
        $data = [];
        if($request->isMethod("POST")) {
            $this->validate($request, 
                [
                    "name" => "required|max:220",
                    "email" => "required|email|max:220",
                    "message" => "required"
                ]
            );
        }
        Session::flash("success", "Your feedback was sent successfully.");
        return redirect()->back();
    }
}
