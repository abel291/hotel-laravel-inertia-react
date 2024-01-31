import React from 'react'
import Card from '../Card'
import ListAmenities from '../ListAmenities'
import RoomListBeds from '../RoomListBeds'
import { formatCurrency } from '@/Helpers/helper'
import { Link } from '@inertiajs/react'
import PriceOffer from '../PriceOffer'

const CardRoomOffer = ({ room, children }) => {

    return (
        <Card className='lg:flex overflow-hidden  '>
            <div className='w-full lg:w-5/12 xl:w-4/12 overflow-hidden bg-cover bg-center'>
                <img src={room.thumb} alt={room.alt} className='object-cover object-center w-full h-full xl:h-72   transition-transform hover:scale-110' />
            </div>
            <div className='w-full lg:w-7/12 xl:w-8/12 pt-8 pb-6 px-8'>
                <div className='xl:flex h-full justify-between gap-x-10'>
                    <div className='flex flex-col font-light'>
                        <div className='grow'>
                            <Link href={route('room', { slug: room.slug })} className='font-bold text-2xl hover:text-primary-800 transition-colors ease-out duration-700'>{room.name}</Link>
                            <p className='  mt-2  md:text-lg  font-light'>
                                {room.entry}
                            </p>
                            <ListAmenities amenities={room.amenities} className='mt-4' />
                        </div>
                        <RoomListBeds adults={room.adults} beds={room.beds} className='mt-6 ' />

                    </div>

                    <div className='flex flex-row xl:flex-col items-end justify-between lg:text-right lg:shrink-0 mt-6 xl:mt-0'>
                        <PriceOffer charge={room.charge} />
                        <div >
                            {children}
                        </div>

                    </div>
                </div>

            </div>
        </Card>
    )
}

export default CardRoomOffer
