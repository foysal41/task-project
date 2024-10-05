<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    function index(Request $request){
        return view('tasks.tasks');
    }

 
}
