@extends('layouts.app')

@section('content')
    <div class="d-block">
        <form action="{{ route('saveSubject') }}" method="POST">
            <div class="form-group">
                <label for="new_subject">Subject</label>
                <input
                    type="text"
                    name="new_subject"
                    id="new_subject"
                    class="form-control"
                    autocomplete="off"
                    pattern="[a-zA-Z ]+"
                >
            </div>

            {{ csrf_field() }}

            <button type="submit" class="btn btn-success form-control">SAVE SUBJECT</button>
        </form>
    </div>

    <div class="d-block mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">SUBJECT</th>
                    <th class="text-center"></th>
                    <th class="text-center"></th>
                </tr>
            </thead>

            <tbody>
                @foreach($subjects as $one)
                    <tr>
                        <td class="text-center">{{ $one->id }}</td>
                        <td class="text-center">
                            <form action="{{ route('updateSubject') }}" method="POST">
                                <input
                                    type="text"
                                    name="update_subject"
                                    id="update_subject"
                                    class="form-control"
                                    autocomplete="off"
                                    pattern="[a-zA-Z ]+"
                                >
                        </td>
                        <td class="text-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="update_id" value="{{ $one->id }}">
                                    <button type="submit" class="btn btn-warning">EDIT</button>
                            </form>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('deleteSubject') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="delete_id" value="{{ $one->id }}">
                                <button type="submit" class="btn btn-danger deletebtn">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
