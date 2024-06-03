<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function shownotification(){
       return view("bugs.notifications");  
    }
}
