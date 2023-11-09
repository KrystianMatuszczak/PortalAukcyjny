<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionContoller;
use App\Http\Controllers\ShipmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::name('users.')->prefix('users')->group(
  function(){
      Route::get('',[UserController::class, 'index'])
          ->name('index')
          ->middleware(['permission:users.index']);
  });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('categories', CategoryController::class)->only([
  'index', 'create', 'edit'
])->middleware(['auth', 'verified']);

Route::resource('conditions', ConditionContoller::class)->only([
  'index'
]);

Route::resource('shipments', ShipmentController::class)->only([
  'index', 'create', 'edit'
])->middleware(['auth', 'verified']);

Route::get('async/categories', [CategoryController::class, 'async'])
  ->name('async.categories');

  Route::get('async/shipments', [ShipmentController::class, 'async'])
  ->name('async.shipments');

Route::resource('products', ProductController::class)->only([
    'index', 'create', 'edit', 'show'
  ])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
