<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Comment</h1>
        
        <form action="{{ route('comments.store', $task_id) }}" method="POST">
            @csrf
            
            <div class="form-group py-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>

            
            <button type="submit" class="p-3 rounded bg-pink" style="background-color:rgb(249, 168, 212); border-style: none" >Create Comment</button>
            
        </form>
    </div>
@endsection
