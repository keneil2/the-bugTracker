<?php

use App\Http\Middleware\Disabledebugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/pusher/auth', function (Illuminate\Http\Request $request) {
    if (Auth::check()) {
        if(Auth::user()->hasRole("admins")){
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            ['cluster' => env('PUSHER_APP_CLUSTER')]
        );

        $auth = $pusher->socket_auth($request->channel_name, $request->socket_id);
        Log::info('Pusher Auth Success:', ['auth' => $auth]);
        return response($auth, 200);
    } else {
        Log::error('Pusher Auth Forbidden: User not authenticated');
        return response('Forbidden', 403);
    }}})->middleware(['web', 'auth',Disabledebugbar::class]);