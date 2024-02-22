import InfoIconItem from '@/Components/InfoIconItem'
import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { formatCurrency } from '@/Helpers/helper'
import { BuildingOffice2Icon, HomeModernIcon, UserGroupIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const HomeSectionRoomPrice = () => {
    const { cheapRoom } = usePage().props
    return (
        <section className='py-section'>
            <div className='container relative '>
                <div className='grid lg:grid-cols-2 gap-20'>
                    <div className='flex items-center max-w-2xl'>
                        <div className=''>
                            <TitleSectionLink title=" Encuentre alojamiento económico adecuado" />

                            <p className='text-lg mt-4 font-light'>
                                Nuestras habitaciones dobles son funcionales, modernas y cuentan con todo tipo de detalles. Pensadas y adaptadas a los gustos de nuestros huéspedes.
                            </p>
                            <div className='mt-7 space-y-8'>
                                <InfoIconItem colorIcon="text-white" bgIcon="bg-primary-700" Icon={BuildingOffice2Icon} title="Territorio del albergue">
                                    Consequat interdum varius sit amet mattis"
                                </InfoIconItem>
                                <InfoIconItem colorIcon="text-white" bgIcon="bg-primary-700" Icon={UserGroupIcon} title="Acomoda invitados">
                                    Consequat interdum varius sit amet mattis"
                                </InfoIconItem>
                                <InfoIconItem colorIcon="text-white" bgIcon="bg-primary-700" Icon={HomeModernIcon} title="Invitados agradecidos">
                                    Consequat interdum varius sit amet mattis"
                                </InfoIconItem>
                            </div>
                        </div>
                    </div>
                    <div className='relative  sm:px-10 lg:px-0'>
                        <img src={cheapRoom.thumb} className='w-full rounded-lg lg:h-[600px] object-cover object-center' alt="" />
                        <div className='hidden sm:block absolute bottom-9 w-80 -left-2 lg:-left-40'>
                            <div className='p-11  shadow-lg  bg-white rounded-xl'>
                                <h4 className='text-2xl font-bold'> {cheapRoom.name}</h4>
                                <p className='mt-3 text-lg font-light'>
                                    <strong className='text-3xl font-extrabold'>{formatCurrency(cheapRoom.price)}</strong> / 1 noche
                                </p>
                                <Link href={route('room', { slug: cheapRoom.slug })} className='btn btn-secondary mt-5'>Ver disponibilidad</Link>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    )
}


export default HomeSectionRoomPrice
