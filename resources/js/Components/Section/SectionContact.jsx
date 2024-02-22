
import InfoIconItem from '@/Components/InfoIconItem'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ClockIcon, EnvelopeIcon, PhoneIcon, MapPinIcon } from '@heroicons/react/24/outline'
import React from 'react'

const SectionContact = () => {
    return (
        <section className='py-section overflow-hidden'>
            <div className='container'>
                <div className='grid xl:grid-cols-12'>
                    <div className='xl:col-span-7 pr-16 flex items-center'>
                        <div>
                            <TitleSectionLink title="Contactenos" />

                            <p className='mt-4 text-xl font-light md:max-w-md'>
                                Gestas pretium aenean pharetra magna ac. Et tortor consequat id porta nibh venenatis cras sed
                            </p>
                            <div className='mt-8 grid md:grid-cols-2 gap-x-5 gap-y-8'>
                                <InfoIconItem Icon={PhoneIcon} title={"Telefono"}>
                                    <a className="block" href="tel:+1234567890">(123) 123-12312</a>
                                    <a className="block" href="tel:+1234567890">(133) 123-4455</a>
                                </InfoIconItem>
                                <InfoIconItem Icon={EnvelopeIcon} title={"Email"}>
                                    <a className="block" href="mailto:example@domain.com">contact@example.com</a>
                                    <a className="block" href="mailto:example@domain.com">contact@example.com</a>
                                </InfoIconItem>
                                <InfoIconItem Icon={MapPinIcon} title={"Ubicacion"}>
                                    <span>
                                        54826 Fadel Circles
                                        Darrylstad, AZ 90995
                                    </span>
                                </InfoIconItem>
                                <InfoIconItem Icon={ClockIcon} title={"Horario"}>
                                    <span>Cada día <br />
                                        10am a 8pm horas
                                    </span>
                                </InfoIconItem>

                            </div>

                        </div>
                    </div>
                    <div className='mt-10 xl:mt-0 xl:col-span-5 xl:w-[1000px]  h-96 xl:h-[600px]'>
                        <iframe className='w-full h-full' src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4199.365982346307!2d126.97709811129519!3d37.56606362097688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1708541725053!5m2!1ses-419!2sco" allowFullScreen="" loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    )
}



export default SectionContact
