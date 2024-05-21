<?php

namespace App\Http\Controllers\Project;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function viewAll(){
        $projects=Project::all();
        
  return view("bugs.index",compact("projects"));
    }
    public function create(){
        return view("admin.projectForm");
      }
      public function storeProject(Request $request, $id)
      {
          $request->validate([
              "name" => "required|string",
              "Manager" => "required|string",
              "description" => "required|string",
              "start_Date" => "required|date",
              "End_date" => "required|date",
          ]);
  
          Project::create([
              "Project_name" => $request->name,
              "Project_Manager" => $request->Manager,
              "description" => $request->description,
              "start_Date" => $request->start_Date,
              "End_date" => $request->End_date,
              "user_id" => $id
          ]);
      }
}
