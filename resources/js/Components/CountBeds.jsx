import React from 'react'

const CountBeds = ({ bed }) => {

    return (
        <div className='flex items-center whitespace-nowrap'>
            <img src={bed.icon} className='w-6 h-6 mr-2 text-primary-800' />
            <span className='font-light'>{bed.quantity} {bed.name}</span>
        </div>
    )
}

export default CountBeds
