<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        return view('tasks.index')
            ->with('tasks', Task::all());
        /*return "Hello World";*/
    }
    public function store(Request $request)
    {
        Task::create(request()->only(['title', 'description']));
        return redirect('tasks');
    }

}
