@extends('layouts.app')

@section('content')
    <div class="d-block m-5 p-5">
        <div class="row">
            <div class="col-md-2">
                @if (auth()->user()->role_id === 1) {{-- super--}}
                    <a href="{{ route('roles') }}" class="btn btn-info">ROLES</a>
                @endif
            </div>
            <div class="col-md-2">
                <a href="{{ route('newUser') }}" class="btn btn-info">NEW USER</a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Role</th>
                <th class="text-center">Date of creation</th>
                <th class="text-center"></th>
                <th class="text-center"></th>
                <th class="text-center"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($all as $one)
                <tr>
                    <td class="text-center">{{ $one->id }}</td>
                    <td class="text-center">{{ $one->name }}</td>
                    <td class="text-center">{{ $one->getRole->role }}</td>
                    <td class="text-center">{{ $one->created_at }}</td>
                    <td class="text-center">
                        @if ($one->getRole->id >= auth()->user()->role_id) {{-- logged user role id is better ( better ranking ) then viewed users role id --}}
                            <a href="{{ route('viewProfile', $one->id) }}" class="btn btn-info">VIEW</a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($one->getRole->id >= auth()->user()->role_id) {{-- logged user role id is better ( better ranking ) then viewed users role id --}}
                            <a href="{{ route('editUser', $one->id) }}" class="btn btn-warning">EDIT</a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($one->getRole->id >= auth()->user()->role_id && $one->getRole->id !== 1) {{-- logged user role id is better ( better ranking ) then viewed users role id & cannot delete super user --}}
                            <form action="{{ route('deleteUser') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="delete_userID" value="{{ $one->id }}">
                                <button type="submit" class="btn btn-danger deletebtn">DELETE</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
