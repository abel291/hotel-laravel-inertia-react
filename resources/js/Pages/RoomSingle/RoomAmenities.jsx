import React from 'react'

const RoomAmenities = ({ amenities }) => {
    return (
        <div className='grid lg:grid-cols-2 gap-5'>
            {amenities.map((amenity) => (
                <div className='flex items-center'>
                    <img className='w-6 h-6 mr-3' src={amenity.icon} alt="" />
                    <span className='text-lg text-neutral-700 font-light '>{amenity.name}</span>
                </div>
            ))}
        </div>
    )
}

export default RoomAmenities
