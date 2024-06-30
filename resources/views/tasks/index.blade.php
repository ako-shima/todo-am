<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    @vite('resources/css/app.css')
</head>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      @foreach ($tasks as $task)
        {{-- @if ($loop->odd) --}}
          <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
            <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 flex-shrink-0">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
              <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $task->title }}</h2>
              <p class="leading-relaxed text-base">{{ $task->body }}</p>
              <a href="{{ route('tasks.show', $task) }}" class="mt-3 text-pink-500 inline-flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>

            {{-- <div class="comments">
              <div class="comment-lists">
                @foreach($task->comments as $comment)
                  <div class="comment flex">
                    <div>{{ $comment->content }}</div>
                  </div>
                @endforeach
              </div>

            </div> --}}
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
              {{-- <script>
                function confirmDelete(){
                  return confirm('Do you really want to delete this?')
                }
              </script> --}}
              
              <button class="p-3 rounded bg-pink-500">
                done
              </button>
            </div>
          </div>
        {{-- @else
        <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
          <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $task->title }}</h2>
            <p class="leading-relaxed text-base">{{ $task->body }}</p>
            <a class="mt-3 text-pink-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
          <div class="sm:w-32 sm:order-none order-first sm:h-32 h-20 w-20 sm:ml-10 inline-flex items-center justify-center rounded-full bg-pink-100 text-pink-500 flex-shrink-0">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
              <circle cx="6" cy="6" r="3"></circle>
              <circle cx="6" cy="18" r="3"></circle>
              <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
            </svg>
          </div>
          <button class="p-3">edit</button>
            <button class="p-3">delete</button>
        </div>
        @endif --}}
      @endforeach
      <button class="flex ml-auto text-black  border-0 py-2 px-8 focus:outline-none rounded text-5xl" onclick="window.location='{{ route('tasks.create') }}'">+</button>
    </div>
  </section>

    {{-- <footer class="bg-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-4 text-center">
            <p class="text-white text-sm">Todo Application</p>
        </div>
    </div>
    </footer> --}}
</body>

</html>