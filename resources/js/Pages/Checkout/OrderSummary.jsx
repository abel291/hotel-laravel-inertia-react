import Card from '@/Components/Card'
import React, { useContext } from 'react'
import { CheckoutContext } from './Checkout';
import { Link, usePage } from '@inertiajs/react';
import { formatCurrency } from '@/Helpers/helper';
import PrimaryButton from '@/Components/PrimaryButton';

const OrderSummary = ({ handleClickReservation, formUser }) => {
    const { room, reservation, charge } = usePage().props;


    return (
        <Card className=' overflow-hidden'>

            <div className="p-8 bg-white  divide-dashed divide-y">
                <div className='pb-3'>
                    <ItemOrderSummary title="Habitacion">
                        <Link href={route('room', { slug: room.slug })} className="text-primary-700 font-medium ">{room.name} d</Link>
                    </ItemOrderSummary>
                    <ItemOrderSummary title="Adultos">
                        {reservation.adults}
                    </ItemOrderSummary>

                    {reservation.kids && (
                        <ItemOrderSummary title="Niños">
                            {reservation.kids}
                        </ItemOrderSummary>
                    )}

                    <ItemOrderSummary title="Noches">
                        {reservation.nights} noche(s)
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Fehca llegada">
                        {reservation.startDate}
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Fecha Salida">
                        {reservation.endDate}
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Precio por noche">
                        {formatCurrency(room.price)}
                    </ItemOrderSummary>
                </div>
                <div className='py-3'>
                    {charge.offer && (
                        <>
                            <ItemOrderSummary title={"Precio por " + charge.nights + " noche(s)"}>
                                {formatCurrency(charge.subTotal)}
                            </ItemOrderSummary>

                            <ItemOrderSummary title={"Oferta (" + charge.offer.percent + "%)"}>
                                <span className='text-red-500'>-{formatCurrency(charge.offer.offerAmount)}</span>
                            </ItemOrderSummary>
                        </>
                    )}

                    <ItemOrderSummary title="Sub total">
                        {formatCurrency(charge.subTotalOffer)}
                    </ItemOrderSummary>

                    <ItemOrderSummary title={"IVA (" + charge.taxPercent + "%)"}>
                        {formatCurrency(charge.taxAmount)}
                    </ItemOrderSummary>
                </div>

                <div className='py-2'>
                    <ItemOrderSummary title="Monto a Pagar">
                        <span className='font-bold text-lg'>{formatCurrency(charge.total)}</span>
                    </ItemOrderSummary>
                </div>
                <div className="py-3 ">
                    <p className=" text-gray-400 text-sm ">
                        Los precios incluyen los impuestos.
                        La disponibilidad de las habitaciones podría variar durante el proceso de compra.
                    </p>
                </div>
                <div className="pt-3 ">
                    <PrimaryButton
                        onClick={handleClickReservation}
                        className='w-full'
                        isLoading={true}
                        disabled={true}
                    >
                        Reservar
                    </PrimaryButton>
                </div>
            </div>

        </Card >
    )
}

const ItemOrderSummary = ({ title, children }) => {
    return (
        <div className="py-1  flex items-center justify-between text-base">
            <div>
                {title}
            </div>
            <span className=" text-gray-600">
                {children}
            </span>
        </div>
    )
}

export default OrderSummary
