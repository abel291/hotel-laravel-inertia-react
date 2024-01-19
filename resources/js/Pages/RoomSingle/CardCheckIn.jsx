import Card from '@/Components/Card'
import PrimaryButton from '@/Components/PrimaryButton'
import { CalendarDaysIcon } from '@heroicons/react/24/outline'
import React from 'react'

const CardCheckIn = ({ room }) => {
    return (
        <Card className=" p-8 lg:px-12 lg:pt-12 lg:pb-8 ">
            <div>
                <span className='font-light'>
                    <strong className='text-3xl lg:text-4xl font-bold'>{room.price_format}</strong>  / 1 noche

                </span>
            </div>
            <div className='mt-7'>
                <div className=''>
                    <label htmlFor="" className='font-bold'>Llegada</label>
                    <div className='flex items-center mt-2 border-b pb-1'>
                        <CalendarDaysIcon className='w-7 h-7 text-primary-700' />
                        <select className='select-form border-none font-light '>
                            <option value="">Añade fecha de entrada</option>
                        </select>
                    </div>
                </div>
                <div className='mt-4'>
                    <label htmlFor="" className='font-bold'>Salida</label>
                    <div className='flex items-center mt-2 border-b pb-1'>
                        <CalendarDaysIcon className='w-7 h-7 text-primary-700' />
                        <select className='select-form border-none font-light '>
                            <option value="">Añade fecha de salida</option>
                        </select>
                    </div>
                </div>


            </div>
            <div className='mt-7'>
                <PrimaryButton className='w-full'>Reservar ahora</PrimaryButton>
            </div>
        </Card >
    )
}

export default CardCheckIn
