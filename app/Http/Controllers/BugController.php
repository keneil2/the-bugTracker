<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\User;
use App\Policies\BugPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Project;
class BugController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Projects=Project::all();
        return view("bugs.index",compact("Projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
     $request->validate([
        "id"=>"required|numeric"
     ]);
     return view("bugs.bugForm",["id"=>$request->id]);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBugRequest $request)
    {
       $bug= $request->validate([
            "title"=>"required|string|max:255",
            "type"=>"required|string
            |max:255",
            "Priority"=>"required|string",
            "severity"=>"required|string",
            "description"=>"required|string",
            "id"=>"required|numeric"
        ]);
    //  dd($bug);
       bug::create([
        "title"=>$request->title,
        "type"=>$request->type,
        "description"=>$request->description,
        "priority"=>$request->Priority,
        "severity"=>$request->severity,
        "user_id"=>Auth::id(),
        "project_id"=>$request->id,
        "assigned_to"=>2
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bug=bug::findOrFail($id);
        $users=User::all();
        return view("admin.assignBugs",["bug"=>$bug,'users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bug $bug)
    { 
        if(Auth::guest()){
     return redirect()->route("login");
        }
        return view("bugs.update",compact("bug"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBugRequest $request,bug $bug)
    {
        
         $this->authorize("update",$bug);
    //    $post=Bug::findOrFail($id);
       $bug->update([
        "title"=>$request->title,
        "type"=>$request->type,
        "description"=>$request->description
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bug $bug)
    {
        $this->authorize("delete",$bug);
       if ($bug->deleteOrFail()){
        return redirect("/home")->with("sucess","$bug->name deleted sucessfully");
       }
         
    }
}
