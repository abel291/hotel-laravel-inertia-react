import { useForm, usePage } from '@inertiajs/react'
import React from 'react'

const UseReservation = () => {
    const { errors } = usePage().props
    const currentDate = new Date()
    const formReservation = useForm({
        start_date: new Date().toISOString().slice(0, 10),
        end_date: new Date(currentDate.setDate(currentDate.getDate() + 7)).toISOString().slice(0, 10),
        adults: 1,
        kids: 0,
    })

    const optionInputDate = {
        minDate: "today",
    }

    const handleSubmit = (e) => {
        e.preventDefault()
        formReservation.get(route('search-room'), {
            // preserveScroll: true,
            // preserveState: true
        })
    }
    return { handleSubmit, formReservation, optionInputDate, errors }
}

export default UseReservation
