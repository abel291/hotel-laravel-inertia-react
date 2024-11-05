import CardRoom from '@/Components/CardRoom'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { usePage } from '@inertiajs/react'
import React from 'react'

const Rooms = () => {
    const { rooms } = usePage().props
    return (
        <section className='py-section '>
            <div className='container'>
                <TitleSectionLink title="Habitaciones" titleLink="Ver todas las habitaciones" urlLink={route('rooms')} />

                <div className='mt-12'>
                    <div className='grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-7'>
                        {rooms.map((room, index) => (
                            <CardRoom key={index} room={room} />
                        ))}
                    </div>
                </div>
            </div>

        </section>
    )
}

export default Rooms
