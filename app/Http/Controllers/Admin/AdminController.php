<?php

namespace App\Http\Controllers\Admin;
use App\Models\bug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function ShowDashboard(){
      return view("admin.adminDashboard",[ "bugs" => bug::all() ]);
   }
}
