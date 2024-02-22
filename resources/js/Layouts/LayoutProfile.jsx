
import Layout from '@/Layouts/Layout'
import { Head, Link } from '@inertiajs/react'
import React from 'react'


// import Hero from '@/Components/Hero/Hero'
import Breadcrumb from '@/Components/Breadcrumb'
import { ArrowLeftStartOnRectangleIcon, ArrowRightEndOnRectangleIcon, ClipboardDocumentCheckIcon, HomeIcon, IdentificationIcon, LockClosedIcon } from '@heroicons/react/16/solid'

export default function LayoutProfile({ title, children, breadcrumb = [] }) {
    const links = [
        {
            title: 'Dashboard',
            path: 'profile.index',
            Icon: HomeIcon
        },
        {
            title: 'Mis Reservaciones',
            path: 'profile.reservations',
            Icon: ClipboardDocumentCheckIcon
        },
        {
            title: 'Detalles de cuenta',
            path: 'profile.account-details',
            Icon: IdentificationIcon
        },
        {
            title: 'Cambiar contraseña',
            path: 'profile.password',
            Icon: LockClosedIcon
        },
    ]

    return (
        <Layout>
            <Breadcrumb data={breadcrumb} />
            <div className="container ">
                {/* <Hero title="Perfil" entry="explorar" /> */}
                <section className='py-section '>

                    <div className="grid grid-cols-8 md:gap-6 gap-y-10 ">
                        <div className="col-span-12 lg:col-span-2">
                            <div className="flex flex-col space-y-1">

                                {links.map((item) => (
                                    <Link preserveScroll key={item.path} href={route(item.path)}
                                        className={'block px-4 py-3 rounded-md ' + (route().current(item.path) ? 'bg-primary-100 font-medium' : '')}>
                                        <div className="flex items-center gap-3">
                                            <item.Icon className="w-6 h-6" />
                                            {item.title}

                                        </div>
                                    </Link>
                                ))}

                            </div>
                            <Link method="post" as="button" href={route('logout')} className={'block px-4 py-3 rounded-md border-t border-gray-100 mt-2'}>
                                <div className="flex items-center gap-3">
                                    <ArrowLeftStartOnRectangleIcon className="w-6 h-6" />
                                    Cerrar Session
                                </div>
                            </Link>
                        </div>
                        <div className="col-span-12 lg:col-span-6">
                            {title && (
                                <h3 className="title-section mb-8">{title}</h3>
                            )}

                            <div>
                                {children}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </Layout >
    )
}
