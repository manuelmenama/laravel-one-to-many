<nav>
    <ul class="p-0">
        <li class="my-li-item {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-chart-line me-1 ms-2 mb-3"></i>Dashboard</a>
        </li>
        <li class="my-li-item {{ Route::currentRouteName() === 'admin.project.index' ? 'active' : '' }}">
            <a href="{{ route('admin.project.index') }}"><i class="fa-solid fa-file-pen me-1 ms-2 mb-3"></i>Projects</a>
        </li>
        <li class="my-li-item {{ Route::currentRouteName() === 'admin.project.create' ? 'active' : '' }}">
            <a href="{{ route('admin.project.create') }}"><i class="fa-solid fa-plus me-1 ms-2 mb-3"></i>Add Project</a>
        </li>
    </ul>
</nav>
