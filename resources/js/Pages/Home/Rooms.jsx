import CardRoom from '@/Components/CardRoom'
import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ArrowLongRightIcon } from '@heroicons/react/16/solid'
import { UserIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const Rooms = () => {
    const { rooms } = usePage().props
    return (
        <section className='py-section '>
            <div className='container'>
                <TitleSectionLink title="Habitaciones" titleLink="Ver todas las habitaciones" urlLink={route('rooms')} />

                <div className='mt-7'>
                    <div className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7'>

                        {rooms.map((room, index) => (
                            <CardRoom key={index} room={room} />
                        ))}

                        <div className='md:col-span-2 lg:col-span-1 bg-primary-700 rounded-lg overflow-hidden text-white p-10 '>
                            <h3 className='text-3xl font-extrabold  tracking-wide'>Quédese más tiempo, ahorre más</h3>
                            <p className='mt-4'>Es simple: ¡cuanto más tiempo permanezcas, más ahorrarás!</p>
                            <div className='mt-5 border-l-2 border-white pl-4 py-1'>
                                <p className='text-base'>Ahorre hasta un 30 % en la tarifa diaria para más de 14 noches</p>
                                <p className='text-base mt-5'>Ahorre hasta un 20 % de descuento en la tarifa por noche entre 7 y 14 noches</p>
                            </div>
                            <SecondaryButton className='mt-8'>Elige habitación</SecondaryButton>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    )
}

export default Rooms
