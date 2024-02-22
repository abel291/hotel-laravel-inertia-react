import React from 'react'

const ListAmenities = ({ amenities, className = '' }) => {
    return (
        <div className={'flex flex-wrap gap-2 ' + className}>
            {amenities.map((amenity) => (
                <img key={amenity.id} alt={amenity.name} title={amenity.name} src={amenity.icon} className='w-6 h-6 ' />
            ))}
        </div>
    )
}

export default ListAmenities
