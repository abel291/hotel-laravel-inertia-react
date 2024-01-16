import { usePage } from '@inertiajs/react';
import React from 'react'
import Navbar from './Navbar/Navbar';
import Footer from './Footer';

const Layout = ({ children }) => {
    const { auth } = usePage().props

    return (
        <>
            {/* <NotificationToast /> */}

            {/* <Navbar auth={auth} /> */}
            <main>{children}</main>
            <Footer />

        </>
    );
}

export default Layout
