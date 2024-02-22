import Breadcrumb from '@/Components/Breadcrumb'
import InputError from '@/Components/InputError'
import PrimaryButton from '@/Components/PrimaryButton'
import TextInput from '@/Components/TextInput'
import Layout from '@/Layouts/Layout'
import { Head, router, useForm, usePage } from '@inertiajs/react'
import React from 'react'

const SearchReservation = ({ errors }) => {
    // const { errors } = usePage().props
    const breadcrumb = [
        {
            title: 'Verificar datos de la reservacion '
        },
    ]
    const { data, setData, get, processing } = useForm({
        code: null
    })
    console.log(errors)

    function handleChange(e) {
        setData('code', e.target.value)
    }

    function handleSubmit(e) {
        e.preventDefault()
        get(route('details-reservation'), {
            preserveScroll: true,
            preserveState: true
        })
    }

    return (
        <Layout>

            <Head>
                <title>Reservacion</title>
            </Head>

            <Breadcrumb data={breadcrumb} />

            <section className='py-section'>
                <div className='container'>
                    <form onSubmit={handleSubmit} className='max-w-xl mx-auto' >
                        <h4>Buscar estado de la Reservacion</h4>
                        <div className='grid lg:grid-cols-12 gap-x-5 gap-y-6 items-end mt-4'>
                            <div className=' lg:col-span-10' >
                                <label htmlFor="code" className='text-sm font-medium mb-1 block'>Numero de reservacion</label>
                                <TextInput required placeholder="ejp:441934" onChange={handleChange} id='code' defaultValue={data.code} className="w-full" />
                            </div>
                            <div>
                                <PrimaryButton isLoading={processing} disabled={processing}>Buscar</PrimaryButton>
                            </div>
                        </div>
                        <InputError message={errors.code} className="mt-2" />
                    </form>
                </div>
            </section>
        </Layout>
    )
}

export default SearchReservation
