import PrimaryButton from '@/Components/PrimaryButton'
import { UserIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const RoomsList = () => {
    const { rooms } = usePage().props
    return (
        <section className='py-section'>
            <div className='container'>
                <div className=''>
                    {rooms.map((room) => (
                        <div className='mt-7 grid lg:grid-cols-7 rounded-lg overflow-hidden shadow-neutral min-h-60'>
                            <div className='lg:col-span-2'>
                                <img src={room.thumb} alt={room.alt} className='object-cover object-center h-full' />
                            </div>
                            <div className='lg:col-span-5 p-5 lg:p-8 lg:flex justify-between'>
                                <div className='lg:max-w-sm xl:max-w-md flex flex-col font-light'>
                                    <Link href={route('room', { slug: room.slug })} className='font-bold text-2xl'>{room.name}</Link>
                                    <p className=' grow mt-4 mb-4 md:text-lg  font-light'>
                                        {room.entry}
                                    </p>
                                    <div className=' flex items-center gap-5 md:text-lg  '>
                                        <div className='flex items-center'>
                                            <UserIcon className='w-6 h-6 mr-2 text-primary-700' />
                                            {room.adults} Adultos
                                        </div>
                                        <div>1 bunk bed</div>
                                    </div>
                                </div>

                                <div className='flex flex-col justify-between lg:text-right mt-5 lg:mt-0'>
                                    <div className='font-light '>
                                        <div className='text-lg'>
                                            <span className='text-3xl lg:text-4xl font-bold mr-2 '>
                                                ${room.price}
                                            </span>
                                            / 1 noche
                                        </div>
                                        <div className='mt-2 lg:mt-5'>
                                            <span className='text-lg font-bold mr-2 '>
                                                ${room.price}
                                            </span>
                                            / 7 noches
                                        </div>
                                    </div>
                                    <div className='mt-5'>
                                        <PrimaryButton className='w-full lg:w-auto'>Reservar</PrimaryButton>
                                    </div>

                                </div>

                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </section>

    )
}

export default RoomsList
