import { formatCurrency, formatDate } from '@/Helpers/helper'
import React from 'react'
import DetailsDescription from './DetailsDescription'
import Card from './Card'

const DetailsReservation = ({ reservation }) => {
    return (
        <div>
            <div className='grid grid-cols-2 gap-5'>
                <div>
                    <h4 className='text-lg font-medium'>Detalles de reservacion</h4>
                    <Card className="py-4 px-6 mt-2 ">
                        <dl className='divide-y'>
                            <DetailsDescription title="Número de pedido">
                                {reservation.code}
                            </DetailsDescription>
                            <DetailsDescription title="Fecha">
                                {formatDate(reservation.created_at)}
                            </DetailsDescription>
                            <DetailsDescription title="Total">
                                {formatCurrency(reservation.total)}
                            </DetailsDescription>
                        </dl>
                    </Card>
                </div>
                <div>
                    <h4 className='text-lg font-medium'>Informacion de huesped</h4>
                    <Card className="px-8 pb-4 pt-4 mt-2">

                        <dl className='divide-y mt-2'>
                            <DetailsDescription title="Nombre">
                                {reservation.data.user.name}
                            </DetailsDescription>
                            <DetailsDescription title="Correo electrónico">
                                {reservation.data.user.email}
                            </DetailsDescription>
                            <DetailsDescription title="Telefono">
                                {reservation.data.user.phone}
                            </DetailsDescription>
                            <DetailsDescription title="Pais">
                                {reservation.data.user.country}
                            </DetailsDescription>
                            <DetailsDescription title="Ciudad">
                                {reservation.data.user.city}
                            </DetailsDescription>
                            {reservation.special_request && (
                                <DetailsDescription title="Información adicional">
                                    <p className='font-normal'>
                                        {reservation.special_request}
                                    </p>
                                </DetailsDescription>
                            )}
                        </dl>
                    </Card>
                </div>
            </div>
            <div className='mt-5'>
                <h4 className='text-lg font-medium'>Detalles de reservacion</h4>

                <Card className="px-8 py-8 mt-2">
                    <table className='w-full table-list'>
                        <thead>
                            <tr>
                                <th className=' font-medium'>Producto</th>
                                <th className='text-end font-medium'>Total</th>
                            </tr>
                        </thead>
                        <tbody className='divide-y border-t'>
                            <tr>
                                <td className=' align-baseline'>
                                    Habitacion:
                                </td>
                                <td>
                                    {reservation.data.room.name}
                                </td>
                            </tr>
                            <tr>
                                <td>Adultos</td>
                                <td>
                                    {reservation.adults}
                                </td>
                            </tr>
                            {reservation.kids > 0 && (
                                <tr>
                                    <td>Niños</td>
                                    <td>
                                        {reservation.kids}
                                    </td>
                                </tr>
                            )}
                            <tr>
                                <td>Fechas de entrada</td>
                                <td>
                                    {formatDate(reservation.start_date)}
                                </td>
                            </tr>
                            <tr>
                                <td>Fechas de salida</td>
                                <td>
                                    {formatDate(reservation.end_date)}
                                </td>
                            </tr>

                            <tr >
                                <td>
                                    Precio por noche:
                                </td>
                                <td >
                                    {formatCurrency(reservation.price)}
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    Precio por {reservation.nights} noche(s):
                                </td>
                                <td >
                                    {formatCurrency(reservation.sub_total)}
                                </td>
                            </tr>


                            {reservation.offer && (
                                <tr>
                                    <td >
                                        Oferta ({reservation.offer.percent})%
                                    </td>
                                    <td className='text-red-500'>
                                        - {formatCurrency(reservation.offer.offerAmount)}
                                    </td>
                                </tr>
                            )}
                            <tr>
                                <td >
                                    Sub Total
                                </td>
                                <td >
                                    {formatCurrency(reservation.sub_total)}
                                </td>
                            </tr>
                            <tr>
                                <td className=' py-4'>
                                    IVA ({reservation.tax_percent}%)
                                </td>
                                <td >
                                    {formatCurrency(reservation.tax_amount)}
                                </td>
                            </tr>
                            <tr className='font-bold'>
                                <td >
                                    Total
                                </td>
                                <td >
                                    {formatCurrency(reservation.total)}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </Card>
            </div>
        </div>
    )
}

export default DetailsReservation
