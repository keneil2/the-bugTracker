<?php

namespace App\Http\Controllers\Admin;
use App\Models\bug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function ShowDashboard(){
    $bugs= bug::all() ;
      return view("admin.adminDashboard",compact("bugs"));
   }
   
}
