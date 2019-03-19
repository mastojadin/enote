@extends('layouts.app')

@section('content')
    @include('parts.back_button', ['whereTo' => 'users'])

    <form action="{{ route('saveUser') }}" method="POST">
        <div class="form-group">
            <label for="role">ROLE</label>
            <select name="role" id="role" class="form-control">
                <option></option>
                @foreach ($roles as $one)
                    <option value="{{ $one->id }}">{{ $one->role }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">NAME</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">E-MAIL</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        {{ csrf_field() }}

        <div class="form-group">
            <button type="submit" class="btn btn-success form-control">SAVE NEW USER</button>
        </div>
    </form>
@endsection
