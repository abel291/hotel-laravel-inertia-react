import { CheckIcon } from '@heroicons/react/16/solid'
import React from 'react'

const Rules = () => {
    const rules = [
        'La hora de llegada es después de las 2:00 PM. La hora de salida es a las 12:00 AM',
        'La liquidación se produce sólo tras el pago completo',
        'Se puede alojarse en el albergue solo después de presentar el pasaporte',
        'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
        'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form',
    ]
    return (
        <div className='grid lg:grid-cols-2 gap-4'>
            {rules.map((rule) => (
                <div className='flex'>
                    <CheckIcon className='text-primary-700 shrink-0 w-6 h-6 mr-1.5' />
                    <span className='text-lg text-neutral-700 font-light '>{rule}</span>
                </div>
            ))}
        </div>
    )
}

export default Rules
