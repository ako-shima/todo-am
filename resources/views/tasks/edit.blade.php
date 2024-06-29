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
            
            <div class="form-group">
                <label for="contents">Contents</label>
                <textarea name="contents" id="contents" class="form-control">{{ old('contents', $task->contents) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
