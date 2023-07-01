<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
    return view('welcome');
});

Route::resource('roles', App\Http\Controllers\Base\RolesController::class);
Route::resource('permissions', App\Http\Controllers\Base\PermissionsController::class);

Route::get('/dashboard', function () {
    // dd("ASD");
    $user = User::find(1);
    $role = Role::find(1);
    $permissions = Permission::pluck('id','id')->all();
    $role->syncPermissions($permissions);
    $user->assignRole([1]);
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
