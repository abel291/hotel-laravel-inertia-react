import React from 'react'

const RoomListBeds = ({ adults, beds }) => {
    return (
        <div className='flex items-center  text-lg font-bold  text-primary-800 divide-x'>
            <div className=' px-2.5 flex items-center'>
                <span className='mr-1.5'>{adults}</span>
                Adultos
            </div>
            {beds.map((bed) => (
                <div className=' px-2.5 flex items-center'>
                    <span className='mr-1.5'>{bed.quantity}</span>
                    {bed.name}
                </div>
            ))}

        </div>

    )
}

export default RoomListBeds
