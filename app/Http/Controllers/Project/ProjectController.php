<?php

namespace App\Http\Controllers\Project;
use App\Models\Project;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\ProjectPolicy;
class ProjectController extends Controller
{

    public function viewAll(){
        $projects=Project::all();
        
  return view("bugs.index",compact("projects"));
    }
    public function create(){
      $this->authorize("createPolicy",Project::class);
      
        return view("admin.projectForm");
      }
      public function storeProject(Request $request, $id)
      {
        // if(Auth::user()->cannot("createProject")){
        //  return abort(404);
        // } 
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
