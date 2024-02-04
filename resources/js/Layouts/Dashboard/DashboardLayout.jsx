import React from 'react'
import Sidebar from './Sidebar'
import Navigation from './Navigation'


const DashboardLayout = ({ header, children }) => {
    return (
        <div className="bg-neutral-50">
            <div className="hidden md:flex fixed top-0 bottom-0">
                <Sidebar />
            </div>

            <div className="md:ml-72">
                <div className="min-h-screen bg-neutral-100 dark:bg-zinc-900">
                    <Navigation />

                    {header && (
                        <header className="bg-white dark:bg-gray-800 shadow">
                            <div className="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                                <h2 className="text-xl leading-6 font-semibold">
                                    {header}
                                </h2>
                            </div>
                        </header>
                    )}
                    <div className="py-12">
                        <div className="max-w-7xl mx-auto ">
                            <main className="max-w-7xl mx-auto">{children}</main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default DashboardLayout
