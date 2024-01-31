import { CalendarDaysIcon } from 'lucide-react'
import React from 'react'

const TextTime = ({ time, withIcon = true }) => {
    return (
        <div className='flex items-center text-primary-800'>
            {withIcon && (
                <CalendarDaysIcon className='w-5 h-5 mr-1.5' />
            )}
            <span className='font-light'>{time}</span>
        </div>
    )
}

export default TextTime
