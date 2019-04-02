<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Session;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = Product::get();
        foreach ($products as $product) {
            $product->images = json_decode($product->images);
        }
        return view("admin.products.index")->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::get();
        return view("admin.products.form")->with(["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $data = [];
        $data["name"] = $request->name;
        $data["price"] = $request->price;
        $data["category_id"] = $request->category;
        $data["description"] = $request->description;
        $data["status"] = $request->status;
        if($request->isMethod("POST")) {
            $this->validate(
                $request,
                [
                    "name" => "required",
                    "price" => "required",
                    "images.*" => "required|mimes:jpeg,png,bmp,gif",
                    "category" => "required",
                    "description" => "required",
                    "status" => "required" 
                ]
            );

            if($request->hasfile("images")) 
            {
                $image_names = [];
                $images_files = $request->images;
                foreach ($images_files as $image) {
                    $name = time().$image->getClientOriginalName();
                    $image->move(public_path("/images/products"), $name);
                    $image_names[] = $name;
                }
            }
            $data["images"] = json_encode($image_names);
            $product->insert($data);
            Session::flash("success", "Product was added successfully");
            return redirect("/admin/products");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::find($id);
        return view("admin.products.edit-form")
        ->with(["categories" => $categories, "product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
   
        $data = [];
        $data["name"] = $request->name;
        $data["price"] = $request->price;
        $data["category_id"] = $request->category;
        $data["description"] = $request->description;
        $data["status"] = $request->status;
        if($request->isMethod("PUT")) {
            $this->validate(
                $request,
                [
                    "name" => "required",
                    "price" => "required",
                    "images.*" => "required|mimes:jpeg,png,bmp,gif",
                    "category" => "required",
                    "description" => "required",
                    "status" => "required" 
                ]
            );

            if($request->hasfile("images")) 
            {
                $image_names = [];
                $images_files = $request->images;
                foreach ($images_files as $image) {
                    $name = time().$image->getClientOriginalName();
                    $image->move(public_path("/images/products"), $name);
                    $image_names[] = $name;
                    $data["images"] = json_encode($image_names);
                }
                foreach(json_decode($product->images) as $image) {
                    $file = public_path("images/products/").$image;
                    if(file_exists($file)) {
                        unlink($file);
                    }
                }
            }
            Session::flash("success", "Product was update successful");
            $product->update($data);
            return redirect("/admin/products");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        foreach(json_decode($product->images) as $image) {
            $file = public_path("images/products/").$image;
            if(file_exists($file)) {
                unlink($file);
            }
        }
        $product->delete();
        Session::flash("success", "Product was deleted successfully");
        return redirect("/admin/products");
        
    }
}
