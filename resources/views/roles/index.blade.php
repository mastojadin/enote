@extends('layouts.app')

@section('content')
    @include('parts.back_button', ['whereTo' => 'users'])

    <div class="d-block p-5">
        <form action="{{ route('saveRole') }}" method="POST">
            <div class="form-group">
                <label for="role">NEW ROLE</label>
                <input
                    type="text"
                    name="role"
                    id="role"
                    class="form-control"
                    required="required"
                    autocomplete="off"
                    pattern="[a-z]+"
                >
            </div>

            {{ csrf_field() }}
            <button type="submit" class="btn btn-success form-control">SAVE NEW ROLE</button>
        </form>
    </div>

    <table class="table table-bordered">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">ROLE</th>
            <th class="text-center"></th>
            <th class="text-center"></th>
        </tr>

        @foreach($all as $one)
            <tr>
                <td class="text-center">{{ $one->id }}</td>
                <td class="text-center">
                    <form action="{{ route('updateRole') }}" method="POST">
                        <input
                            type="text"
                            name="edit_role"
                            id="new_role"
                            class="form-control"
                            value="{{ $one->role }}"
                            required="required"
                            autocomplete="off"
                            pattern="[a-z]+" 
                        >
                </td>
                <td class="text-center">
                        <input type="hidden" name="edit_roleID" value="{{ $one->id }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">EDIT</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('deleteRole') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="delete_roleID" value="{{ $one->id }}">
                        <button type="submit" class="btn btn-danger deletebtn">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
