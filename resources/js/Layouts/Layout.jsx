import { usePage } from '@inertiajs/react';
import React from 'react'
import Navbar from './Navbar/Navbar';
import Footer from './Footer';
import NavbarMovil from './Navbar/NavbarMovil';

const Layout = ({ children }) => {
    const { auth } = usePage().props

    return (
        <>
            {/* <NotificationToast /> */}

            <Navbar />
            <main>{children}</main>
            <Footer />

        </>
    );
}

export default Layout
