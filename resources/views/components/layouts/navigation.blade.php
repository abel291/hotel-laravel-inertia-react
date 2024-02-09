<nav x-data="{ openSidebar: false }" x-on:resize.window="
if(window.innerWidth > 768 && openSidebar ){openSidebar=false}
"
    x-init="" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="items-center hidden md:flex">
                <x-application-logo class="text-neutral-800" />
            </div>
            <div class="-mr-2 flex items-center md:hidden">
                <button x-on:click="openSidebar=!openSidebar" aria-controls="default-sidebar" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <x-heroicon-o-bars-3 class="w-6 h-6" />
                </button>
                <div class="relative">
                    <div x-show="openSidebar" class="flex fixed inset-0 z-10">
                        <div x-show="openSidebar" class="fixed inset-0 bg-black bg-opacity-80 "
                            x-on:click="openSidebar = false" x-on:close.stop="show = false"
                            x-on:keydown.escape.window="show = false" x-on:keydown.tab.prevent="show = false"
                            x-on:keydown.shift.tab.prevent="show = false"
                            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 "
                            x-transition:enter-end="opacity-100 " x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0">
                        </div>
                        <div class="z-20 flex relative mr-16" x-show="openSidebar" x-on:click="openSidebar = false"
                            x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
                            x-on:keydown.tab.prevent="show = false" x-on:keydown.shift.tab.prevent="show = false"
                            x-transition:enter="transition duration-200 ease-out"
                            x-transition:enter-start="-translate-x-full " x-transition:enter-end="translate-x-0"
                            x-transition:leave="transition duration-100 ease-out"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">
                            <x-layouts.sidebar />
                            <div class="relative ">
                                <div class="absolute top-0 w-16 flex justify-center pt-5">
                                    <button x-on:click="openSidebar = false">
                                        <x-heroicon-o-x-mark class="text-white w-6 h-6 " />
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <span class="">
                            <button type="button" class="w-full flex justify-between items-center">

                                <div class="flex items-center gap-x-3">
                                    <div class="bg-neutral-200 h-8 w-8 rounded-full flex items-center justify-center">

                                        <x-lucide-user class="w-4 h-4 text-neutral-500" />
                                    </div>
                                    <span class="text-sm font-medium leading-6 text-neutral-950 dark:text-white">
                                        {{ Auth::user()->name }}
                                    </span>
                                </div>
                                <div>
                                    <x-lucide-chevron-down class="ml-3 h-5 w-5 text-neutral-400" />
                                </div>

                            </button>
                        </span>
                        {{-- <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button> --}}

                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">

                            <div class="flex items-center gap-2 whitespace-nowrap">
                                <x-lucide-user class="h-5 w-5 text-gray-400 dark:text-gray-500" />
                                <span class="flex-1 truncate text-start text-gray-700 dark:text-gray-200">
                                    Pefil
                                </span>
                            </div>



                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="flex items-center gap-2 whitespace-nowrap">
                                    <x-lucide-log-out class="h-5 w-5 text-gray-400 dark:text-gray-500" />
                                    <span class="flex-1 truncate text-start text-gray-700 dark:text-gray-200">
                                        {{ __('Salir') }}
                                    </span>
                                </div>

                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>

    {{-- <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.home')" :active="request()->routeIs('dashboard.home')">
                {{ __('Dashboard.home') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
    </div> --}}
</nav>
