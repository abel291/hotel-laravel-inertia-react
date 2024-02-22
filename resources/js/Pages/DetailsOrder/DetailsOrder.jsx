import Breadcrumb from '@/Components/Breadcrumb'
import DetailsReservation from '@/Components/DetailsReservation'
import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import { CheckCircle2Icon, CheckCircleIcon } from 'lucide-react'
import React from 'react'

const DetailsOrder = ({ reservation }) => {
    const { flash } = usePage().props
    console.log(flash)
    const breadcrumb = [
        {
            title: 'Detalles de reservacion: #' + reservation.code
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
                        <DetailsReservation reservation={reservation} />
                    </div>

                </div>
            </section>
        </Layout >
    )
}

export default DetailsOrder
