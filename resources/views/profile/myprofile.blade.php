@extends('layouts.app')

@section('content')
    <form action="{{ route('updateAboutUser') }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <p>
                    <em>{{ $user->email }}</em>
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('profile_images' . $user->user_id) }}" alt="my profile image" class="img-thumbnail">
            </div>

            <div class="col-md-4">
                <label for="pic">MY PROFILE IMAGE</label>
                <input type="file" name="pic" id="pic" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="first_name">FIRST NAME</label>
            <input
                type="text"
                name="first_name"
                id="first_name"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->first_name }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="middle_name">MIDDLE NAME</label>
            <input
                type="text"
                name="middle_name"
                id="middle_name"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->middle_name }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="last_name">LAST NAME</label>
            <input
                type="text"
                name="last_name"
                id="last_name"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->last_name }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="parent_name">PARENT NAME</label>
            <input
                type="text"
                name="parent_name"
                id="parent_name"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->parent_name }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="phone_one">PHONE</label>
            <input
                type="text"
                name="phone_one"
                id="phone_one"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->phone_one }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="phone_two">PHONE</label>
            <input
                type="text"
                name="phone_two"
                id="phone_two"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->phone_two }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="address">ADDRESS</label>
            <input
                type="text"
                name="address"
                id="address"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->address }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="city">CITY</label>
            <input
                type="text"
                name="city"
                id="city"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->city }}"
                @endif
            >
        </div>

        <div class="form-group">
            <label for="state">STATE</label>
            <input
                type="text"
                name="state"
                id="state"
                class="form-control"
                @if ($user->getAboutUser != null)
                    value="{{ $user->getAboutUser->state }}"
                @endif
            >
        </div>

        {{ csrf_field() }}

        <input
            type="hidden"
            name="aboutuser_id"
            @if ($user->getAboutUser != null)
                value="{{ $user->getAboutUser->id }}"
            @endif
        >

        <button type="submit" class="btn btn-success form-control">UPDATE MY PROFILE</button>
    </form>
@endsection
