<?php

namespace App\Http\Controllers;

use App\Models\bug;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, bug $bug){
        // dd($bug);
   $request->validate([
    "comment"=>"required|string",
    ]);
    Comment::create([
       "comments"=>$request->comment,
       "user_id"=>Auth::id(),
       "bug_id"=>$bug->id,
       ]);
       return back();
    }
}
