import React from 'react'

const RoomAmenities = ({ amenities }) => {
    return (
        <div className='grid lg:grid-cols-2 gap-1'>
            {amenities.map((amenity) => (
                <div>
                    <span className='text-lg text-neutral-700 font-light '>{amenity.name}</span>
                </div>
            ))}
        </div>
    )
}

export default RoomAmenities
