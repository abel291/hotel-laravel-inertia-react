
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ClockIcon, EnvelopeIcon, PhoneIcon, MapPinIcon } from '@heroicons/react/24/outline'
import React from 'react'

const Contact = () => {
    return (
        <section className='pt-section overflow-hidden'>
            <div className='container'>


                <div className='grid xl:grid-cols-12'>
                    <div className='xl:col-span-7 pr-16 flex items-center'>
                        <div>
                            <TitleSectionLink title="Contactenos" />

                            <p className='mt-4 text-xl font-light md:max-w-md'>
                                Gestas pretium aenean pharetra magna ac. Et tortor consequat id porta nibh venenatis cras sed
                            </p>
                            <div className='mt-8 grid md:grid-cols-2 gap-x-5 gap-y-8'>
                                <InfoItem Icon={PhoneIcon} title={"Telefono"}>
                                    <a class="block" href="tel:+1234567890">(123) 123-12312</a>
                                    <a class="block" href="tel:+1234567890">(133) 123-4455</a>
                                </InfoItem>
                                <InfoItem Icon={EnvelopeIcon} title={"Email"}>
                                    <a class="block" href="mailto:example@domain.com">contact@example.com</a>
                                    <a class="block" href="mailto:example@domain.com">contact@example.com</a>
                                </InfoItem>
                                <InfoItem Icon={MapPinIcon} title={"Ubicacion"}>
                                    <span>
                                        54826 Fadel Circles
                                        Darrylstad, AZ 90995
                                    </span>
                                </InfoItem>
                                <InfoItem Icon={ClockIcon} title={"Horario"}>
                                    <span>Cada día <br />
                                        10am a 8pm horas
                                    </span>
                                </InfoItem>

                            </div>

                        </div>
                    </div>
                    <div className='mt-10 xl:mt-0 xl:col-span-5 xl:w-[1000px]  h-96 xl:h-[600px]'>
                        <iframe className='w-full h-full' src="https://maps.google.com/maps?q=seul&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" ></iframe>
                    </div>
                </div>
            </div>
        </section>
    )
}

const InfoItem = ({ Icon, title, children }) => {
    return (
        <div>
            <div className='flex items-center'>
                <div className='flex-shrink-0 w-20 h-20 bg-primary-700/20 rounded-lg mr-4 flex items-center justify-center'>
                    <Icon className="text-primary-800 w-9 h-9" />
                </div>
                <div>
                    <h4 className='text-xl font-bold'>{title}</h4>
                    <div className='font-light text-base'>
                        {children}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Contact
