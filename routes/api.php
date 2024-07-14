<?php

use App\Http\Middleware\Disabledebugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/pusher/auth', function (Illuminate\Http\Request $request) {
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        ['cluster' => env('PUSHER_APP_CLUSTER')]
    );
    if (Auth::check()) {
        if(Auth::user()->hasRole("admins")){
        $auth = $pusher->socket_auth($request->channel_name, $request->socket_id);
        Log::info('Pusher Auth Success:', ['auth' => $auth]);
        return response($auth, 200);
    } else if(Auth::user()->hasRole("tester")){

        $auth = $pusher->socket_auth($request->channel_name, $request->socket_id);
        Log::info('Pusher Auth Success:', ['auth' => $auth]);
        return response($auth, 200);
    }else{
        Log::error('Pusher Auth Forbidden: User not authenticated');
        return response('Forbidden', 403);
    }}})->middleware(['web', 'auth',Disabledebugbar::class]);

    








    Route::get('/user-role', function () {
        if (Auth::check()) {
            return response()->json(['role' => Auth::user()->role->name]);
        }
        return response()->json(['role' => null]);
    })->middleware('auth');