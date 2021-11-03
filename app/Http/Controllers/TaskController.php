<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->orderBy('completed_at', 'DESC')
            ->get();

        return view('tasks.index', ['tasks' => $tasks]);
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
        $task = (new Task([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category_id'),
        ]));
        $task->user()->associate(auth()->user());
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }


    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category_id' => $request->get('category_id'),

        ]);

        return redirect()->route('tasks.edit', $task);
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function complete(Task $task): RedirectResponse
    {
        $task->update([
            'completed_at' => now()
        ]);


        return redirect()->back();
    }

    public function unComplete(Task $task): RedirectResponse
    {

        $task->update([
            'completed_at' => null
        ]);


        return redirect()->back();
    }


}
