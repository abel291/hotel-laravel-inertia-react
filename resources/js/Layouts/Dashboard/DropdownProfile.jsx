import Dropdown from '@/Components/Dropdown'

import { usePage } from '@inertiajs/react';
import { ChevronDownIcon, ChevronsUpDownIcon, UserIcon } from 'lucide-react';
import React from 'react'

const DropdownProfile = () => {
    const { auth } = usePage().props;
    return (
        <Dropdown>
            <Dropdown.Trigger>
                <span className="">
                    <button
                        type="button"
                        className="w-full flex justify-between items-center"
                    >

                        <div className="flex items-center gap-x-3">
                            <div className="bg-neutral-200 h-8 w-8 rounded-full flex items-center justify-center">
                                <UserIcon className="w-4 h-4 text-neutral-500" />
                            </div>
                            <span className="text-sm font-medium leading-6 text-neutral-950 dark:text-white">{auth.user.name}</span>
                        </div>
                        <div>
                            <ChevronDownIcon className="ml-3 h-5 w-5 text-neutral-400" />
                        </div>

                    </button>
                </span>
            </Dropdown.Trigger>

            <Dropdown.Content align='left'>
                <Dropdown.Link href={route('profile.edit')}>Perfil</Dropdown.Link>
                <Dropdown.Link href={route('logout')} method="post" as="button">
                    Cerrar sesion
                </Dropdown.Link>
            </Dropdown.Content>
        </Dropdown>
    )
}

export default DropdownProfile
