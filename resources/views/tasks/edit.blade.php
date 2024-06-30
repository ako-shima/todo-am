<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

<style>
    .bg-pink {
        --tw-bg-opacity: 1;
        background-color: rgb(249 168 212 / var(--tw-bg-opacity));
        border: none
    }
</style>

@section('content')
    <div class="container">
        <h1>Edit Task</h1>
        
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="d-flex">
                <div>
                    {{-- <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div> --}}
                    @if($task->image)
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $task->image) }}" alt="Image" style="max-width: 200px;">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                    </div>
                    
        
                    <div class="form-group pb-3" >
                        <label for="body">Body</label>
                        <textarea name="body" id="body" class="form-control">{{ old('body', $task->body) }}</textarea>
        
                    </div>
                </div>
    
                
            </div>
        @endif
            {{-- <button type="submit" class="p-3 rounded bg-pink-300">Update Task</button> --}}
            <button type="submit" class="p-3 rounded bg-pink" onclick='countCharacters()'>
                Update Task
            </button>
        </form>
    </div>

    <script>
        function countCharacters() {
            var inputTitle = document.getElementById('title').value.length;
            var inputBody = document.getElementById('body').value.length;
            if(inputBody > 140) {
                alert("Body maximum letters exceeded from limit 140")
            }
            if(inputTitle > 30) {
                alert("Title maximum letters exceeded from limit 30")
            }
        }
    </script>
@endsection
