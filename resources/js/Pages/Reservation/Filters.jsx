import InputDate from '@/Components/InputDate'
import PrimaryButton from '@/Components/PrimaryButton'
import { useForm, usePage } from '@inertiajs/react'
import { Baby, CalendarDays, UserRound } from 'lucide-react'
import React from 'react'

const Filters = () => {
    const { filters } = usePage().props

    const { data, setData, get, processing } = useForm({
        start_date: filters.start_date,
        end_date: filters.end_date,
        adults: filters.adults,
        kids: filters.kids || 0
    })
    const optionInputDate = {
        mode: 'range',
        minDate: "today",
        defaultDate: [data.start_date, data.end_date]

    }
    const handleSubmit = (e) => {
        e.preventDefault()
        get(route('search-room'), {
            preserveScroll: true
        })
    }

    return (
        <section className='bg-primary py-8 lg:py-12  '>
            <div className='container'>

                <form onSubmit={handleSubmit} className=' grid grid-cols-2 lg:grid-cols-6 xl:grid-cols-7 gap-x-6 gap-y-4'>
                    <div className=' col-span-2 lg:col-span-6 xl:col-span-3'>
                        <label className='font-medium'>Llegada - Salida</label>
                        <InputGroup Icon={CalendarDays}>
                            <InputDate
                                id="dateRange"
                                options={optionInputDate}
                                className='select-form '
                                onChange={(date, dateString) => {
                                    let dateArray = dateString.split(' a ')
                                    setData('start_date', dateArray[0])
                                    if (dateArray[1]) {
                                        setData('end_date', dateArray[1])
                                    }
                                }}
                            />
                        </InputGroup>

                    </div>
                    <div>
                        <label htmlFor="adults" className='font-medium'>Adultos</label>
                        <InputGroup Icon={UserRound}>
                            <select id="adults" value={data.adults} className='select-form  ' onChange={(e) => setData('adults', e.target.value)}>
                                <option disabled>Adultos</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </InputGroup>
                    </div>
                    <div>
                        <label htmlFor="kids" className='font-medium'>Niños</label>
                        <InputGroup Icon={Baby}>
                            <select id="kids" value={data.kids} className='select-form  ' onChange={(e) => setData('kids', e.target.value)}>
                                <option disabled>Niños</option>
                                <option value="0">sin niños</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </InputGroup>
                    </div>

                    <div className='col-span-2  self-end'>
                        <PrimaryButton disabled={processing} isLoading={processing} className='w-full'>
                            Buscar Habitacion
                        </PrimaryButton>
                    </div>

                </form>

            </div>
        </section>
    )
}

const InputGroup = ({ children, Icon }) => {
    return (
        <div>
            <div className="relative mt-1  flex items-center ">
                <Icon strokeWidth={1.5} className='w-6 h-6 text-primary-700 mr-3 shrink-0' />
                {children}
            </div>
        </div>
    )
}

export default Filters
