import Card from '@/Components/Card'
import CardRoomOffer from '@/Components/Card/CardRoomOffer'
import ListAmenities from '@/Components/ListAmenities'
import PrimaryButton from '@/Components/PrimaryButton'
import RoomListBeds from '@/Components/RoomListBeds'
import { formatCurrency } from '@/Helpers/helper'
import { Link, useForm, usePage } from '@inertiajs/react'
import React from 'react'

const CardReservationRoom = ({ room }) => {

    const { filters, nights } = usePage().props

    const { data, post, processing } = useForm({
        start_date: filters.start_date,
        end_date: filters.end_date,
        adults: filters.adults,
        kids: filters.kids,
        roomId: room.id
    })

    const handleClickReserve = () => {
        // e.preventDefault()
        post(route('checkoutSession'))
    }

    return (
        <CardRoomOffer room={room} >
            <PrimaryButton
                isLoading={processing}
                disabled={processing}
                className='w-full lg:w-auto'
                onClick={() => handleClickReserve()}
            >
                Reservar ahora
            </PrimaryButton>
        </CardRoomOffer>
    )
}

export default CardReservationRoom
