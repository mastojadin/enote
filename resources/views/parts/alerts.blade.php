@if (!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show myalert" role="alert">
    @foreach ($errors->all() as $one)
        <p class="text-center">
            {{ $one }}
        </p>
    @endforeach
</div>
@endif

@if (session()->has('myAlert'))
    <div class="alert alert-{{ session('myAlert')['type'] }} alert-dismissible fade show  myalert" role="alert" style="position:absolute;margin-right:0;width:75%;">
        <p class="text-center">
            {{ session('myAlert')['msg'] }}
        </p>
    </div>
@endif
