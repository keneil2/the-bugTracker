<?php

namespace App\Http\Controllers\Admin;
use App\Models\bug;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function ShowDashboard(){
    $bugs= bug::all();
    $Projects=Project::all();

      return view("admin.adminDashboard",["bugs"=>$bugs,"Projects"=>$Projects]);
   }
   function showassignmentpage($id){
      $users=User::all();
     return view("admin.assignment",[
      'project_id'=>$id,
       "users"=>$users
     ]);
   }
}
