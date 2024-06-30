<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>
        
        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"  required>
            </div>
            
            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="deadline">deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" class="form-control"  required>
            </div>
            
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
