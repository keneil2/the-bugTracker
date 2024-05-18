<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class userController extends Controller
{
    public function viewAllUsers()
    {
        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }
        $users = User::select(["name", "email", "role_id"])
            ->with("role:id,name")
            ->get();
        return view("admin.users", ["users" => $users]);
    }


    public function viewAllDevelopers()
    {
        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }
        $users = User::select("users.id","users.name", "email", "role_id")
            ->join("roles", "users.role_id", "=", "roles.id")
            ->where("roles.name", "=", "developer")->get();
        return view("admin.developers", ["users" => $users]);
    }

    public function edit($id){
        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }
        $user=User::findOrFail($id);
        return view("admin.updateadmin",compact("user"));
    }
    public function update(Request $request,$id){

        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }

        $request->validate([
          "name"=>["required","max:255","regex:/[A-Za-z0-9]+/"],
          "email"=>["required","email"]
        ]);

        $user=User::findOrFail($id);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
        ]);

        if($request->password!==null){
            $request->validate([
                "password"=>["required","regex:[A-Za-z0-9]+"]
            ]);
      $user->update([
        "password"=>$request->password
      ]);
        }

       
    }
    public function delete($id){
    
        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }
      User::destroy($id);
      return back()->with("deleteResponse","user deleted sucessfully");
    }




    public function create(Request $request){
        if (Gate::denies("isAdmin")) {
            return redirect()->route("bug.index");
        }
        $request->validate([
            "name"=>["required","regex:/[A-Za-z0-9]/","max:255"],
            "email"=>["required","email","unique:users,email"],
            "password"=>["required","max:3","confirmed"]
        ]);
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password
            ]);
    }


    public function showform(){
      $roles=Role::all();
      return view("admin.Register",compact("roles"));
    }
}
