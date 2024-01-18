import ApplicationLogo from '@/Components/ApplicationLogo'
import { Dialog, Disclosure, Transition } from '@headlessui/react'
import { XMarkIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import React, { Fragment, useState } from 'react'

const Sidebar = ({ navigations, open, setOpen }) => {

    return (

        <Transition.Root show={open} as={Fragment}>
            <Dialog as="div" className="relative z-50 lg:hidden" onClose={setOpen}>
                <Transition.Child
                    as={Fragment}
                    enter="ease-in-out duration-500"
                    enterFrom="opacity-0"
                    enterTo="opacity-100"
                    leave="ease-in-out duration-500"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                >
                    <div className="fixed inset-0 bg-black bg-opacity-80 transition-opacity" />
                </Transition.Child>

                <div className="fixed inset-0 overflow-hidden ">
                    <div className="absolute inset-0 overflow-hidden">
                        <div className="pointer-events-none fixed inset-y-0 left-0 flex  ">
                            <Transition.Child
                                as={Fragment}
                                enter="transform transition ease-in-out duration-500 sm:duration-700"
                                enterFrom="-translate-x-full"
                                enterTo="translate-x-0"
                                leave="transform transition ease-in-out duration-500 sm:duration-700"
                                leaveFrom="translate-x-0"
                                leaveTo="-translate-x-full"
                            >
                                <Dialog.Panel className="pointer-events-auto flex ">
                                    <div className=' bg-white  w-72  mr-16'>
                                        <div className="absolute top-0 right-0 ">
                                            <button
                                                type="button"
                                                className=" w-16 h-16 flex items-center justify-center text-gray-400 hover:text-gray-500"
                                                onClick={() => setOpen(false)}
                                            >

                                                <XMarkIcon className="h-6 w-6" />
                                            </button>
                                        </div>
                                        <div className=" flex  w-full z-40 relative ">
                                            <div className=" flex flex-col overflow-y-auto w-full gap-y-3 ">
                                                <div className="flex items-end gap-[13px] px-6 h-16 pb-1">
                                                    <ApplicationLogo textColor='text-black' />
                                                </div>
                                            </div>
                                        </div>

                                        <div className="py-3 px-3 flex flex-col">

                                            <ul role="list" className="flex-1 flex flex-col gap-1 ">
                                                {navigations.map((navigation, index) => (
                                                    <li key={index}>
                                                        <Link href={route(navigation.routeName)} className={
                                                            (route().current(navigation.routeName)
                                                                ? 'bg-primary-800/5 text-primary-700 '
                                                                : 'text-primary-800/40 hover:text-primary-800  ') +
                                                            '  flex items-center gap-3 rounded-md px-3 py-2 font-medium'}>
                                                            <navigation.icon className="w-6 h-6" />
                                                            <span className="text-sm font-semibold leading-6 text-neutral-700 ">
                                                                {navigation.title}
                                                            </span>

                                                        </Link>
                                                    </li>
                                                ))}
                                            </ul>
                                        </div>

                                    </div>
                                </Dialog.Panel>
                            </Transition.Child>
                        </div>
                    </div>
                </div>
            </Dialog>
        </Transition.Root >
    )
}

export default Sidebar
