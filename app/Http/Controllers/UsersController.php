<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $users = User::orderBy("created_at", "desc")->paginate(8);
        return view("admin.users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        return view("admin.users.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role !== 'admin') { return redirect("/admin"); }
        $data = [];
        if($request->isMethod("POST")) {
            $this->validate($request,
                [
                    "first_name" => "required|max:50|min:2",
                    "last_name" => "required|max:50|min:2",
                    "email" => "required|email|unique:users|max:255",
                    "role" => "required",
                    "photo" => "required|mimes:jpeg,png,gif,bmp",
                    "password" => "required|min:8|confirmed",
                ]
            );
            if($request->hasfile("photo")) {
                $name = time().$request->photo->getClientOriginalName();
                $data["photo"] = $name;
                $request->photo->move(public_path("/images/users"), $name);
            }
            $data["first_name"] = $request->first_name;
            $data["last_name"] = $request->last_name;
            $data["email"] = $request->email;
            $data["role"] = $request->role;
            $data["password"] = Hash::make($request->password);
            User::create($data);
            Session::flash("success", "User was added successfully");
            return redirect("/admin/users");
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
        return redirect("/admin/users");
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
        $user = User::find($id);
        $mode = ["edit" => true, "add" => false];
        return view("admin.users.edit-form")->with(["mode" => $mode, 'user' => $user]);
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
        $user_pass = Auth::user()->password;
        $user = User::findOrFail($id);
        $data = [];
        if($request->isMethod("PUT")) {
            $this->validate($request,
            [
                "role" => "required",
                "password" => "required"
            ]);
            $match = password_verify($request->password, $user_pass);
            if($match) {
                $data["role"] = $request->role;
                $user->update($data);
                Session::flash("success", "User was update successfully");
                return redirect("/admin/users");
            } else {
                Session::flash("warning", "Your password is incorrect");
               return redirect()->back();
            }
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
        $user = User::find($id);
        if($user) {
            $file = public_path()."/images/users/$user->photo";
            if(file_exists($file)) {
                unlink($file);
            }
            $user->delete();
            Session::flash("success", "User was deleted successfully");
            return redirect("/admin/users");
        }
    }
}
