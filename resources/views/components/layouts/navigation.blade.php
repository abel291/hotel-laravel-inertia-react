<nav x-data="{ openSidebar: false }" x-on:resize.window="
if(window.innerWidth > 768 && openSidebar ){openSidebar=false}
"
    x-init="" class="bg-white dark:bg-neutral-800  shadow">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl">
        <div class="flex justify-between h-16">
            <div class="items-center hidden md:flex">
                <x-application-logo class="text-neutral-800" />
            </div>
            <div class="-mr-2 flex items-center md:hidden">
                <button x-on:click="openSidebar=!openSidebar" aria-controls="default-sidebar" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 dark:text-neutral-500 hover:text-neutral-500 dark:hover:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-900 focus:outline-none focus:bg-neutral-100 dark:focus:bg-neutral-900 focus:text-neutral-500 dark:focus:text-neutral-400 transition duration-150 ease-in-out">
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
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">

                            <div class="flex items-center gap-2 whitespace-nowrap">
                                <x-heroicon-m-user-circle class="h-5 w-5 text-gray-400 dark:text-gray-500" />
                                <span class="flex-1 truncate text-start text-neutral-700 dark:text-neutral-200">
                                    Pefil
                                </span>
                            </div>

                        </x-dropdown-link>

                        <div class="border-y my-1 py-1">
                            <div x-data="{
                                theme: '',
                                init: function() {
                                    this.theme = localStorage.getItem('theme') || 'system'
                            
                                    $watch('theme', (value) => {
                                        this.theme = value
                                        localStorage.setItem('theme', value);
                            
                                        if (value === 'dark' || value === 'system') {
                                            document.querySelector('html').classList.add('dark');
                                        } else {
                                            document.querySelector('html').classList.remove('dark');
                                        }
                                    })
                                },
                            
                            
                            }" chageTheme(theme) { this.theme=theme
                                localStorage.setItem('theme', theme);
                                document.querySelector('html').classList.add(theme); },
                                class="fi-theme-switcher grid grid-flow-col gap-x-1">
                                <button aria-label="Enable light theme" type="button"
                                    x-bind:class="theme === 'light' ?
                                        'bg-neutral-100 text-primary-600 dark:bg-white/5 dark:text-primary-400' :
                                        'text-neutral-400 hover:text-neutral-500 focus-visible:text-neutral-500 dark:text-neutral-500 dark:hover:text-neutral-400 dark:focus-visible:text-neutral-400'"
                                    x-on:click="(theme = 'light') &amp;&amp; close()"
                                    class="flex justify-center rounded-lg p-2 outline-none transition duration-75 ">
                                    <x-heroicon-s-sun class="h-5 w-5" />
                                </button>

                                <button aria-label="Enable dark theme" type="button"
                                    x-bind:class="theme === 'dark' ?
                                        'bg-neutral-100 text-primary-600 dark:bg-white/5 dark:text-primary-400' :
                                        'text-neutral-400 hover:text-neutral-500 focus-visible:text-neutral-500 dark:text-neutral-500 dark:hover:text-neutral-400 dark:focus-visible:text-neutral-400'"
                                    x-on:click="(theme = 'dark') &amp;&amp; close()"
                                    class="flex justify-center rounded-lg p-2 outline-none transition duration-75 ">

                                    <x-heroicon-s-moon class="h-5 w-5" /></button>

                                <button aria-label="Enable system theme" type="button"
                                    x-bind:class="theme === 'system' ?
                                        'bg-neutral-100 text-primary-600 dark:bg-white/5 dark:text-primary-400' :
                                        'text-neutral-400 hover:text-neutral-500 focus-visible:text-neutral-500 dark:text-neutral-500 dark:hover:text-neutral-400 dark:focus-visible:text-neutral-400'"
                                    x-on:click="(theme = 'system') &amp;&amp; close()"
                                    class="flex justify-center rounded-lg p-2 outline-none transition duration-75 ">
                                    <x-heroicon-s-computer-desktop class="h-5 w-5" />
                                </button>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="flex items-center gap-2 whitespace-nowrap">
                                    <x-heroicon-s-arrow-left-on-rectangle
                                        class="h-5 w-5 text-neutral-400 dark:text-neutral-500" />
                                    <span>
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

</nav>
