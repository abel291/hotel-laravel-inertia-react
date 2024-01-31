import Card from '@/Components/Card'
import InputDate from '@/Components/InputDate'
import InputError from '@/Components/InputError'
import PriceOffer from '@/Components/PriceOffer'
import PrimaryButton from '@/Components/PrimaryButton'
import { formatCurrency } from '@/Helpers/helper'
import { CalendarDaysIcon } from '@heroicons/react/24/outline'
import { useForm } from '@inertiajs/react'
import { BabyIcon, UserRound } from 'lucide-react'
import React, { useState } from 'react'

const CardCheckIn = ({ room, charge }) => {

    const currentDate = new Date()
    const { data, setData, processing, get, errors } = useForm({
        startDate: new Date(),
        endDate: new Date(currentDate.setDate(currentDate.getDate() + charge.nights)),
        adults: 1,
        kids: 0,
    })
    const optionInputDate = {
        minDate: "today",
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        get(route('search-reservation'))
    }
    return (
        <Card className=" p-8 lg:px-12 lg:pt-12 lg:pb-8 ">
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
                            value={data.startDate}
                            onChange={(date, dateString) => {
                                setData('startDate', date[0])
                            }}
                        />
                    </div>
                    <InputError message={errors.startDate} className="mt-2" />
                </div>
                <div >
                    <label htmlFor="" className='font-medium'>Salida</label>
                    <div className='flex items-center mt-1 border-b'>
                        <CalendarDaysIcon className='w-7 h-7 text-primary-700' />
                        <InputDate
                            options={optionInputDate}
                            className='w-full ring-none focus:ring-0 border-none'
                            value={data.endDate}
                            onChange={(date, dateString) => {
                                setData('endDate', date[0])
                            }}
                        />
                    </div>
                    <InputError message={errors.endDate} className="mt-2" />
                </div>
                <div className='flex items-center gap-x-4'>
                    <div className='w-full'>
                        <label htmlFor="kids" className='font-medium'>Adultos</label>
                        <div className='flex items-center mt-1 border-b pb-1'>
                            <UserRound strokeWidth={1.5} className='w-6 h-6 text-primary-700 mr-3 shrink-0' />
                            <select id="adults" className='select-form ring-none ring-0 focus:ring-0 border-none shadow-none' onChange={(e) => setData('adults', e.target.value)}>
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
                            <select id="kids" className='select-form ring-none ring-0 focus:ring-0 border-none shadow-none' onChange={(e) => setData('kids', e.target.value)}>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div className='mt-7'>
                    <PrimaryButton disabled={processing} isLoading={processing} className='w-full'>Reservar ahora</PrimaryButton>
                </div>
            </form>

        </Card >
    )
}

export default CardCheckIn
