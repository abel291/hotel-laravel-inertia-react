@php
    $navigation_1 = [
        [
            'title' => 'Inicio',
            'route' => 'dashboard.home',
            'routeActive' => 'dashboard.home',
            'icon' => 'lucide-home',
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
            'route' => 'dashboard.reservations.index',
            'routeActive' => 'dashboard.reservations.*',
            'icon' => 'lucide-book-open-check',
        ],

        [
            'title' => 'Paginas',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-sticky-note',
        ],
        [
            'title' => 'Comodidades',
            'route' => 'dashboard.amenities.index',
            'routeActive' => 'dashboard.amenities.*',
            'icon' => 'lucide-lamp',
        ],
        [
            'title' => 'Camas',
            'route' => 'dashboard.beds.index',
            'routeActive' => 'dashboard.beds.*',
            'icon' => 'lucide-sofa',
        ],
    ];

    $navigation_2 = [
        [
            'title' => 'Post',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-newspaper',
        ],
        [
            'title' => 'Autores',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'icon' => 'lucide-pencil',
        ],
    ];
    $navigation_3 = [
        [
            'title' => 'Configuraciones',
            'route' => 'dashboard.home2',
            'routeActive' => 'dashboard.home2',
            'role' => 'super-admin',
            'icon' => 'lucide-settings',
        ],
    ];
@endphp
<div class="w-72 bg-white z-40">

    <div class=" flex flex-col overflow-y-auto w-full  h-full  ">
        <div class="flex items-center gap-[13px] px-6 h-16 bg-white ">
            <a class="brand flex items-center" target="_blank" href={{ route('home') }}>
                <span class="flex items-center p-2 rounded-full mr-2 bg-primary-600 ">
                    <x-lucide-baggage-claim class='h-6 w-6 text-white' />
                </span>
                <span class="text-xl font-bold text-gray-700">
                    {{ config('app.name') }}
                </span>
            </a>
        </div>

        <nav class="flex flex-col flex-1 divide-y divide-neutral-100/5 gap-y-7">
            <x-sidebar.secction-sidebar class="">
                <x-sidebar-list-items :items-navigation="$navigation_1" />
            </x-sidebar.secction-sidebar>

            <x-sidebar.secction-sidebar class="grow">
                <div class="text-sm font-semibold leading-6 text-gray-700 dark:text-gray-200">Blog</div>
                <x-sidebar-list-items :items-navigation="$navigation_2" />
            </x-sidebar.secction-sidebar>

            <x-sidebar.secction-sidebar>
                <x-sidebar-list-items :items-navigation="$navigation_3" />
            </x-sidebar.secction-sidebar>
        </nav>
    </div>
</div>
