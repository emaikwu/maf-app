<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $categories  = Category::get();
        return view("admin.categories.index")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $mode = ["edit" => false, "add" => true];
        return view("admin.categories.form")->with("mode", $mode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $data = [];
        $data["name"] = $request->input("name");
        if($request->isMethod("post")) {
            $this->validate(
                $request,
                [
                    "name" => "required|min:2"
                ]
            );
        }
        $category->insert($data);
        Session::flash("success", "Category was added successfully");
        return redirect("/admin/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        return redirect("/admin/categories");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $category = Category::find($id);
        $mode = ["edit" => true, "add" => false];
        return view("admin.categories.form")->with(["mode" => $mode, "category" => $category]);
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
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $category = Category::find($id);
        if($request->isMethod("PUT")) 
        {
            $this->validate(
                $request,
                ["name" => "required|min:2"]
            );

            $data = [];
            $data["name"] = $request->name;
            $category->update($data);
            Session::flash("success", "Category was updated successfully");
            return redirect("/admin/categories");
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
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $products = Product::get();
        $category = Category::find($id);
        // foreach($products as $product) {
        //     if($product->category_id === $category->id) {
        //         foreach($product->images as $image) {
        //             $file = public_path("images/products/").$image;
        //             if(file_exists($file)) {
        //                 unlink($file);
        //             }
        //         }
        //         $product->delete();
        //     }
        // }
        $category->delete();
        Session::flash("success", "Category was deleted successfully");
        return redirect("/admin/categories");
    }
}
