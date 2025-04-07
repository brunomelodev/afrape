<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PermissionUserController;
use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/me', [AuthApiController::class, 'me'])->name('auth.me')->middleware('auth:sanctum'); //passando middleware individual
Route::post('/logout', [AuthApiController::class, 'logout'])->name('auth.logout')->middleware('auth:sanctum'); //passando middleware individual
Route::post('/auth', [AuthApiController::class, 'auth'])->name('auth.login');

Route::get('/schools/first', [SchoolController::class, 'show'])->name('schools.show'); //lista os usuários
Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('/schools', [SchoolController::class, 'index'])->name('schools.index');


//Route::post('/address', [AddressController::class, 'store'])->name('address.store');


Route::middleware(['auth:sanctum', 'acl'])->group(function (){
    Route::apiResource('/permissions', PermissionController::class); //CRUD All Permissions


    Route::get('/users/{user}/permissions', [PermissionUserController::class, 'getPermissionsOfUser'])->name('users.permissions');
    Route::post('/users/{user}/permissions-sync', [PermissionUserController::class, 'syncPermissionsOfUser'])->name('users.permission.sync');


    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show'); //lista os usuários
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); //lista os usuários
});

//Route::get('/', fn () => response()->json(['message'=> 'ok']));
Route::get('/', function () {

    $connected = 'up';

    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        $connected = 'down';
    }

    return response()->json([
        'message' => 'ok',
        'database status' => $connected
    ]);
});
