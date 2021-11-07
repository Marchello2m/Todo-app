<?php


use App\Http\Controllers\TaskController;
use App\Models\Category;
use App\Models\Task;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('tasks', TaskController::class);
Route::post('tasks/{task}/complete',[TaskController::class,'complete'])
    ->middleware('auth')
    ->name('tasks.complete');
Route::post('tasks/{task}/unComplete',[TaskController::class,'unComplete'])
    ->middleware('auth')
    ->name('tasks.unComplete');


Route::get('/dumpster', function () {
    return view('tasks.dumpster');
});

Route::get('/tasks/{id}/restore',function (int $id){
    $task=\App\Models\Task::withTrashed()->find($id);
    $task->restore();
    return $task;
});
Route::get('/dumpster',function (){

    $tasks =Task::onlyTrashed()->get();
    foreach($tasks as $task){
        echo "----------<br>";
        echo $task->title."<br>";

        echo $task->content."<br>";
        echo "----------<br>";
    }
    return view('tasks.dumpster');
});

require __DIR__ . '/auth.php';
