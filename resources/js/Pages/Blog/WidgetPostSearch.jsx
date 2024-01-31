import PrimaryButton from '@/Components/PrimaryButton'
import TextInput from '@/Components/TextInput'
import { useForm, usePage } from '@inertiajs/react'
import { SearchIcon } from 'lucide-react'
import React from 'react'

const WidgetPostSearch = () => {
    const { filters } = usePage().props
    const { data, setData, get, processing, errors } = useForm({
        search: filters.search
    })

    function submit(e) {
        e.preventDefault()
        get(route('blog'))
    }

    return (
        <div>
            <form onSubmit={submit} className='flex items-center gap-x-2'>
                <TextInput value={data.search} onChange={e => setData('search', e.target.value)} />
                <PrimaryButton isLoading={processing} disabled={processing}>
                    Buscar
                </PrimaryButton>
            </form>
        </div>
    )
}

export default WidgetPostSearch
