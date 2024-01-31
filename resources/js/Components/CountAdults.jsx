import { User, UserRound } from 'lucide-react'
import React from 'react'

const CountAdults = ({ quantityAdults = 0, className = '' }) => {
    return (
        <div className={className + ' flex items-center'}>
            <UserRound className='w-5 h-5 mr-1 text-primary-800' />
            <span className='font-light'>{quantityAdults}  Adultos</span>
        </div>
    )
}

export default CountAdults
