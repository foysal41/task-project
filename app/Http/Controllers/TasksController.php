<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    function index(Request $request){
        $user = $request->user();
        $tasks = Task::where('user_id', $user->id)->get();
        return view('tasks.tasks', ['tasks' => $tasks]);
    }

    function store(Request $request){

        $current_user = $request->user()->id;
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->status = $request->status;
        $task->user_id = $current_user;
        $task->save();
        return redirect()->route('tasks.index');
    }

    function destroy(Request $request, Task $task){
        $user = $request->user();
        if($user->id == $task->user_id){
            $task->delete();
            return redirect()->route('tasks.index');
        }else{
            abort(403 , "you don't have permission to delete this task");
        }
    }
}
