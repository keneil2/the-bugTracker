<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Policies\BugPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBugRequest;
use App\Http\Requests\UpdateBugRequest;
use Illuminate\Support\Facades\Gate;
class BugController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bugs=Bug::all();
        return view("bugs.index",compact("bugs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view("bugs.bugForm");   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBugRequest $request)
    {
       $bug= $request->validate([
            "title"=>"required|regex:/^[A-Za-z0-9]+(\s+[A-Za-z0-9]+)*\s*$/|max:255",
            "type"=>"required|regex:/^[A-Za-z0-9]+(\s+[A-Za-z0-9]+)*\s*$/
            |max:255",
            "description"=>"required|regex:/^[A-Za-z0-9]+(\s+[A-Za-z0-9]+)\s$/",
            "category"=>$request->role,
        ]);
    //  dd($bug);
       Bug::create([
        "title"=>$request->title,
        "type"=>$request->type,
        "description"=>$request->description,
        "user_id"=>Auth::id(),
        "category"=>$request->role,
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bug $bug)
    {
        //
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
