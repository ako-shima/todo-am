<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //メソッド = 技
    //function index()←これが一つのメソッド。indexメソッドという
    function index()
    {
        $tasks = Task::where('is_completed', 0)->get();
        // dd($tasks);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:140',
            'deadline' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
    if ($request->hasFile('image')) {
        // 画像を保存
        $path = $request->file('image')->store('images', 'public');
    }

    Task::create([
        'title' => $request->title,
        'body' => $request->body,
        'deadline' => $request->deadline,
        'image_at' => $path,
        'user_id' => Auth::id(),
    ]);
    
        return redirect()->route('tasks.index');
    }

    public function getCompleted()
    {
        $tasks = Task::where('is_completed', 1)->get();
        // dd($tasks);
        return view('tasks.completed-task', ['tasks' => $tasks]);
    }

    function show($id)
    {
        // dd($id);
        $task = Task::find($id);
        return view('tasks.show',['task'=>$task]);
    }

    // 更新処理
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'body' => 'required|string|max:140',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $task = Task::find($id);

        $task -> title = $request -> title;
        $task -> body = $request -> body;
        $task -> deadline = $request -> deadline;


    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $task->image_at = $path;
    }

        $task -> save();

        return view('tasks.show', ['task'=>$task]);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
        }

    // 編集フォームの表示
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task -> delete();

        return redirect()->route('tasks.index')->with('success', 'It has been deleted.' );
    }

    function completed($id)
    {
        $task = Task::find($id);

        $task -> is_completed = 1;

        $task -> save();

        return redirect()->route('tasks.index')->with('success', 'Task completed.' );
    }
}