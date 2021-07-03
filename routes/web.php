<?php

use App\Http\Controllers\TopicsController;
use Illuminate\Support\Facades\App;
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

Route::redirect('/', app()->getLocale());

Route::group([
    'prefix' => '{language}',
    'where' => ['locale' => '[a-z]{2}'],
], function () {
    Route::get('/', function () {
        return view('homepage');
    });

    Route::redirect('/topic', '/#seeTopic');
    Route::post('/topic', [TopicsController::class, 'store'])->name('topic-store');
    Route::get('/topic/{topic}', [TopicsController::class, 'show'])->name('topic-show');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__ . '/auth.php';
