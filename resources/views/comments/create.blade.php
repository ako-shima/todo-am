<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Comment</h1>
        
        <form action="" method="POST">
            @csrf
            <input type="number" hidden name="task_id" value="{{ $task_id }}">
            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>

            
            <button type="submit" class="btn btn-primary">Create Comment</button>
        </form>
    </div>
@endsection
