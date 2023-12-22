<header class="p-5 flex items-center justify-between ">
    <div class="w-30 h-30">
        <a href='/'>
            <x-application-logo width="50" />
        </a>
    </div>
    @auth
        <div>
            <a href="{{ route('profile.edit') }}">
                <x-secondary-button>Profile</x-secondary-button>
            </a>
        </div>
    @else
        <div>
            <a href="{{ route('login') }}">
                <x-secondary-button>Login</x-secondary-button>
            </a>
            <a href="{{ route('register') }}">
                <x-secondary-button>Register</x-secondary-button>
            </a>
        </div>
    @endauth
</header>
