import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { BuildingOffice2Icon, HomeModernIcon, UserGroupIcon } from '@heroicons/react/24/outline'
import { usePage } from '@inertiajs/react'
import React from 'react'

const RoomPrice = () => {
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
                                <InfoItem Icon={BuildingOffice2Icon} title="Territorio del albergue" entry="Consequat interdum varius sit amet mattis" />
                                <InfoItem Icon={UserGroupIcon} title="Acomoda invitados" entry="Consequat interdum varius sit amet mattis" />
                                <InfoItem Icon={HomeModernIcon} title="Invitados agradecidos" entry="Consequat interdum varius sit amet mattis" />
                            </div>
                        </div>
                    </div>
                    <div className='relative  sm:px-10 lg:px-0'>
                        <img src={cheapRoom.thumb} className='w-full rounded-lg lg:h-[600px] object-cover object-center' alt="" />
                        <div className='hidden sm:block absolute bottom-9 w-80 -left-2 lg:-left-40'>
                            <div className='p-11  shadow-lg  bg-white rounded-xl'>
                                <h4 className='text-2xl font-bold'> {cheapRoom.name}</h4>
                                <p className='mt-3 text-lg font-light'>
                                    <strong className='text-3xl font-extrabold'>${cheapRoom.price}</strong> / 1 night
                                </p>
                                <SecondaryButton className='mt-5'>Ver disponibilidad</SecondaryButton>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    )
}
const InfoItem = ({ Icon, title, entry }) => {
    return (
        <div className='flex items-center'>
            <div className='bg-primary-700 w-20 h-20 flex items-center justify-center mr-5 rounded-lg'>
                <Icon className="w-12 h-12 text-white" />
            </div>
            <div>
                <h4 className='font-bold text-xl'>{title}</h4>
                <p className='max-w-44'>{entry}</p>
            </div>
        </div>
    )
}

export default RoomPrice
