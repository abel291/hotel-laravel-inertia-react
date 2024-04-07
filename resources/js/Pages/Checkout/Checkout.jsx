import Breadcrumb from '@/Components/Breadcrumb'
import Layout from '@/Layouts/Layout'
import { Head, useForm, usePage } from '@inertiajs/react'
import React, { createContext } from 'react'
import ShippingAddress from './UserForm';
import OrderSummary from './OrderSummary';
import UserForm from './UserForm';

export const CheckoutContext = createContext();

const Checkout = ({ }) => {
    const breadcrumb = [
        {
            title: 'Checkout'
        },
    ]
    const { auth, note } = usePage().props

    const { } = usePage().props
    const formUser = useForm({
        email: auth.user.email,
        name: auth.user.name,
        phone: auth.user.phone,
        country: auth.user.country,
        city: auth.user.city,
        note: '',
        newsletter: false,
        terms: false,

    })
    function handleChange(e) {
        const key = e.target.id;
        let value
        if (e.target.type == 'checkbox') {
            value = e.target.checked
        } else {
            value = e.target.value
        }
        formUser.setData(key, value)
    }

    function handleClickReservation(e) {
        e.preventDefault()
        formUser.post(route('create-reservation'), {
            preserveScroll: true,
        })
    }
    return (
        <Layout>
            <Head>
                <title>Sistema de reservacion</title>
            </Head>

            <Breadcrumb data={breadcrumb} />

            <CheckoutContext.Provider value={formUser}>
                <section className='py-section'>
                    <div className='container grid lg:grid-cols-12 gap-16'>
                        <div className=' lg:col-span-7'>
                            <div>
                                <h4 className="font-medium block mb-3 ">
                                    Información del contacto
                                </h4>
                                <UserForm handleChange={handleChange} formUser={formUser} />
                            </div>

                            {/* <div className='mt-5'>
                                <h4 className="font-medium block mb-3 ">
                                    Información del Pago
                                </h4>
                            </div> */}

                        </div>
                        <div className=' lg:col-span-5'>
                            <h4 className="font-medium block mb-3 ">Resumen del pedido</h4>
                            <OrderSummary handleClickReservation={handleClickReservation} formUser={formUser} />
                        </div>
                    </div>
                </section>
            </CheckoutContext.Provider>

        </Layout>
    )
}

export default Checkout

