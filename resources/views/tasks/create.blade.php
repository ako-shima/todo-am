<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>
        
        <form action="{{ route('tasks.store') }}" method="POST">
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
                <label for="image_at">image_at</label>
                <input type="text" name="image_at" id="image_at" class="form-control"  required>
            </div>

            
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
