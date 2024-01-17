import InfoIconItem from '@/Components/InfoIconItem'
import TitleSection from '@/Components/TitleSection'
import { CalendarDaysIcon, ClipboardDocumentCheckIcon, KeyIcon } from '@heroicons/react/24/outline'
import React from 'react'

const StagesBooking = () => {

    return (
        <section className='py-section'>
            <div className='container'>
                <div className='grid lg:grid-cols-2 gap-10 lg:gap-20'>
                    <div className='flex items-center lg:max-w-2xl'>
                        <div className=''>
                            <TitleSection>
                                Etapas de la reserva de una habitación.
                            </TitleSection>
                            <div className='mt-7 space-y-8'>
                                <InfoIconItem Icon={CalendarDaysIcon} title="Reserva de habitación">
                                    There are many variations of passages of Lorem Ipsum available
                                </InfoIconItem>
                                <InfoIconItem Icon={ClipboardDocumentCheckIcon} title="Relleno de documentos y pago.">
                                    All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                </InfoIconItem>
                                <InfoIconItem Icon={KeyIcon} title="Registrarse en el albergue">
                                    College in Virginia, looked up one of the more obscure Latin words, consectetur
                                </InfoIconItem>
                            </div>
                        </div>
                    </div>
                    <div className='relative  sm:px-10 lg:px-0'>
                        <img src='/img/hotel-reception.jpg' className='w-full rounded-lg lg:h-[600px] object-cover object-center' alt="" />
                    </div>
                </div>


            </div>
        </section>
    )
}



export default StagesBooking
