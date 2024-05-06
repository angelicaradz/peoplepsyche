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
    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('clients') ? 'active' : '' }}">
        <x-nav-link :href="route('clients')">
            {{ __('Clients') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('pending-requests') ? 'active' : '' }}">
        <x-nav-link :href="route('pending-requests')">
            {{ __('Pending Requests') }}
        </x-nav-link>
    </li>
    <li class="">
        <a href="admin-profile.html">Profile</a>
    </li>
    <li class="">
        <a href="admin-settings.html">Settings</a>
    </li>
    <li class="">
        <a href="admin-login.html">Logout</a>
    </li>
@endif

@if(Auth::user()->name === 'Superadmin')
    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <x-nav-link :href="route('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
        <x-nav-link :href="route('users')">
            {{ __('Users') }}
        </x-nav-link>
    </li>
    <li class="">
        <a href="superadmin-profile.html">Profile</a>
    </li>
    <li class="">
        <a href="superadmin-settings.html">Settings</a>
    </li>
    <li class="">
        <a href="superadmin-login.html">Logout</a>
    </li>
@endif
