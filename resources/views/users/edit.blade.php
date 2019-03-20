@extends('layouts.app')

@section('content')
    @include('parts.back_button', ['whereTo' => 'users'])

    <form action="{{ route('updateUser') }}" method="POST">
        <div class="form-group">
            <label for="role">ROLE</label>
            <select
                name="role"
                id="role"
                class="form-control"
                required="required"
            >
                <option></option>
                @foreach ($roles as $one)
                    <option
                        value="{{ $one->id }}"
                        @if ($user->role_id == $one->id)
                            {{ 'selected' }}
                        @endif
                    >{{ $one->role }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">NAME</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                pattern="[a-zA-Z0-9]+"
                required="required"
                value="{{ $user->name }}"
            >
        </div>

        <div class="form-group">
            <label for="email">E-MAIL</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                required="required"
                value="{{ $user->email }}"
            >
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input
                type="text"
                name="password"
                id="password"
                class="form-control"
            >
        </div>

        {{ csrf_field() }}

        <input type="hidden" name="edit_userID" value="{{ $user->id }}">

        <div class="form-group">
            <button type="submit" class="btn btn-warning form-control">EDIT USER</button>
        </div>
    </form>
@endsection
