@php
    $navigation_1 = [
        [
            'title' => 'Inicio',
            'route' => 'dashboard.home',
            'routeActive' => 'dashboard.home',
            'icon' => 'heroicon-m-home',
        ],
        [
            'title' => 'Usuarios',
            'route' => 'dashboard.users.index',
            'routeActive' => 'dashboard.users.*',
            'icon' => 'heroicon-m-user-circle',
        ],
        [
            'title' => 'Habitaciones',
            'route' => 'dashboard.rooms.index',
            'routeActive' => 'dashboard.rooms.*',
            'icon' => 'heroicon-m-home-modern',
        ],
        [
            'title' => 'Ofertas',
            'route' => 'dashboard.offers.index',
            'routeActive' => 'dashboard.offers.*',
            'icon' => 'heroicon-m-receipt-percent',
        ],
        [
            'title' => 'Reservaciones',
            'route' => 'dashboard.reservations.index',
            'routeActive' => 'dashboard.reservations.*',
            'icon' => 'heroicon-m-book-open',
        ],

        // [
        //     'title' => 'Paginas',
        //     'route' => 'dashboard.home2',
        //     'routeActive' => 'dashboard.home2',
        //     'icon' => 'lucide-sticky-note',
        // ],
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
            'route' => 'dashboard.posts.index',
            'routeActive' => 'dashboard.posts.*',
            'icon' => 'heroicon-m-newspaper',
        ],
        [
            'title' => 'Categorias',
            'route' => 'dashboard.categories.index',
            'routeActive' => 'dashboard.categories.*',
            'icon' => 'heroicon-m-pencil',
        ],
        [
            'title' => 'Tags',
            'route' => 'dashboard.tags.index',
            'routeActive' => 'dashboard.tags.*',
            'icon' => 'heroicon-m-tag',
        ],
    ];
    $navigation_3 = [
        [
            'title' => 'Ajustes',
            'route' => 'dashboard.settings.index',
            'routeActive' => 'dashboard.settings.*',
            'role' => 'super-admin',
            'icon' => 'heroicon-s-cog-6-tooth',
        ],
    ];
@endphp
<div class="flex w-72 bg-neutral-900 z-40">

    <div class="  flex flex-col overflow-y-auto w-full gap-y-3  ">
        <div class="flex items-center gap-[13px] px-6 h-16  ">
            <x-application-logo class="text-neutral-800" />
        </div>

        <nav class="flex flex-col flex-1 divide-y divide-neutral-600/10">
            <x-sidebar.sidebar-list :list-navigation="$navigation_1" />

            <div class="grow">
                <x-sidebar.sidebar-list title="Blog" :list-navigation="$navigation_2" />
            </div>

            <x-sidebar.sidebar-list :list-navigation="$navigation_3" />
        </nav>
    </div>
</div>
