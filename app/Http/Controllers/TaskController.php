<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Task;

// class TaskController extends Controller
// {
//     function index()
//     {
//         $tasks = Task::all();
//         return view('tasks.index', ['task' => $tasks]);
//     }
// }

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {

        return view('tasks.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'contents' => 'required|string|max:140',
            'image_at' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'image_at' => $request->image_at,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    // 他のメソッドも同様に定義します。
}

