import React from 'react'
import { BuildingOffice2Icon } from '@heroicons/react/16/solid'
import { Link } from '@inertiajs/react'
import PrimaryButton from '@/Components/PrimaryButton'
import ApplicationLogo from '@/Components/ApplicationLogo'
const Navbar = () => {
    const navigations = [
        { title: 'Inicio', routeName: 'home' },
        { title: 'Acerca de', routeName: 'about' },
        { title: 'Habitaciones', routeName: 'rooms' },
        { title: 'Galerias', routeName: 'galleries' },
        { title: 'Blog', routeName: 'blog' },
    ]
    return (

        <header className="h-28 items-center z-50 relative hidden lg:flex">
            <div className='container flex  justify-between '>
                <ApplicationLogo textColor='text-primary-700' />
                <div className='flex items-center gap-x-10'>
                    {navigations.map((navigation, index) => (
                        <Link key={index} href={route(navigation.routeName)} className={
                            (route().current(navigation.routeName)
                                ? 'text-primary-600 shadow-[0px_2px_0px] shadow-primary-600 font-semibold '
                                : 'hover:shadow-[0px_2px_0px] hover:shadow-primary-600 ') +
                            '  border-primary-600 font-medium'}>
                            {navigation.title}
                        </Link>
                    ))}
                    <div>
                        <PrimaryButton>Contactenos</PrimaryButton>
                    </div>

                </div>
            </div>
        </header>
    )
}

export default Navbar
