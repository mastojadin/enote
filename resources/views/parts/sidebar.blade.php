<div class="list-group text-center">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-action sidebarlink">DASHBOARD</a>
    @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2)
        <a href="{{ route('users') }}" class="list-group-item list-group-action sidebarlink">USERS</a>
    @endif
    <a href="#" class="list-group-item list-group-action sidebarlink">MY PROFILE</a>
</div>
