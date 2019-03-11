@extends('layouts.app')

@section('content')
    <div class="d-block">
        <form action="{{ route('logout') }}" method="POST" class="float-right">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-danger">LOG OUT</button>
        </form>
    </div>
@endsection
