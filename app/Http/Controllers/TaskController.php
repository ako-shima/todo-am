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
        $tasks = Task::all();
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
            'image_at' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'image_at' => $request->image_at,
            'user_id' => Auth::id(),
        ]);
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
            // 'image_at' => 'nullable|string',
        ]);

        $task = Task::find($id);

        $task -> title = $request -> title;
        $task -> body = $request -> body;
        $task -> save();

        return view('tasks.show', ['task'=>$task]);
        }

    // 編集フォームの表示
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task -> delete();

        return redirect()->route('tasks.index');
    }
}