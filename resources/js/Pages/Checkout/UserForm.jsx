import Card from '@/Components/Card'
import Checkbox from '@/Components/Checkbox'
import InputError from '@/Components/InputError'
import TextInput from '@/Components/TextInput'
import { useForm, usePage } from '@inertiajs/react'
import React from 'react'

const UserForm = ({ handleChange, formUser }) => {

    return (
        <Card className="p-8" >
            <div className='grid lg:grid-cols-12 gap-x-5 gap-y-6 '>

                <div className=' lg:col-span-10' >
                    <label htmlFor="email" className='  text-sm font-medium mb-1 block'>Email</label>
                    <TextInput disabled id='email' defaultValue={formUser.data.email} className="w-full" />
                    <InputError message={formUser.errors.email} className="mt-2" />
                </div>

                <div className=' lg:col-span-6'>
                    <label htmlFor="name" className='text-sm font-medium mb-1 block'>Nombre</label>
                    <TextInput onChange={handleChange} id='name' defaultValue={formUser.data.name} />
                    <InputError message={formUser.errors.name} className="mt-2" />
                </div>

                <div className='lg:col-span-6'>
                    <label htmlFor="phone" className='text-sm font-medium mb-1 block'>Telefono</label>
                    <TextInput onChange={handleChange} id='phone' defaultValue={formUser.data.phone} />
                    <InputError message={formUser.errors.phone} className="mt-2" />
                </div>

                <div className=' lg:col-span-6'>
                    <label htmlFor="country" className='text-sm font-medium mb-1 block'>Pais</label>
                    <TextInput onChange={handleChange} id='country' defaultValue={formUser.data.country} />
                    <InputError message={formUser.errors.country} className="mt-2" />
                </div>
                <div className=' lg:col-span-6'>
                    <label htmlFor="city" className='text-sm font-medium mb-1 block'>Ciudad</label>
                    <TextInput onChange={handleChange} id='city' defaultValue={formUser.data.city} />

                </div>

                <div className='lg:col-span-12'>
                    <label htmlFor="note" className='text-sm font-medium mb-1 block'>Comentario o petición (opcional)</label>
                    <textarea onChange={handleChange} defaultValue={formUser.data.note} id='note' rows={4} className='textarea-form '></textarea>
                    <InputError message={formUser.errors.note} className="mt-2" />
                </div>

                <div className='lg:col-span-12'>
                    <div className='flex'>
                        <div className='flex h-6 items-center'>
                            <Checkbox id="newsletter"
                                onChange={handleChange}
                                checked={formUser.data.newsletter}
                            />
                        </div>
                        <label htmlFor="newsletter" className='ml-2 block'>
                            Deseo recibir información, descuentos de hotel y beneficios del club de fidelización Star Traveler.
                        </label>
                    </div>
                    <InputError message={formUser.errors.newsletter} className="mt-2" />
                </div>

                <div className='lg:col-span-12'>
                    <div className='flex'>
                        <div className='flex h-6 items-center'>
                            <Checkbox id="terms"
                                onChange={handleChange}
                                type="checkbox"
                                className='input-checkbox'
                                defaultValue={formUser.data.terms}
                            />
                        </div>
                        <label htmlFor="terms" className='ml-2 block'>
                            Sí, he leído y acepto las siguientes condiciones generales de contratación y condiciones de la tarifa
                        </label>
                    </div>
                    <InputError message={formUser.errors.terms} className="mt-2" />
                </div>


            </div>

        </Card>
    )
}

export default UserForm
