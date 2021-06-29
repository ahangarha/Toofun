<?php

use App\Http\Controllers\TopicsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/topics', [TopicsController::class, 'index'])->name('topic-index');
Route::post('/topics', [TopicsController::class, 'store'])->name('topic-store');
Route::get('/topics/create', [TopicsController::class, 'create'])->name('topic-create');
Route::get('/topics/{topic}', [TopicsController::class, 'show'])->name('topic-show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
