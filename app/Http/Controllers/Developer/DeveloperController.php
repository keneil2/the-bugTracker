<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\bug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DeveloperController extends Controller
{
    public function showAssignedBugs(){
        if(Gate::denies("isAssigned")){
        return abort(403);
        }
     $bugs=bug::select(["title","type","description","Status"])->where("user_id","=",Auth::id());
     return view("bugs.assignedbugs",["bugs"=>$bugs]);
    }
}
