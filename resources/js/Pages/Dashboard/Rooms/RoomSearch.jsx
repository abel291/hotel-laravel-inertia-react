import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import Spinner from '@/Components/Spinner'
import TextInput from '@/Components/TextInput'
import { Link, router, useForm, usePage } from '@inertiajs/react'
import React from 'react'

const RoomSearch = ({ rounteName }) => {
    const { filters } = usePage().props

    const { data, setData, get, processing } = useForm({
        q: filters.q,
    });

    const handleSearch = (e) => {
        e.preventDefault()
        get(route(rounteName), {
            preserveScroll: true
        })
    }
    return (
        <form onSubmit={handleSearch} className="flex items-center gap-x-3">
            <TextInput required defaultValue={filters.q} onChange={e => setData('q', e.target.value)} placelholder="Busqueda" />
            {/* <Select name="sort" onChange={() => setData('sort')} placeholder="Orden">
                <option >Ordenar por:</option>
                <option value="name-asc">Nombre - a-z</option>
                <option value="name-desc">Nombre - z-a</option>
                <option value="fecha">Fecha</option>
                <option value="email">Email</option>
            </Select> */}

            <PrimaryButton disabled={processing} isLoading={processing}>
                Buscar
            </PrimaryButton>
            <Link href={route(rounteName)} className="btn-secondary">Limpiar</Link>

        </form>
    )
}

export default RoomSearch
