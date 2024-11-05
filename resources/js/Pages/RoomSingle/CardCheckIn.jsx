import Card from '@/Components/Card'
import InputDate from '@/Components/InputDate'
import InputError from '@/Components/InputError'
import PriceOffer from '@/Components/PriceOffer'
import PrimaryButton from '@/Components/PrimaryButton'
import { formatCurrency } from '@/Helpers/helper'
import UseReservation from '@/Hooks/UseReservation'
import { CalendarDaysIcon } from '@heroicons/react/24/outline'
import { useForm, usePage } from '@inertiajs/react'
import { BabyIcon, UserRound } from 'lucide-react'
import React, { useState } from 'react'

const CardCheckIn = ({ room, charge }) => {
    const { handleSubmit, formReservation, optionInputDate, errors } = UseReservation();
    return (
        <Card className=" p-8 lg:px-8 lg:pt-8 lg:pb-6 ">
            <div>
                <PriceOffer charge={charge} />
            </div>
            <form onSubmit={handleSubmit} className='mt-7 space-y-4'>
                <div>
                    <label htmlFor="" className='font-medium'>Llegada</label>
                    <div className='flex items-center mt-1 border-b'>
                        <CalendarDaysIcon className='w-7 h-7 text-primary-700' />
                        <InputDate
                            options={optionInputDate}
                            className='w-full ring-none focus:ring-0 border-none'
                            value={formReservation.data.start_date}
                            onChange={(date, dateString) => {
                                formReservation.setData('start_date', dateString)
                            }}
                        />
                    </div>
                    <InputError message={errors.start_date} className="mt-2" />
                </div>
                <div >
                    <label htmlFor="" className='font-medium'>Salida</label>
                    <div className='flex items-center mt-1 border-b'>
                        <CalendarDaysIcon className='w-7 h-7 text-primary-700' />
                        <InputDate
                            options={optionInputDate}
                            className='w-full ring-none focus:ring-0 border-none'
                            value={formReservation.data.end_date}
                            onChange={(date, dateString) => {
                                formReservation.setData('end_date', dateString)
                            }}
                        />
                    </div>
                    <InputError message={errors.end_date} className="mt-2" />
                </div>
                <div className='flex items-center gap-x-4'>
                    <div className='w-full'>
                        <label htmlFor="kids" className='font-medium'>Adultos</label>
                        <div className='flex items-center mt-1 border-b pb-1'>
                            <UserRound strokeWidth={1.5} className='w-6 h-6 text-primary-700 mr-3 shrink-0' />
                            <select
                                id="adults"
                                className=' ring-none ring-0 focus:ring-0 border-none shadow-none'
                                onChange={(e) => formReservation.setData('adults', e.target.value)}
                            >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                    <div className='w-full'>
                        <label htmlFor="kids" className='font-medium'>Niños</label>
                        <div className='flex items-center mt-1 border-b pb-1'>
                            <BabyIcon strokeWidth={1.5} className='w-6 h-6 text-primary-700 mr-3 shrink-0' />
                            <select id="kids"
                                className=' ring-none ring-0 focus:ring-0 border-none shadow-none'
                                onChange={(e) => formReservation.setData('kids', e.target.value)}
                            >
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div className='mt-12'>
                    <PrimaryButton
                        disabled={formReservation.processing}
                        isLoading={formReservation.processing}
                        className='w-full'
                    >
                        Reservar ahora
                    </PrimaryButton>
                </div>
            </form>

        </Card >
    )
}

export default CardCheckIn
