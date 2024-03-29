import React from 'react'
import NavbarMovil from './NavbarMovil'
import NavbarDesktop from './NavbarDesktop'

import { HomeIcon, ChatBubbleBottomCenterTextIcon, UserGroupIcon, TvIcon, PhoneIcon } from '@heroicons/react/16/solid'

const Navbar = () => {
    const navigations = [
        { title: 'Inicio', routeName: 'home', icon: HomeIcon },
        { title: 'Acerca de', routeName: 'about', icon: UserGroupIcon },
        { title: 'Habitaciones', routeName: 'rooms', icon: TvIcon },
        { title: 'Contactenos', routeName: 'contact', icon: PhoneIcon },
        { title: 'Blog', routeName: 'blog', icon: ChatBubbleBottomCenterTextIcon },
    ]
    return (
        <>
            <NavbarMovil navigations={navigations} />
            <NavbarDesktop navigations={navigations} />
        </>
    )
}

export default Navbar
