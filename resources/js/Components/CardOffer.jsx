import React from 'react'
import SecondaryButton from './SecondaryButton'

const CardOffer = ({ isButton = true }) => {
    return (
        <div className='md:col-span-2 lg:col-span-1 bg-primary-800 rounded-lg overflow-hidden text-white p-10 '>
            <h3 className='text-3xl font-extrabold  tracking-wide'>Quédese más tiempo, ahorre más</h3>
            <p className='mt-4'>Es simple: ¡cuanto más tiempo permanezcas, más ahorrarás!</p>
            <div className='mt-5 border-l-2 border-white pl-4 py-1'>
                <p className='text-base'>Ahorre hasta un 30 % en la tarifa diaria para más de 14 noches</p>
                <p className='text-base mt-5'>Ahorre hasta un 20 % de descuento en la tarifa por noche entre 7 y 14 noches</p>
            </div>
            {isButton && (
                <SecondaryButton className='mt-8'>Elige habitación</SecondaryButton>
            )}
        </div>
    )
}

export default CardOffer
