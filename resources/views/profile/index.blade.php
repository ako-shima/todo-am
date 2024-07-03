@extends('layouts.app')

@section('content')

<h1 class="tw-text-black-900" style="text-align: center; font-size: 2em; margin:50px">My Page</h1>

@if(session('success'))
    <div class="alert alert-success custom-alert">
        {{ session('success') }}
    </div>
@endif
<form class="edit-form" method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name：  {{ ucfirst(Auth::user()->name) }}</label>
        {{-- <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required> --}}
    </div>

    <div class="form-group">
        <label for="email">Email：  {{ ucfirst(Auth::user()->email) }}</label>
        
    </div>

    <a href="{{ route('profile.edit') }}" class="p-3 rounded btn" style="background-color: pink; color: black;">
        Edit Profile
    </a>

</form>



<section class="tw-text-gray-600 tw-body-font">
        <div class="tw-container tw-px-5 tw-py-24 tw-mx-auto">
            <h2 class="tw-text-black-900" style="text-align: center; font-size: 2em; margin:50px">My Task</h2>

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
                        <button class="btn btn-lg tw-bg-white-100 tw-text-pink hover:tw-bg-pink-100 hover:tw-text-black" onclick="window.location='{{ route('comments.create', $task->id) }}'"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                          <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        </svg>
                      </button>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-lg tw-bg-white-100 tw-text-pink hover:tw-bg-pink-100 hover:tw-text-black">
                          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg>
                        </a>
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
                        <form method="POST" action="{{ route('tasks.completed', $task->id) }}">
                          @csrf
                          @method('patch')
                          <button type="submit" class="btn btn-lg tw-bg-white-100 tw-text-pink hover:tw-bg-pink-100 hover:tw-text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                              <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                              <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                            </svg>
                           
                          </button>
                      </form>
                    </div>
                </div>
            @endforeach
        </div>
</section>
    

@push('scripts')
<script>
    $(document).ready(function() {
        $('.toggle-password').click(function() {
            $(this).toggleClass('active');
            var input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
                $('#password-toggle-icon').removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                input.attr('type', 'password');
                $('#password-toggle-icon').removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });
    });
</script>


@endpush



@endsection

