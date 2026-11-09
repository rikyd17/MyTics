<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/tickets', function (Request $request) {
    $data = $request->validate([
        'user_id' => 'required|exists:users,id',
        'event_id' => 'required|exists:events,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $event = \App\Models\Event::find($data['event_id']);

    $ticket = \App\Models\Ticket::create([
        'user_id' => $data['user_id'],
        'event_id' => $data['event_id'],
        'quantity' => $data['quantity'],
        'total_price' => $event->price * $data['quantity'],
        'status' => 'pending',
    ]);

    return response()->json($ticket, 201);
});