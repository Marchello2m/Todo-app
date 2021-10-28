<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        return view('tasks.index',['tasks'=>Task::all()]);
    }

    public function create()
    {
       return view('tasks.create');
    }
    public function form()
    {
        return view('tasks._form');
    }

    public function store(Request $request)
    {
        (new Task([
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'category_id'=>$request->get('category_id'),
        ]))->save();

      return  redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
      return view('tasks.edit',['task'=>$task]);
    }


    public function update(Request $request, Task $task)
    {
       $task->update([
           'title'=>$request->get('title'),
           'content'=>$request->get('content'),
           'category_id'=>$request->get('category_id'),
       ]);
        if (isset($request->status)) {
            $status = true;
        } else {
            $status = false;
        }


        $task->status = $status;

        $task->save();

     return  redirect()->route('tasks.edit',$task);
    }


    public function destroy(Task $task)
    {
        $task->delete();
      return  redirect()->route('tasks.index');
    }




}
