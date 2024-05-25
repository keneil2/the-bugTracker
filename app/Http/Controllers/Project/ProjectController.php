<?php

namespace App\Http\Controllers\Project;
use App\Models\Project;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\Log;
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
      // render update form for Projects
      public function ShowUpdateForm($id){
        
        $Project=Project::findOrFail($id);
        $users=User::all()->where("role_id","!==",1)->where("role_id","!==",2)->where("role_id","!==",5);
      return view("ProjectManager.projectform",["project"=>$Project,"users"=>$users]);
      }

      public function update(Request $request,$id)
      {
      $request->validate([
        "title"=>"required|string|max:255",
        "manager"=>"required|string",
        "description"=>"required|string",
        "status"=>"required|string"
      ]);

      $project=Project::findOrFail($id);
      
      $this->authorize("update",$project);

      $project->update([
        "project_name"=>$request->title,
        "Project_Manager"=>$request->manager,
        "description"=>$request->description,
        "status"=>$request->status
      ]);
      }
      

}
