<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrewerieController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SuggestController;

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
    return redirect()->route('breweriehome');
})->name ('home');

Route::get ('/login', [BrewerieController::class, 'login']);

Route::get ('/index', [BrewerieController::class, 'index'])->name('breweriehome');

Route::get ('/proposals/{user}', [BrewerieController::class, 'proposals'])->name('proposals');
Route::get ('/breweriebeers/{beer}', [BrewerieController::class, 'breweriebeers'])->name('breweriebeers');

Route::group(['middleware'=> 'auth'], function(){
    Route::get ('/brewerie', [BrewerieController::class, 'create'])->name('brewerie');
    Route::post('/brewerie', [BrewerieController::class, 'store']);

    Route::get ('/brewerie/{brewerie}/edit', [BrewerieController::class, 'edit'])->name('brewerieedit');
    Route::put('/brewerie/{brewerie}', [BrewerieController::class, 'update'])->name('brewerieupdate');
    Route::delete('/brewerie/{brewerie}', [BrewerieController::class, 'destroy'])->name('breweriedelete');

});

Route::get ('/brewerie/{id}', [BrewerieController::class, 'show'])->name('brewerieshow');

Route::get ('/brewery/{name}', [BrewerieController::class, 'friendly']);
Route::get ('/cerveceria/{name}', [BrewerieController::class, 'friendly']);

Route::resource('/beers', BeerController::class)->parameters('beers');

Route::get ('/about', function(){
    return view('about', ['empName' => 'aulab']);
})->name('about');

Route::get ('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

Route::get ('/brewery', [SuggestController::class, 'create']);
Route::post ('/brewery', [SuggestController::class, 'store'])->name('suggestbrewery');

/* Route::get ('/beers', [BeerController::class, 'index']);

Route::get ('/beer/{beer}', [BeerController::class, 'show']);

Route::get ('/beer/create', [BeerController::class, 'create']);
Route::post('/beer', [BeerController::class, 'store']);

Route::get ('/beer/{beer}/edit', [BeerController::class, 'edit']);
Route::post('/beer/{beer}', [BeerController::class, 'update']);

Route::post('/beer/{beer}', [BeerController::class, 'destroy']);
*/


Auth::routes();
//Route::get('/register', [App\Http\Controllers\BrewerieController::class, 'index']);
