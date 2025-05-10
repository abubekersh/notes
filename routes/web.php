<?php

use App\Http\Controllers\NoteController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/notes', [NoteController::class, 'index']);
    Route::get('/notes/create', [NoteController::class, 'create']);
    Route::get('notes/{id}/note', [NoteController::class, 'show']);
    Route::get('/notes/{id}/edit', [NoteController::class, 'edit']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::delete('/notes/{id}', [NoteController::class, 'delete']);
    Route::patch('/notes', [NoteController::class, 'update']);
    Route::get('/notes/trash', [NoteController::class, 'trash']);
    Route::post('/notes/{id}/restore', [NoteController::class, 'restore']);
});
Route::get('/admin', [NoteController::class, 'dashboard'])->middleware(['auth', 'admin']);
Route::delete('/user/{id}', function (int $id) {
    User::destroy($id);
    return redirect('/admin');
})->middleware(['auth', 'admin']);
Route::fallback(function () {
    return abort(404);
});

require __DIR__ . '/auth.php';
