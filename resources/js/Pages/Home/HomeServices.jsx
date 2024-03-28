import PrimaryButton from '@/Components/PrimaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ArrowLongRightIcon, BriefcaseIcon, MapPinIcon, WifiIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import { Briefcase, Map, MapIcon, ParkingCircle, Wifi } from 'lucide-react'
import React from 'react'

const HomeServices = () => {
    return (
        <section className='py-section overflow-hidden'>
            <div className='container'>


                <div className='grid xl:grid-cols-12'>
                    <div className='xl:col-span-6 xl:pr-20 flex items-center lg:max-w-2xl xl:max-w-full'>
                        <div>
                            <TitleSectionLink title="Tenemos todo lo que necesitas" />

                            <p className='mt-5 text-lg   font-light'>
                                Cada habitación es un espacio para el relax y la desconexión, donde se conjugan diseño y
                                servicios con una clara inspiración mediterránea.
                            </p>
                            <div className='mt-8 grid md:grid-cols-2 gap-x-5 gap-y-5 font-light text-base'>
                                <div className='flex items-center '>
                                    <div className='mr-3'>
                                        <Wifi className='w-14 h-14 text-primary-800' />
                                    </div>
                                    <p>WiFi de alta velocidad disponible gratis</p>
                                </div>
                                <div className='flex items-center'>
                                    <div className='mr-3'>
                                        <Map className='w-14 h-14 text-primary-800' />
                                    </div>
                                    <p>Ubicación conveniente en el centro.</p>
                                </div>
                                <div className='flex items-center'>
                                    <div className='mr-3'>
                                        <Briefcase className='w-14 h-14 text-primary-800' />
                                    </div>
                                    <p>Almacenamiento gratuito de equipaje de cualquier tamaño.</p>
                                </div>
                                <div className='flex items-center'>
                                    <div className='mr-3'>
                                        <ParkingCircle className='w-14 h-14 text-primary-800 mr-3 ' />
                                    </div>
                                    <p>
                                        Plaza de aparcamiento asignada a usted
                                    </p>

                                </div>
                                <div className='mt-10 flex flex-col-reverse lg:flex-row items-center gap-x-2 md:col-span-2 '>
                                    <PrimaryButton className='w-full lg:w-auto mt-6 lg:mt-0'>Reservar ahora</PrimaryButton>
                                    <Link className=' lg:ml-7 text-primary-700 font-medium text-base'>
                                        Saber mas<ArrowLongRightIcon className='inline-block w-5 h-5 ' />
                                    </Link>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div className='mt-10 xl:mt-0 xl:col-span-6 xl:w-[1000px]'>
                        <img data-aos="fade-up" src="/img/home-2.jpg" alt="" />
                    </div>
                </div>
            </div>
        </section>
    )
}

export default HomeServices
