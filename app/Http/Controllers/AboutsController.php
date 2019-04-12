<?php

namespace App\Http\Controllers;

use Session;
use App\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $abouts = About::get();
        return view("admin.abouts.index")->with("abouts", $abouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $about = About::get();
        if(count($about) > 0) {
            Session::flash("info", "An About page already exists edit it instead");
            return redirect("/admin/abouts");
        }

        $mode = ["edit" => false, "add" => true];
        return view("admin.abouts.form")->with("mode", $mode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, About $about)
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $data = [];
        if($request->isMethod("POST"))
        {
            $this->validate($request,
                [
                    "photo" => "required|mimes:jpeg,bmp,jpg,png,gif",
                    "content" => "required"
                ]
            );
            if($request->hasfile("photo")) 
            {
                $photo = $request->photo;
                $name = time().$photo->getClientOriginalName();
                $photo->move(public_path("/images/abouts"), $name);
                $data["photo"] = $name;
            }
            $data["content"] = $request->content;
            $about->insert($data);
            Session::flash("success", "About page added successfully");
            return redirect("/admin/abouts");
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
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        return redirect("/admin/abouts");
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
        $about = About::find($id);
        $mode = ["edit" => true, "add" => false];
        return view("admin.abouts.form")->with(["mode" => $mode, "about" => $about]);
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
        $about = About::find($id);
        if($request->isMethod("PUT"))
        {
            $this->validate(
                $request,
                [
                    "photo" => "mimes:jpeg,png,bmp,gif",
                    "content" => "required"
                ]
            );
            if($request->photo) 
            {
                $photo = $request->photo;
                $name = time().$photo->getClientOriginalName();
                $photo->move(public_path("/images/abouts"), $name);
                $data["photo"] = $name;
            }
            $data["content"] = $request->content;
            $about->update($data);
            Session::flash("success", "About page updated successfully");
            return redirect("/admin/abouts");
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
        $about = About::find($id);
        $about->delete();
        Session::flash("success", "About was deleted successfully");
        return redirect("/admin/abouts");
    }
}
