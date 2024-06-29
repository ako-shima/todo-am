<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>
        
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            </div>
            
            <div class="form-group pb-3" >
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control">{{ old('body', $task->body) }}</textarea>
            </div>
            
            <button type="submit" class="p-3 rounded bg-pink-300">Update Task</button>
        </form>
    </div>
@endsection
