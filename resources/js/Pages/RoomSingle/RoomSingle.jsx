import Breadcrumb from '@/Components/Breadcrumb'
import CarouselImages from '@/Components/CarouselImages'
import Layout from '@/Layouts/Layout'
import { Head } from '@inertiajs/react'
import React from 'react'

import RoomListBeds from '@/Components/RoomListBeds'
import RoomAmenities from './RoomAmenities'
import Rules from './Rules'
import StagesBooking from '../About/StagesBooking'
import RecomendRooms from './RecommendedRooms'
import RecommendedRooms from './RecommendedRooms'
import CardOffer from '@/Components/CardOffer'
import Card from '@/Components/Card'
import CardCheckIn from './CardCheckIn'

const RoomSingle = ({ room, charge, recommendedRooms }) => {

    const breadcrumb = [
        {
            title: 'Habitaciones',
            path: route('rooms')
        },
        {
            title: room.name,
        },

    ]


    return (
        <Layout>
            <Head>
                <title>{room.name}</title>
                <meta head-key="description" name="description" content={room.entry} />
            </Head>

            <Breadcrumb data={breadcrumb} />

            <section className='py-section container'>

                <CarouselImages images={room.images} />

                <div className='grid lg:grid-cols-12 mt-8 gap-7'>
                    <div className='lg:col-span-8'>
                        <div >
                            <RoomListBeds adults={room.adults} beds={room.beds} />
                        </div>
                        <div className='space-y-10 lg:space-y-14 mt-4'>
                            <div >
                                <p className='text-lg font-light leading-relaxed'>{room.description}</p>
                            </div>

                            <div >
                                <h4>Comodidades</h4>
                                <div className='mt-5 lg:mt-6'>
                                    <RoomAmenities amenities={room.amenities} />
                                </div>
                            </div>
                            <div >
                                <h4>Reglas del Hotel</h4>
                                <div className='mt-5 lg:mt-6'>
                                    <Rules />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className='lg:col-span-4 space-y-7'>
                        <CardCheckIn charge={charge} />
                        <CardOffer isButton={false} />
                    </div>
                </div>


            </section>

            <div className='bg-primary'>
                <StagesBooking />
            </div>

            <RecommendedRooms rooms={recommendedRooms} />
        </Layout >
    )
}

export default RoomSingle
