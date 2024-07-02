@extends('layouts.app')

@section('content')
    
<section class="tw-text-gray-600 tw-body-font">
<div class="tw-container tw-px-5 tw-py-24 tw-mx-auto">
    @foreach ($tasks as $task)
        <div class="tw-flex tw-items-center lg:tw-w-3/5 tw-mx-auto tw-border-b tw-pb-10 tw-mb-10 tw-border-gray-200 sm:tw-flex-row tw-flex-col">
            <div class="sm:tw-w-32 sm:tw-h-32 tw-h-20 tw-w-20 sm:tw-mr-10 tw-inline-flex tw-items-center tw-justify-center tw-rounded-full tw-bg-pink-100 tw-text-pink-500 tw-flex-shrink-0 tw-overflow-hidden">

                    <img src="{{ asset('storage/' . $task->image_at) }}" style=" max-width: 150;  width: 115px;
            height: 115px;
            border-radius: 50%;">
                
            </div>
            <div class="tw-flex-grow sm:tw-text-left m-3 tw-text-center tw-mt-6 sm:tw-mt-0">
                <h2 class="tw-text-gray-900 tw-text-lg tw-title-font tw-font-medium tw-mb-2">{{ $task->title }}</h2>
                <p class="tw-leading-relaxed tw-text-base">{{ $task->body }}</p>
                
            </div>
            <div class="tw-flex tw-gap-2">
            
                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-lg tw-bg-white-100 tw-text-pink hover:tw-bg-pink-100 hover:tw-text-black" onclick='return confirm("Do you really want to delete this？");'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                    </button>
                </form>
                
            </div>
        </div>
    @endforeach
</div>
</section>


@endsection