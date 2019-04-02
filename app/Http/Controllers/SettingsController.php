<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();
        return view("admin.settings.index")->with("settings", $settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = Setting::get();
        if(count($settings) > 0) {
            Session::flash("info", "A Setting already exists edit it instead");
            return redirect("/admin/settings");
        }
        return view("admin.settings.form");
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
        $data["facebook"] = $request->facebook;
        $data["instagram"] = $request->instagram;
        $data["twitter"] = $request->twitter;
        $data["whatsapp"] = $request->whatsapp;
        $data["phone_1"] = $request->phone_1;
        $data["phone_2"] = $request->phone_2;
        $data["email_1"] = $request->email_1;
        $data["email_2"] = $request->email_2;
        Setting::create($data);
        Session::flash("success", "Setting was added successfully");
        return redirect("/admin/settings");
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
        $mode = ["edit" => true, "add" => false];
        return view("admin.settings.edit-form")->with("mode", $mode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $setting = Setting::find($id);

        $data = [];
        $data["facebook"] = $request->facebook;
        $data["instagram"] = $request->instagram;
        $data["twitter"] = $request->twitter;
        $data["whatsapp"] = $request->whatsapp;
        $data["phone_1"] = $request->phone_1;
        $data["phone_2"] = $request->phone_2;
        $data["email_1"] = $request->email_1;
        $data["email_2"] = $request->email_2;

        $setting->update($data);
        Session::flash("success", "Setting was updated successfully");
        return redirect("/admin/settings");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        Session::flash("success", "Setting was deleted successfully");
        return redirect("/admin/settings");
        
    }
}
