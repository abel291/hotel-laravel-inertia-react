import Card from '@/Components/Card'
import PrimaryButton from '@/Components/PrimaryButton'
import TextInput from '@/Components/TextInput'
import TitleSection from '@/Components/TitleSection'
import { CheckIcon } from '@heroicons/react/24/outline'
import React from 'react'

const RuleReservation = () => {
    return (
        <section className='py-section'>
            <div className='container'>
                <div className='grid lg:grid-cols-2 gap-10 lg:gap-20'>
                    <div className='lg:max-w-md'>
                        <TitleSection>
                            Acuerdo de reglas
                        </TitleSection>
                        <div className='mt-7'>
                            <ul className='space-y-5'>
                                <RuleItem>
                                    La hora de llegada es después de las 14:00. La hora de salida es a las 12-00.
                                </RuleItem>
                                <RuleItem>
                                    ¿La liquidación se produce sólo tras el pago completo?
                                </RuleItem>
                                <RuleItem>
                                    ¿Se puede alojarse en el albergue solo después de presentar el pasaporte?
                                </RuleItem>
                                <RuleItem>
                                    But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                </RuleItem>
                            </ul>
                        </div>
                    </div>
                    <div className=''>
                        <Card className="p-6 lg:p-14">
                            <TitleSection>
                                We are ready answer your question
                            </TitleSection>
                            <div className='mt-10 lg:mt-10 grid lg:grid-cols-2 gap-2 lg:gap-4'>

                                <TextInput placeholder="Nombre" />
                                <TextInput placeholder="Email" />
                                <textarea className='lg:col-span-2 input-textarea'>


                                </textarea>
                                <div className='mt-2'>
                                    <PrimaryButton className='w-full lg:w-auto'>Envia mensaje</PrimaryButton>
                                </div>
                            </div>
                        </Card>
                    </div>

                </div>
            </div>

        </section>

    )
}


const RuleItem = ({ children }) => {
    return (
        <li className='flex  text-lg text-primary-900 font-light'>
            <CheckIcon className=' w-6 h-6 mr-2 shrink-0' />
            {children}
        </li>
    )
}

export default RuleReservation
