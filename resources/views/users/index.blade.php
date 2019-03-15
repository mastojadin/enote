@extends('layouts.app')

@section('content')
    <div class="d-block m-5 p-5">
        <div class="row">
            <div class="col-md-2">ROLES</div>
            <div class="col-md-2">NEW USER</div>
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
            </tr>
        </thead>

        <tbody>
            @foreach ($all as $one)
                <td class="text-center">{{ $one->id }}</td>
                <td class="text-center">{{ $one->name }}</td>
                <td class="text-center">{{ $one->getRole->role }}</td>
                <td class="text-center">{{ $one->created_at }}</td>
                <td class="text-center">EDIT</td>
                <td class="text-center">DELETE</td>
            @endforeach
        </tbody>
    </table>
@endsection
