<?php

namespace App\Http\Controllers;

use App\Slides;
use Session;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::get();
        return view("admin.slides.index")->with("slides", $slides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = ["edit" => false, "add" => true];
        return view("admin.slides.form")->with("mode", $mode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        if($request->isMethod("POST")) {
            $this->validate($request, 
                [
                    "title" => "required",
                    "photo" => "required|mimes:png,jpeg,gif,bmp",
                    "info" => "required|max:250"
                ]
            );
            if($request->hasfile("photo")) 
            {
                $name = time().$request->photo->getClientOriginalName();
                $data["photo"] = $name;
                $request->photo->move(public_path("/images/slides"), $name);
            }
            $data["title"] = $request->title;
            $data["info"] = $request->info;
            Slides::create($data);
            Session::flash("success", "Slide was added successfully");
            return redirect("/admin/slides");
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
        $slide = Slides::find($id);
        return view("admin.slides.edit-form")->with(["slide" => $slide]);
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
        $slide = Slides::find($id);
        $data = [];
        if($request->isMethod("PUT"))
        {
            $this->validate($request, 
                [
                    "title" => "required",
                    "photo" => "mimes:jpeg,png,bmp,gif",
                    "info" => "required|max:250"
                ]
            );
            if($request->hasfile("photo"))
            {
                $file = public_path("/images/slides/").$slide->photo;
                if(file_exists($file)) 
                {
                    unlink($file);
                }
                $name = time().$request->photo->getClientOriginalName();
                $request->photo->move(public_path("/images/slides"), $name);
                $data["photo"] = $name;
            }
            $data["title"] = $request->title;
            $data["info"] = $request->info;
            $slide->update($data);
            Session::flash("success", "Slide was updated successfully");
            return redirect("/admin/slides");
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
        $slide = Slides::find($id);
        if($slide)
        {
            $file = public_path("images/slides/").$slide->photo;
            if(file_exists($file)) {
                unlink($file);
            }
            $slide->delete();
            Session::flash("success", "Slide was deleted successfully");
            return redirect("/admin/slides");
        }
    }
}
