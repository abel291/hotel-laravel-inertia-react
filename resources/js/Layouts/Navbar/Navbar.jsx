import React from 'react'
import NavbarMovil from './NavbarMovil'
import NavbarDesktop from './NavbarDesktop'

import { HomeIcon, PhotoIcon, ChatBubbleBottomCenterTextIcon, UserGroupIcon, TvIcon } from '@heroicons/react/16/solid'

const Navbar = () => {
    const navigations = [
        { title: 'Inicio', routeName: 'home', icon: HomeIcon },
        { title: 'Acerca de', routeName: 'about', icon: UserGroupIcon },
        { title: 'Habitaciones', routeName: 'rooms', icon: TvIcon },
        { title: 'Galerias', routeName: 'galleries', icon: PhotoIcon },
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
