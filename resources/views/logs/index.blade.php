@extends('layouts.app')

@section('content')
    @include('parts.back_button', ['whereTo' => 'dashboard'])

    <table class="table table-bordered m-5">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Class</th>
                <th class="text-center">Line</th>
                <th class="text-center">Message</th>
                <th class="text-center"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td class="text-center">{{ $log->id }}</td>
                    <td class="text-center">{{ $log->class }}</td>
                    <td class="text-center">{{ $log->line }}</td>
                    <td class="text-center">{{ $log->message }}</td>
                    <td class="text-center">{{ $log->user_id }}</td>
                    <td class="text-center">
                         <form action={{ route('resolveLog') }} method="POST">
                             {{ csrf_field() }}
                             <input type="hidden" name="log_id" value="{{ $log->id }}">
                             <button type="submit" class="btn btn-success">RESOLVED</button>
                         </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
