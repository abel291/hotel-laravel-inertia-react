import Layout from '@/Layouts/Layout'
import { Head, router, useForm, usePage } from '@inertiajs/react'
import React from 'react'
import Filters from './Filters'
import CardReservationRoom from './CardReservationRoom'

const Reservation = ({ rooms, }) => {

    return (
        <Layout>
            <Head>
                <title>Sistema de reservacion</title>
            </Head>

            <Filters />

            <section className='py-section'>
                <div className='container'>
                    {rooms.length ? (
                        <div className=' space-y-8'>
                            {rooms.map((room) => (
                                <div key={room.id} >
                                    <CardReservationRoom room={room} />
                                </div>
                            ))}
                        </div>

                    ) : (
                        <div></div>
                    )}
                </div>
            </section>

        </Layout>

    )
}

export default Reservation
