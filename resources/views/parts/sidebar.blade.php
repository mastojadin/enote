<div class="list-group text-center">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-action sidebarlink">DASHBOARD</a>

    @if (auth()->user()->role_id === 1 || auth()->user()->role_id === 2) {{-- super, admin --}}
        <a href="{{ route('users') }}" class="list-group-item list-group-action sidebarlink">USERS</a>

        <a href="#" class="list-group-item list-group-action sidebarlink">TEACHERS <i class="fas fa-arrows-alt-h"></i> CLASSES</a>

        <a href="#" class="list-group-item list-group-action sidebarlink">CLASSES <i class="fas fa-arrows-alt-h"></i> STUDENTS</a>

        <a href="#" class="list-group-item list-group-action sidebarlink">STUDENTS <i class="fas fa-arrows-alt-h"></i> PARENTS</a>
    @endif

    @if (auth()->user()->role_id === 3) {{-- teacher --}}
        <a href="#" class="list-group-item list-group-action sidebarlink">MY CLASS</a>
    @endif

    @if (auth()->user()->role_id === 4 || auth()->user()->role_id === 5) {{-- student, parent --}}
        <a href="#" class="list-group-item list-group-action sidebarlink">MY TEACHER</a>
    @endif

    @if (auth()->user()->role_id !== 1) {{-- not super --}}
        <a href="{{ route('myprofile') }}" class="list-group-item list-group-action sidebarlink">PROFILE</a>
    @endif
</div>
