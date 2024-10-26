<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; 

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
Route::get('/addtask',[TaskController::class,'index'])->name('addtask');
Route::post('/task_store',[TaskController::class,'store'])->name('task.store');
Route::get('/viewtask',[TaskController::class,'view'])->name('viewtask');
Route::get('/edit_task/{task_id}',[TaskController::class,'edit'])->name('edit_task');
Route::post('/update_task/{task_id}',[TaskController::class,'update'])->name('task.update');
Route::delete('/delete_task/{task_id}',[TaskController::class,'delete'])->name('task.delete');

Route::get('/time',function()
{
echo date_default_timezone_get(); 
});