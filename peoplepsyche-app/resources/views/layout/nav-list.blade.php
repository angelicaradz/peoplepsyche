@if(Auth::user()->name === 'User')
    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('assessments-list') ? 'active' : '' }}">
        <x-nav-link :href="route('assessments-list')">
            {{ __('Assessments') }}
        </x-nav-link>
    </li>
    <li class="">
        <x-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
    <li class="">
        <a href="settings.html">Settings</a>
    </li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </a>
    </form>
@endif

@if(Auth::user()->name === 'Admin')
    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('admin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('admin.clients') ? 'active' : '' }}">
        <x-nav-link :href="route('admin.clients')">
            {{ __('Clients') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('admin.pending-requests') ? 'active' : '' }}">
        <x-nav-link :href="route('admin.pending-requests')">
            {{ __('Pending Requests') }}
        </x-nav-link>
    </li>
    <li class="">
        <x-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
    <li class="">
        <a href="admin-settings.html">Settings</a>
    </li>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <a :href="route('admin.logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </a>
    </form>
@endif

@if(Auth::user()->name === 'SuperAdmin')
    <li class="{{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('superadmin.dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('superadmin.users') ? 'active' : '' }}">
        <x-nav-link :href="route('superadmin.users')">
            {{ __('Users') }}
        </x-nav-link>
    </li>
    <li class="">
        <a href="superadmin-profile.html">Profile</a>
    </li>
    <li class="">
        <a href="superadmin-settings.html">Settings</a>
    </li>
    <form method="POST" action="{{ route('superadmin.logout') }}">
        @csrf

        <a :href="route('superadmin.logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Logout') }}
        </a>
    </form>
@endif
