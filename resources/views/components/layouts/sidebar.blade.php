@php
    $navigation_1 = [
        [
            'title' => 'Inicio',
            'route' => 'dashboard.home',
            'routeActive' => 'dashboard.home',
            'icon' => 'heroicon-m-home',
        ],
        // [
        //     'title' => 'Ususarios',
        //     'route' => 'dashboard.home2',
        //     'routeActive' => 'dashboard.home2',
        //     'icon' => 'lucide-user',
        // ],
        [
            'title' => 'Habitaciones',
            'route' => 'dashboard.rooms.index',
            'routeActive' => 'dashboard.rooms.*',
            'icon' => 'lucide-building',
        ],
        [
            'title' => 'Ofertas',
            'route' => 'dashboard.offers.index',
            'routeActive' => 'dashboard.offers.*',
            'icon' => 'lucide-percent',
        ],
        [
            'title' => 'Reservaciones',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-book-open-check',
        ],

        [
            'title' => 'Paginas',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-sticky-note',
        ],
        [
            'title' => 'Amenities',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-lamp',
        ],
        [
            'title' => 'Camas',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-sofa',
        ],
    ];

    $navigation_2 = [
        [
            'title' => 'Post',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'heroicon-m-newspaper',
        ],
        [
            'title' => 'Autores',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'heroicon-m-pencil',
        ],
    ];
    $navigation_3 = [
        [
            'title' => 'Configuraciones',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'role' => 'super-admin',
            'icon' => 'heroicon-m-cog-6-tooth',
        ],
    ];
@endphp
<div class="w-72 flex bg-primary-900  z-40">
    <div class=" flex flex-col overflow-y-auto w-full  ">

        <div class="flex items-center gap-[13px] px-6  h-16">
            <a class="brand flex items-center" target="_blank" href={{ route('home') }}>
                <span class="flex items-center p-2.5 rounded-full mr-2 bg-primary-600 ">
                    <x-lucide-baggage-claim class='h-6 w-6 text-white' />
                </span>
                <span class="text-xl font-semibold text-white">
                    {{ config('app.name') }}
                </span>
            </a>

        </div>

        <nav class="flex flex-col flex-1 divide-y divide-neutral-100/5">

            <x-sidebar.secction-sidebar class="grow">
                <x-sidebar-list-items :items-navigation="$navigation_1" />
            </x-sidebar.secction-sidebar>

            <x-sidebar.secction-sidebar class="grow">
                <div class="text-sm font-medium leading-6 text-white/50">Blog</div>
                <x-sidebar-list-items :items-navigation="$navigation_2" />
            </x-sidebar.secction-sidebar>

            <x-sidebar.secction-sidebar>
                <x-sidebar-list-items :items-navigation="$navigation_3" />
            </x-sidebar.secction-sidebar>
        </nav>
    </div>
</div>
