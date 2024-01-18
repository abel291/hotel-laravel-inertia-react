import Card from '@/Components/Card'
import SecondaryButton from '@/Components/SecondaryButton'
import TitleEntry from '@/Components/TitleEntry'
import TitleSection from '@/Components/TitleSection'
import { Disclosure, Transition } from '@headlessui/react'
import { ChevronUpIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import React from 'react'

const FrequentlyAsked = () => {

    const faqs = [
        {
            ask: '¿Cómo se elige el dormitorio adecuado?',
            answer: 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero'
        },
        {
            ask: '¿Cuántas personas hay en una habitación de hotel?',
            answer: 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero'
        },
        {
            ask: '¿Hay habitaciones privadas en el hotel ?',
            answer: 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero'
        },
        {
            ask: '¿Cómo mantengo mis cosas seguras en un dormitorio?',
            answer: 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero'
        },
        {
            ask: '¿Cómo te mantienes seguro en un dormitorio?',
            answer: 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero'
        },
    ]
    return (
        <section className='py-section'>
            <div className='container'>
                <TitleEntry>
                    <TitleEntry.Title>
                        Preguntas frecuentes sobre el Hotel
                    </TitleEntry.Title>
                    <TitleEntry.Entry>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                    </TitleEntry.Entry>
                </TitleEntry>


                <div className='mt-8 grid md:grid-cols-2 xl:grid-cols-3 gap-6'>
                    {faqs.map((faq, index) => (
                        <div key={index}>
                            <AccordionFaq faq={faq} />
                        </div>
                    ))}

                    <div>
                        <div className="rounded-lg shadow-neutral bg-primary-800 p-5 md:p-6 text-white">
                            <h4 className='font-bold text-xl '>
                                ¿Tiene usted alguna pregunta?
                            </h4>
                            <p className='mt-5'>
                                Lorem Ipsum is therefore always free from repetition
                            </p>
                            <Link href={route('contact')} className="mt-6 btn-secondary">Hacer una pregunta</Link>
                        </div>
                    </div>


                </div>
            </div>
        </section >
    )
}


const AccordionFaq = ({ faq }) => {
    return (
        <Card className="p-5 md:p-6">
            <Disclosure>
                {({ open }) => (
                    <>
                        <Disclosure.Button className="flex w-full justify-between items-center">
                            <span className='font-bold text-xl text-primary-800 text-left'>
                                {faq.ask}
                            </span>
                            <ChevronUpIcon
                                className={`${open ? 'rotate-180 transform' : ''
                                    } h-5 w-5 text-primary-800`}
                            />
                        </Disclosure.Button>

                        <Transition
                            enter="transition duration-100 ease-out"
                            enterFrom="transform scale-95 opacity-0"
                            enterTo="transform scale-100 opacity-100"
                            leave="transition duration-75 ease-out"
                            leaveFrom="transform scale-100 opacity-100"
                            leaveTo="transform scale-95 opacity-0"
                        >
                            <Disclosure.Panel className="font-light">
                                <p className='mt-3'>
                                    {faq.answer}
                                </p>
                            </Disclosure.Panel>
                        </Transition>
                    </>
                )}
            </Disclosure>
        </Card>
    )
}

export default FrequentlyAsked
