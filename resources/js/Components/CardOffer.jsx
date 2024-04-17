import React from 'react'
import SecondaryButton from './SecondaryButton'
import { Link } from '@inertiajs/react'
import { usePage } from '@inertiajs/react'
const CardOffer = ({ isButton = true }) => {

    const { offers } = usePage().props
    console.log(offers)
    return (
        offers.length && (
            <div className='md:col-span-2 lg:col-span-1 bg-primary-800 rounded-lg overflow-hidden text-white p-10 '>
                <h3 className='text-3xl font-extrabold  tracking-wide'>Quédese más tiempo, ahorre más</h3>
                <p className='mt-4'>Es simple: ¡cuanto más tiempo permanezcas, más ahorrarás!</p>
                <div className='mt-5 border-l-2 border-white pl-4 py-1'>
                    <p className='text-base'>Ahorre hasta un {offers[0].percent} % en la tarifa diaria para menos de {offers[0].nights} noches</p>
                    <p className='text-base mt-5'>
                        Ahorre hasta un {offers[1].percent} % de descuento en la tarifa por noche entre {offers[0].nights} y {offers[1].nights} noches
                    </p>
                </div>
                {isButton && (
                    <Link href={route('rooms')} className='btn-secondary mt-8'>Elegir habitación</Link>

                )}
            </div>
        )
    )
}

export default CardOffer
