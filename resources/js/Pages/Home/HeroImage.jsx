import PrimaryButton from '@/Components/PrimaryButton'
import React from 'react'
import Flatpickr from "react-flatpickr";
import "flatpickr/dist/themes/material_blue.css";

import { useForm } from '@inertiajs/react';
import { CalendarDays, UserRound } from 'lucide-react';
import InputDate from '@/Components/InputDate';
import UseReservation from '@/Hooks/UseReservation';
const HeroImage = () => {
    const { handleSubmit, formReservation, optionInputDate, errors } = UseReservation();

    return (

        <div className='overflow-hidden py-section lg:pt-10'>
            <div className='container w-full '>
                <div className='grid grid-cols-1 lg:grid-cols-12'>
                    <div className='lg:col-span-8 xl:col-span-7 flex items-center'>

                        <form className='relative' onSubmit={handleSubmit}>
                            <div className=' -z-10 bg-primary-700/5 absolute -inset-36 -top-20 -bottom-20 rounded-l-xl'></div>

                            <div className='z-10 lg:pr-20'>
                                <h1 className="max-w-4xl text-4xl sm:text-5xl font-bold lg:text-[52px]">
                                    <span className='text-primary-600'> Hotel Boka</span>: El confort y descanso que necesitas
                                </h1>
                                <p className="font-medium max-w-2xl mt-6 text-lg lg:text-lg opacity-75  pl-4 border-l-4 border-primary-600">
                                    El Hotel Boka representa un concepto de alojamiento innovador, con prestaciones y
                                    espacios donde prima el confort de cada huésped, todo ello revestido por un diseño
                                    sorprendente e innovador.
                                </p>

                            </div>
                            <div className='mt-10 mr-0 md:mr-4 xl:mr-0 p-5 lg:p-4 flex flex-wrap lg:flex-nowrap gap-6 xl:gap-0 shadow-lg shadow-primary-700/5  rounded-lg lg:rounded-l-lg  lg:rounded-r-none bg-white relative'>
                                <div className='grow'>
                                    <div className='lg:pr-4 lg:pl-8 xl:border-r-2 xl:border-primary-100'>
                                        <label htmlFor="" className='font-bold'>Llegada</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <CalendarDays strokeWidth={1.5} className='w-6 h-6 text-primary-700 mr-3' />
                                            <InputDate
                                                options={{
                                                    mode: 'range',
                                                    defaultDate: [formReservation.data.start_date, formReservation.data.end_date],
                                                    ...optionInputDate
                                                }}
                                                className='w-full ring-none focus:ring-0 border-none'

                                                onChange={(date, dateString) => {
                                                    let dateArray = dateString.split(' a ')
                                                    formReservation.setData('start_date', dateArray[0])
                                                    if (dateArray[1]) {
                                                        formReservation.setData('end_date', dateArray[1])
                                                    }
                                                }}
                                            />
                                        </div>
                                    </div>
                                </div>
                                {/* <div>
                                    <div className='lg:px-4 xl:border-r-2 xl:border-primary-100'>

                                        <label htmlFor="" className='font-bold'>Salida</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <CalendarDaysIcon className='w-6 h-6 text-primary-700' />
                                            <select className='select-form border-none'>
                                                <option value="">Añada fecha</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> */}
                                <div>
                                    <div className='lg:px-4 '>
                                        <label htmlFor="" className='font-bold'>Adultos</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <UserRound strokeWidth={1.5}
                                                className='w-6 h-6 text-primary-700 mr-3 shrink-0' />
                                            <select
                                                className='ring-none ring-0 focus:ring-0 border-none shadow-none'
                                                onChange={(e) => formReservation.setData('adults', e.target.value)}
                                            >
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div className='self-end xl:hidden w-full'>
                                    <PrimaryButton className='w-full'>Buscar</PrimaryButton>
                                </div>
                                <button className='hidden xl:block absolute shrink-0 w-36 -right-36 inset-y-0 rounded-r-lg outline-2 outline-offset-2 transition-colors bg-primary-600 text-white hover:bg-primary-500 active:bg-primary-800 active:text-white/80'>Buscar</button>
                            </div>
                        </form>
                    </div>
                    <div className=' hidden lg:block lg:col-span-4 xl:col-span-5 w-[1050px]'>
                        <img src="/img/bed.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    )
}

export default HeroImage
