<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($task_id)
    {
        return view('comments.create',['task_id'=>$task_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $task_id)
    {
        Comment::create([
            
            'content' => $request->content,
            'task_id' => $task_id,
            'user_id' => Auth::id(),
        ]);

        $task = Task::find($task_id);
        return view('tasks.show',['task'=>$task]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
