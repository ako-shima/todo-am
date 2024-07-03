@extends('layouts.app')

@section('content')
<!-- Edit Form -->
<h1 class="tw-text-black-900" style="text-align: center; font-size: 2em; font-weight: bold; margin:50px">Edit Profile</h1>

<form class="edit-form" method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
    </div>

    <div class="form-group">
        <label for="password">New Password:</label>
        <div class="input-group">
            <input id="password" type="password" name="password" class="form-control" autocomplete="new-password">
            <div class="input-group-append">
                {{-- <button type="button" class="btn btn-outline-secondary toggle-password" toggle="#password">
                    <i id="password-toggle-icon" class="bi bi-eye"></i>
                </button> --}}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
    </div>

    <button type="submit"  class="p-3 rounded btn " style="background-color: pink; color:black">Update Profile</button>
</form>

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