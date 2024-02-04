import { Link, usePage } from '@inertiajs/react';
import React from 'react'
import ApplicationLogo from '@/Components/ApplicationLogo';
import { BookAIcon, HomeIcon, KeyIcon, LampFloorIcon, LuggageIcon, NewspaperIcon, NotebookTabsIcon, PercentIcon, SettingsIcon, StickyNoteIcon, UserCircleIcon, WarehouseIcon } from 'lucide-react';
const Sidebar = () => {
    const { appName } = usePage().props

    const navigations1 = [

        {
            title: 'Inicio',
            route: 'dashboard.home',
            routeActive: 'dashboard.home',
            //role: 'super-admin',
            icon: HomeIcon
        },
        {
            title: 'Ususarios',
            route: 'dashboard.home',
            routeActive: 'dashboard.users.*',
            icon: UserCircleIcon
        },
        {
            title: 'Habitaciones',
            route: 'dashboard.rooms.index',
            routeActive: 'dashboard.rooms.*',
            icon: WarehouseIcon
        },
        {
            title: 'Reservaciones',
            route: 'dashboard.home',
            routeActive: 'dashboard.users.*',
            icon: NotebookTabsIcon
        },
        {
            title: 'Ofertas',
            route: 'dashboard.home',
            routeActive: 'dashboard.home2',

            icon: PercentIcon
        },
        {
            title: 'Paginas',
            route: 'dashboard.home',
            routeActive: 'dashboard.home2',
            icon: StickyNoteIcon
        },
        {
            title: 'Amenities',
            route: 'dashboard.home',
            routeActive: 'dashboard.home2',
            icon: LampFloorIcon
        },



    ];

    const navigations2 = [
        {
            title: 'Post',
            route: 'dashboard.home',
            routeActive: 'dashboard.home2',
            icon: NewspaperIcon,
        },
        {
            title: 'Autores',
            route: 'dashboard.home',
            routeActive: 'dashboard.home2',
            icon: BookAIcon,
        },
    ];

    return (
        <div className="w-72 flex bg-primary-900 z-40 ">
            <div className=" flex flex-col overflow-y-auto w-full gap-y-5  ">

                <div className="flex items-center gap-[13px] px-6  h-16">
                    <Link className="brand flex items-center" href={route('home')}>
                        <span className={"flex items-center p-2 rounded-full mr-2 bg-primary-600 "}>
                            <LuggageIcon strokeWidth={1.5} className={'h-7 w-7 text-white'} />
                        </span>
                        <span className={"text-xl font-semibold text-white"}>
                            {appName}
                        </span>
                    </Link>

                </div>



                <nav className="flex flex-col flex-1 divide-y divide-neutral-100/5">

                    <SectionSidebar className="grow">
                        <ul role="list" className=" flex-1 flex flex-col gap-1 grow ">
                            {navigations1.map((path, index) => (
                                <li key={index}>
                                    <ItemSidebar routeName={path.route} routeActive={path.routeActive} Icon={path.icon} title={path.title} />
                                </li>
                            ))}
                        </ul>

                        {/* <ul role="list" >
                            <li>
                                <ItemSidebar routeName={'dashboard.home'} Icon={Cog6ToothIcon} title={'Configuraciones'} />
                            </li>
                        </ul> */}
                    </SectionSidebar>
                    <SectionSidebar className="grow">
                        <ul role="list" className=" flex-1 flex flex-col gap-1 grow ">
                            <div className="text-sm font-medium leading-6 text-white/35">Blog</div>
                            {navigations2.map((path, index) => (
                                <li key={index}>
                                    <ItemSidebar routeName={path.route} routeActive={path.routeActive} Icon={path.icon} title={path.title} />
                                </li>
                            ))}
                        </ul>
                    </SectionSidebar>
                    <SectionSidebar className="flex flex-col ">
                        <ul role="list" >
                            <li>
                                <ItemSidebar
                                    routeName={'dashboard.home'}
                                    routeActive={'dashboard.home2'}
                                    Icon={SettingsIcon}
                                    title={'Configuraciones'}
                                />
                            </li>
                        </ul>
                    </SectionSidebar>


                </nav>

            </div>
        </div >
    )
}
const ItemSidebar = ({ routeName, routeActive, Icon, title }) => {

    return (
        <a href={route(routeName)} className={`flex items-center gap-3 rounded-md px-3 py-2 ${route().current(routeActive)
            ? ' bg-primary-800/80 text-white'
            : ' text-white hover:bg-primary-800'
            }`}>
            <Icon className="h-5 w-5 " />
            <span className="font-medium leading-6 text-white ">
                {title}
            </span>
        </a>
    )
}
const SectionSidebar = ({ children, className }) => {

    return (
        <div className={"py-3 px-3 " + className}>{children}</div>
    )
}

export default Sidebar
