import { User } from 'lucide-react'
import React from 'react'
import CountAdults from './CountAdults'
import CountBeds from './CountBeds'

const RoomListBeds = ({ adults, beds, className = '' }) => {
    return (
        <div className={'flex items-center justify-between md:justify-normal text-lg font-light ' + className}>
            <CountAdults className='mr-5' quantityAdults={adults} />
            <div className='md:flex gap-5' >
                {beds.map((bed) => (
                    <CountBeds key={bed.name} bed={bed} />
                ))}
            </div>

        </div>

    )
}

export default RoomListBeds
