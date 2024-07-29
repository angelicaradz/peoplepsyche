@if(Auth::user()->role === 'client')
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
    <li class="{{ request()->routeIs('client-profile.edit') ? 'active' : '' }}">
        <x-nav-link :href="route('client-profile.edit')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('client-settings.edit') ? 'active' : '' }}">
        <x-nav-link :href="route('client-settings.edit')">
            {{ __('Settings') }}
        </x-nav-link>
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

@if(Auth::user()->role === 'admin')
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
    <li class="{{ request()->routeIs('admin-profile.edit') ? 'active' : '' }}">
        <x-nav-link :href="route('admin-profile.edit')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
    <li class="{{ request()->routeIs('admin-settings.edit') ? 'active' : '' }}">
        <x-nav-link :href="route('admin-settings.edit')">
            {{ __('Settings') }}
        </x-nav-link>
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

@if(Auth::user()->role === 'superadmin')
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
    <li class="{{ request()->routeIs('superadmin-settings.edit') ? 'active' : '' }}">
        <x-nav-link :href="route('superadmin-settings.edit')">
            {{ __('Profile Settings') }}
        </x-nav-link>
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
