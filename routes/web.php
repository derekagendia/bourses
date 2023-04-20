<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ScolarshipController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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
    return redirect('/login');
});

Route::get('/test', function () {
    Permission::create(['name' => 'manage_applications']);
    Permission::create(['name' => 'manage_scolarships']);
    Permission::create(['name' => 'manage_users']);
    $user = auth()->user();
    $user->syncPermissions(['manage_applications','manage_scolarships','manage_users']);
});




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('auth_welcome');
    })->name('dashboard');

    Route::get('/scolarships/{type}',[ScolarshipController::class,'index']);
    Route::get('/applications',[ApplicationsController::class,'index']);
    Route::get('/application/{type}/create',[ApplicationsController::class,'create']);
    Route::post('/application/store',[ApplicationsController::class,'store']);
    Route::get('/application/download/{id}',[ApplicationsController::class,'downloadPDF']);
    Route::get('/profile',[UsersController::class,'profile']);
    Route::post('/profile',[UsersController::class,'updateProfile']);
    Route::middleware(['can:manage_users'])->group(function ()
    {
        Route::get('/users/{type}',[UsersController::class,'index']);
        Route::get('/user/create',[UsersController::class,'create']);
        Route::get('/user/delete/{id}',[UsersController::class,'delete']);
        Route::post('/user/store',[UsersController::class,'store']);
        Route::get('/user/change-status/{id}',[UsersController::class,'changeStatus']);
    });

    Route::middleware(['can:manage_scolarships'])->group(function ()
    {
        Route::get('/settings',[ScolarshipController::class,'create']);
        Route::post('/scolarship/store',[ScolarshipController::class,'store']);
        Route::post('/scolarship/update',[ScolarshipController::class,'update']);
        Route::get('/scolarship/delete/{id}',[ScolarshipController::class,'delete']);

    });

    Route::middleware(['can:manage_applications'])->group(function ()
    {
        Route::get('/application/edit/{id}',[ApplicationsController::class,'edit']);
        Route::post('/application/change-status',[ApplicationsController::class,'changeStatus']);
    });

});

require __DIR__.'/auth.php';
