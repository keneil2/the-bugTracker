<?php

namespace App\Http\Controllers;

use App\Events\SendBugtoQA;
use App\Models\bug;
use App\Models\User;
use Illuminate\Http\Request;

class Resolvedbugs extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function showResolved()
    {
        $Fixedbug = bug::where("status", '=', "Fixed")->get();
        $users=User::where("role_id","=",4)->get();
        return view("admin.resolveBugs", ["Fixedbugs" => $Fixedbug,"users"=>$users]);
    }
    public function sendToQA(Request $request,$id){
       $request->tester_id;
       bug::where("id","=",$id)->update([
        "assigned_to"=>$request->tester_id,
       ]);
       event(new SendBugtoQA);
    }
}
