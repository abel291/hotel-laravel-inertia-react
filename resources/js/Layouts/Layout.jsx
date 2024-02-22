import { usePage } from '@inertiajs/react';
import React from 'react'
import Navbar from './Navbar/Navbar';
import Footer from './Footer';
import NavbarMovil from './Navbar/NavbarMovil';
import NotificationToast from '@/Components/NotificationToast';

const Layout = ({ children }) => {
    const { auth } = usePage().props

    return (
        <div className='flex flex-col h-full' >
            <NotificationToast />
            <Navbar />
            <main className='grow'>{children}</main>
            <Footer />
        </div>
    );
}

export default Layout
