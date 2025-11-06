<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-9 w-auto">
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex space-x-8">
                    <a href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'border-indigo-400 text-gray-900 border-b-2' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-xl font-medium">
                        Dashboard
                    </a>

                    @if(auth()->user()->isHsl())
                        <a href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.*') ? 'border-indigo-400 text-gray-900 border-b-2' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-l font-medium">
                            Products
                        </a>
                    @endif

                    <a href="{{ route('orders.index') }}"
                    class="{{ request()->routeIs('orders.*') ? 'border-indigo-400 text-gray-900 border-b-2' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-l font-medium">
                        Orders
                    </a>
                </div>
            </div>

            <!-- User Menu -->
            <div class="hidden sm:flex sm:items-center space-x-4">
                <div class="relative" x-data="{ openMenu: false }">
                    <button @click="openMenu = !openMenu"
                            class="flex items-center text-gray-500 hover:text-gray-700 text-sm font-medium">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="openMenu" @click.away="openMenu = false"
                         class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-20">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}"
                              class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}"
                              class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}"
                class="{{ request()->routeIs('dashboard') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block ps-3 pe-4 py-2 border-l-4 text-base font-medium">
                Dashboard
            </a>

            @if(auth()->user()->isHsl())
                <a href="{{ route('products.index') }}"
                class="{{ request()->routeIs('products.*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block ps-3 pe-4 py-2 border-l-4 text-base font-medium">
                    Products
                </a>
            @endif

            <a href="{{ route('orders.index') }}"
                class="{{ request()->routeIs('orders.*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }} block ps-3 pe-4 py-2 border-l-4 text-base font-medium">
                Orders
            </a>
        </div>

        <!-- Responsive User Menu -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}"
                   class="block ps-3 pe-4 py-2 text-base font-medium text-xl text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block w-full text-left ps-3 pe-4 py-2 text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
