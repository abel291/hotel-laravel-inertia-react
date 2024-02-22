import Card from '@/Components/Card'
import React, { useContext } from 'react'
import { CheckoutContext } from './Checkout';
import { Link, usePage } from '@inertiajs/react';
import { formatCurrency } from '@/Helpers/helper';
import PrimaryButton from '@/Components/PrimaryButton';
import RoomListBeds from '@/Components/RoomListBeds';

const OrderSummary = ({ handleClickReservation, formUser }) => {
    const { room, reservation, charge } = usePage().props;

    return (
        <Card className=' overflow-hidden'>
            {/* Gracias. Tu orden ha sido recibida. */}

            <div className="p-8 bg-white  divide-dashed divide-y">
                <div className='pb-3'>
                    <ItemOrderSummary title="Habitacion">
                        <div className='text-right'>
                            <Link href={route('room', { slug: room.slug })} className="text-primary-700 font-medium ">{room.name} d</Link>
                        </div>
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Adultos">
                        {reservation.adults}
                    </ItemOrderSummary>

                    {(reservation.kids > 0) && (
                        <ItemOrderSummary title="Niños">
                            {reservation.kids}
                        </ItemOrderSummary>
                    )}

                    <ItemOrderSummary title="Noches">
                        {reservation.nights} noche(s)
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Fehca llegada">
                        {reservation.start_date}
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Fecha Salida">
                        {reservation.end_date}
                    </ItemOrderSummary>

                    <ItemOrderSummary title="Precio por noche">
                        {formatCurrency(room.price)}
                    </ItemOrderSummary>
                </div>
                <div className='py-3'>
                    {charge.offer && (
                        <>
                            <ItemOrderSummary title={formatCurrency(room.price) + " x " + charge.nights + " noche(s)"}>
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
                        isLoading={formUser.processing}
                        disabled={formUser.processing}
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
        <div className="py-1.5  flex items-start justify-between text-base">
            <div className='font-light'>
                {title}
            </div>
            <span>
                {children}
            </span>
        </div>
    )
}

export default OrderSummary
