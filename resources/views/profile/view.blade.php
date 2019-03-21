@extends('layouts.app')

@section('content')
    @include('parts.back_button', ['whereTo' => 'users'])

    <div class="d-block m-5 border">
        <div class="row">
            <div class="col-md-4">
                <p class="text-center">
                    <em>{{ $user->name }}</em>
                </p>
            </div>

            <div class="col-md-4">
                <p class="text-center">
                    <em>{{ $user->email }}</em>
                </p>
            </div>

            <div class="col-md-4">
                <img src="{{ asset('profile_images' . $user->user_id) }}" alt="my profile image" class="img-thumbnail">
            </div>
        </div>

        @if ($user->getAboutUser != null)
            @foreach($user->getAboutUser as $key => $value)
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-center">
                            {{ $key }}
                        </p>
                    </div>

                    <div class="col-md-6">
                        <p class="text-center">
                            {{ $value }}
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
