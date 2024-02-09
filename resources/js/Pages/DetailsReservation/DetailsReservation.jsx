import Breadcrumb from '@/Components/Breadcrumb'
import Card from '@/Components/Card'
import { formatCurrency } from '@/Helpers/helper'
import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import { CheckCircle2Icon, CheckCircleIcon } from 'lucide-react'
import React from 'react'

const DetailsReservation = ({ reservation }) => {
    const { flash } = usePage().props
    console.log(flash)
    const breadcrumb = [
        {
            title: 'Detalles de reservacion: ' + reservation.code
        },
    ]
    return (
        <Layout>
            <Head>
                <title>{"Orden: " + reservation.code}</title>
            </Head>
            <Breadcrumb data={breadcrumb} />

            <section className='py-section'>
                <div className='container'>
                    <div className='space-y-10'>
                        {flash.orderSuccess && (
                            <div  >
                                <div className="bg-green-100 p-2 md:p-4 flex items-start space-x-2 rounded-lg border border-green-400">
                                    <div>
                                        <CheckCircle2Icon className="h-6 w-6 text-green-600" />
                                    </div>
                                    <div className="text-green-700 flex-grow">
                                        <span className="font-semibold block text-green-600">
                                            Gracias. Tu reservacion ha sido creada.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        )}
                        <Card className="py-4 px-6 ">
                            <dl className='divide-y'>
                                <DetailsDescription title="Número de pedido">
                                    {reservation.code}
                                </DetailsDescription>
                                <DetailsDescription title="Fecha">
                                    {reservation.created_at}
                                </DetailsDescription>
                                <DetailsDescription title="Correo electrónico">
                                    {reservation.data.user.email}
                                </DetailsDescription>
                                <DetailsDescription title="Total">
                                    {formatCurrency(reservation.total)}
                                </DetailsDescription>
                            </dl>
                        </Card>
                        <div>
                            <h4>Informacion de huesped</h4>

                            <Card className="px-8 pb-4 pt-4 mt-4">
                                <dl className='divide-y'>
                                    <DetailsDescription title="Nombre">
                                        {reservation.data.user.name}
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
                                    <DetailsDescription title="Información adicional">
                                        <p className='font-normal'>
                                            {reservation.special_request}
                                        </p>
                                    </DetailsDescription>
                                </dl>
                            </Card>
                        </div>
                        <div>
                            <h4>Detalles de reservacion</h4>

                            <Card className="px-8 pb-2 pt-2 mt-4">
                                <table className='w-full  text-lg table-list'>
                                    <thead>
                                        <tr>
                                            <th className='py-3  font-medium'>Producto</th>
                                            <th className='py-3 text-end font-medium'>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody className='divide-y border-t'>
                                        <tr>
                                            <td className=' align-baseline'>
                                                Habitacion:
                                            </td>
                                            <td className=' '>
                                                {reservation.data.room.name}
                                                <div>
                                                    <span className='block'>
                                                        Adultos: {reservation.adults}
                                                    </span>
                                                    <span className='block'>
                                                        Niños: {reservation.adults}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td className=' align-baseline'>
                                                Fechas de reserva:
                                            </td>
                                            <td className=''>
                                                <span className='block'>
                                                    Llegada: {reservation.start_date}
                                                </span>
                                                <span className='block'>
                                                    Salida: {reservation.end_date}
                                                </span>
                                                <span className='block'>
                                                    {reservation.nights} noche(s)
                                                </span>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td className=' '>
                                                Precio por noche:
                                            </td>
                                            <td className=''>
                                                {formatCurrency(reservation.price)}
                                            </td>
                                        </tr>
                                        <tr >
                                            <td className=' '>
                                                Precio por {reservation.nights} noche(s):
                                            </td>
                                            <td className=''>
                                                {formatCurrency(reservation.sub_total)}
                                            </td>
                                        </tr>


                                        {reservation.offer && (
                                            <tr>
                                                <td className=''>
                                                    Oferta ({reservation.offer.percent})%
                                                </td>
                                                <td className='text-red-500'>
                                                    - {formatCurrency(reservation.offer.offerAmount)}
                                                </td>
                                            </tr>
                                        )}
                                        <tr>
                                            <td className=''>
                                                Sub Total
                                            </td>
                                            <td className=''>
                                                {formatCurrency(reservation.sub_total)}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className=' py-4'>
                                                IVA ({reservation.tax_percent}%)
                                            </td>
                                            <td className=''>
                                                {formatCurrency(reservation.tax_amount)}
                                            </td>
                                        </tr>
                                        <tr className='font-bold'>
                                            <td className=''>
                                                Total
                                            </td>
                                            <td className=''>
                                                {formatCurrency(reservation.total)}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </Card>
                        </div>
                    </div>

                </div>
            </section>
        </Layout >
    )
}
// Número de pedido: 5058
// Fecha: 31 de enero de 2024
// Correo electrónico: usuario@usuario.com
// Total: $43
// Forma de pago: Transferencia bancaria directa
const DetailsDescription = ({ title = '', children }) => {
    return (
        <div className='flex gap-5 py-3'>
            <dt className='font-light'>{title}:</dt>
            <dd className='font-semibold'>{children}</dd>
        </div>
    )

}
export default DetailsReservation
