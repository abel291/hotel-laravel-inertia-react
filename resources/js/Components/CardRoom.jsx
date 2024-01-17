import { ArrowLongRightIcon } from '@heroicons/react/16/solid'
import { UserIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import React from 'react'

const CardRoom = ({ room }) => {
    return (
        <div key={room.id} className='rounded-lg shadow-neutral overflow-hidden bg-white flex flex-col'>
            <div className='relative'>
                <img className='h-64 w-full object-cover object-center bg-red-300' src={room.thumb} alt="" />
                <div className='absolute bottom-8 right-0 bg-white h-10 px-4 flex items-center rounded-l-lg text-base'>
                    <span className='font-bold text-xl'>${room.price} </span>
                    / 1 noche
                </div>
            </div>
            <div className='p-6 grow  flex flex-col'>
                <Link className="text-xl lg:text-2xl font-bold grow">
                    {room.name}
                </Link>
                <div className='mt-2 flex items-center gap-5 text-lg   '>
                    <div className='flex items-center'>
                        <UserIcon className='w-6 h-6 mr-2 text-primary-700' />
                        {room.adults} Adultos
                    </div>
                    <div>1 bunk bed</div>
                </div>
                <div className=' text-primary-700 flex items-end mt-4 '>
                    <Link className='font-semibold '>Ver disponibilidad</Link>
                    <ArrowLongRightIcon className='w-4 h-4 ml-3' />
                </div>
            </div>
        </div>
    )
}

export default CardRoom
