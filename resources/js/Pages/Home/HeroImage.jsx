import PrimaryButton from '@/Components/PrimaryButton'
import TextInput from '@/Components/TextInput'
import { CalendarDaysIcon, UserIcon } from '@heroicons/react/24/outline'
import React from 'react'

const HeroImage = () => {
    return (
        // <section className="bg-[url('/img/home.jpg')] bg-cover bg-center h-[800px] flex items-center -mt-28 relative z-10">
        //     <div className="absolute inset-0 bg-gray-700 opacity-60 rounded-md "></div>
        //     <div className="container w-full  z-20 ">
        //         <div >

        //             <div >
        //                 <h1 className="max-w-4xl text-4xl font-bold tracking-tight text-white  sm:text-7xl">
        //                     Hotel Medellin: El confort y descanso que necesitas
        //                 </h1>
        //                 <p className=" font-light max-w-2xl mt-6 text-xl leading-8 text-white pl-4 border-l-4 border-primary-500">
        //                     El Hotel Medellin representa un concepto de alojamiento innovador, con prestaciones y
        //                     espacios donde prima el confort de cada huésped, todo ello revestido por un diseño
        //                     sorprendente e innovador.
        //                 </p>
        //             </div>
        //         </div>

        //     </div>
        // </section>
        <div className='overflow-hidden pb-section lg:pt-10'>
            <div className='container w-full '>
                <div className='grid grid-cols-1 lg:grid-cols-12'>
                    <div className='lg:col-span-8 xl:col-span-7 flex items-center'>

                        <div className='relative'>
                            <div className=' -z-10 bg-primary-700/5 absolute -inset-36 -top-20 -bottom-20 rounded-l-xl'></div>

                            <div className='z-10 lg:pr-20'>
                                <h1 className="max-w-4xl text-4xl sm:text-5xl font-bold lg:text-[52px]">
                                    Hotel Medellin: El confort y descanso que necesitas
                                </h1>
                                <p className=" font-light max-w-2xl mt-6 text-lg lg:text-xl  pl-4 border-l-4 border-primary-600">
                                    El Hotel Medellin representa un concepto de alojamiento innovador, con prestaciones y
                                    espacios donde prima el confort de cada huésped, todo ello revestido por un diseño
                                    sorprendente e innovador.
                                </p>

                            </div>
                            <div className='mt-10 mr-0 md:mr-4 xl:mr-0 p-5 lg:p-4 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-0 shadow-lg shadow-primary-700/5  rounded-lg lg:rounded-l-lg  bg-white relative'>
                                <div>
                                    <div className='lg:pr-4 lg:pl-8 xl:border-r-2 xl:border-primary-100'>
                                        <label htmlFor="" className='font-bold'>Llegada</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <CalendarDaysIcon className='w-6 h-6 text-primary-700' />
                                            <select className='select-form border-none'>
                                                <option value="">Añada fecha</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div className='lg:px-4 xl:border-r-2 xl:border-primary-100'>

                                        <label htmlFor="" className='font-bold'>Salida</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <CalendarDaysIcon className='w-6 h-6 text-primary-700' />
                                            <select className='select-form border-none'>
                                                <option value="">Añada fecha</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div className='lg:px-4 '>
                                        <label htmlFor="" className='font-bold'>Adultos</label>
                                        <div className='flex items-center mt-1 border-b pb-1'>
                                            <UserIcon className='w-6 h-6 text-primary-700' />
                                            <select className='select-form border-none'>
                                                <option value="">Adultos</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div className='self-end'>
                                    <PrimaryButton className='xl:hidden  w-full'>Buscar</PrimaryButton>
                                </div>
                                <button className='hidden xl:block absolute shrink-0 w-36 -right-36 inset-y-0 rounded-r-lg outline-2 outline-offset-2 transition-colors bg-primary-600 text-white hover:bg-primary-700 active:bg-primary-800 active:text-white/80'>Buscar</button>
                            </div>
                        </div>
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
