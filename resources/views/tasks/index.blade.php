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
                  <p class="tw-leading-relaxed tw-text-base">{{ $task->deadline }}
                      <a href="{{ route('tasks.show', $task) }}" class="tw-mt-3 tw-text-pink-500 tw-inline-flex tw-items-center tw-pl-8">
                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="tw-w-4 tw-h-4 tw-ml-2" viewBox="0 0 24 24">
                              <path d="M5 12h14M12 5l7 7-7 7"></path>
                          </svg>
                          <span>Read More</span>
                      </a>
                  </p>
              </div>
              <div class="tw-flex tw-gap-2">
                  <button class="tw-p-3 tw-rounded tw-bg-pink-200" onclick="window.location='{{ route('comments.create', $task->id) }}'">comment</button>
                  <a href="{{ route('tasks.edit', $task->id) }}" class="tw-p-3 tw-rounded tw-bg-pink-300">edit</a>
                  <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                      @csrf
                      @method('delete')
                      <button class="tw-p-3 tw-rounded tw-bg-pink-400" type="submit" onclick="return confirm('Do you really want to delete this?')">delete</button>
                  </form>
                  <button class="tw-p-3 tw-rounded tw-bg-pink-500">done</button>
              </div>
          </div>
      @endforeach
      <button class="add-post tw-flex ml-auto tw-text-black  tw-border-0 tw-py-2 tw-px-8 tw-focus:outline-none tw-rounded tw-text-5xl" onclick="window.location='{{ route('tasks.create') }}'">+</button>

      {{-- <button class="tw-add-post tw-flex tw-ml-auto tw-text-black tw-border-0 tw-py-2 tw-px-8 tw-focus:outline-none tw-rounded tw-text-5xl" onclick="window.location='{{ route('tasks.create') }}'">+</button> --}}
  </div>
</section>

{{-- <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      @foreach ($tasks as $task)
       
          <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 flex-shrink-0">
             
              
         
              <img src="{{ asset('storage/' . $task->image_at) }}" alt="Image" style="max-width: 150;  width: 125;
            height: 100px;
            border-radius: 50%;
 ">
         
            
      
            </div>
            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $task->title }}</h2>
              <p class="leading-relaxed text-base">{{ $task->body }}</p>
              <p class="leading-relaxed text-base">{{ $task->deadline }} <a href="{{ route('tasks.show', $task) }}" class="mt-3 text-pink-500 inline-flex items-center pl-8">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg><span>Read More</span>
              </a></p>

              
            </div>


          
            <div class="flex gap-2">
              <button class="p-3 rounded bg-pink-200" onclick="window.location='{{ route('comments.create', $task->id) }}'">
                comment
              </button>
              <a href="{{ route('tasks.edit', $task->id) }}" class="p-3 rounded bg-pink-300">edit</a>
              <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                @csrf
                @method('delete')
                <button class="p-3 rounded bg-pink-400" type="submit" onclick="return confirm('Do you really want to delete this?')">delete</button>
              </form>
              
              <button class="p-3 rounded bg-pink-500">
                done
              </button>
            </div>
          </div>
        
      @endforeach
      <button class="add-post flex ml-auto text-black  border-0 py-2 px-8 focus:outline-none rounded text-5xl" onclick="window.location='{{ route('tasks.create') }}'">+</button>
    </div>
</section> --}}

    @endsection