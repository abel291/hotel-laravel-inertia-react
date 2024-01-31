import { formatCurrency } from '@/Helpers/helper'
import React from 'react'

const PriceOffer = ({ charge }) => {
    return (
        <div className='font-light'>
            <div className='text-lg'>
                <span className='text-3xl font-bold mr-2 '>
                    {formatCurrency(charge.pricePerNight)}
                </span>
                / 1 noche
            </div>

            {(charge.nights > 1) && (
                <div className='mt-2 '>
                    <div className='inline-flex'>
                        <span className='text-lg font-bold mr-2 '>
                            {charge.offer ? (
                                formatCurrency(charge.subTotalOffer)
                            ) : (
                                formatCurrency(charge.subTotal)
                            )}
                        </span>
                        <span>/ {charge.nights} noches</span>
                    </div>
                </div>
            )}
        </div>
    )
}

export default PriceOffer
