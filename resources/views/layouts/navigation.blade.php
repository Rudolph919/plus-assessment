<div class="w-80 p-4 bg-secondary">
    <div class="h-12 align-middle">
        <a href="{{ route('dashboard') }}">
            <x-application-logo />
        </a>
    </div>
    <div class="h-12 {{ (request()->is('users')) ? 'bg-primary' : 'text-pureWhite' }}">
        <a href="{{ route('users.index') }}">
            <span>Users</span>
        </a>
    </div>
    <div class="h-12 te {{ (request()->is('dashboard')) ? 'bg-primary' : 'text-pureWhite' }}">
        <a href="{{ route('dashboard') }}">
            <span>Pages</span>
        </a>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600 mt-20">
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
