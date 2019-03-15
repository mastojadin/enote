@extends('layouts.app')

@section('content')

    <dic class="container">
        <div class="d-block m-5 p-5 text-ceenter">
            <form action="{{ route('login') }}" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="admin@admin.com" autofocus required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="lozinka" required>
                </div>

                {{ csrf_field() }}

                <button type="submit" class="btn btn-info form-control">ENTER</button>
            </form>
        </div>
    </dic>

@endsection
