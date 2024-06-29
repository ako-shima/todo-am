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
        $task = new Task;
       
        $task->title = $request->title;
        $task->contents = $request->contents;
        $task->image_at = $request->image_at;
        
        $task->user_id = Auth::id();
        $task->save();
    
        return redirect()->route('tasks.index');
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
        $task = Task::find($id);

        $task -> title = $request -> title;
        $task -> contents = $request -> contents;
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