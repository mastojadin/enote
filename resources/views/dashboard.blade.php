@extends('layouts.app')

@section('content')
    <div class="d-block" style="overflow:hidden;">
        <div class="d-block float-left">
            {{ auth()->user()->name }}
            <br>
            {{ var_dump(auth()->user()->role_id) }}
        </div>

        <form action="{{ route('logout') }}" method="POST" class="float-right">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-danger">LOG OUT</button>
        </form>
    </div>

    <div class="d-block p-5">
        @if (auth()->user()->role_id === 1)
            <a href="{{ route('logs') }}" class="btn btn-primary">LOGS</a>
        @endif
    </div>
@endsection
