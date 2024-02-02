import { ArrowLongRightIcon } from '@heroicons/react/16/solid'
import { UserIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import React from 'react'
import CountAdults from './CountAdults'
import CountBeds from './CountBeds'
import { formatCurrency } from '@/Helpers/helper'

const CardRoom = ({ room }) => {
	return (
		<div key={room.id} className='rounded-lg shadow overflow-hidden bg-white flex flex-col'>
			<div className='relative'>
				<img className='h-64 w-full object-cover object-center bg-red-300' src={room.thumb} alt="" />
				<div className='absolute bottom-8 right-0 bg-white h-10 px-4 flex items-center rounded-l-lg text-base'>
					<span className='font-bold text-xl'>{formatCurrency(room.price)} </span>
					/ 1 noche
				</div>
			</div>
			<div className='p-6  h-full flex flex-col'>
				<Link href={route('room', { slug: room.slug })} className="text-xl lg:text-2xl font-bold ">
					{room.name}
				</Link>
				<p className='font-light mt-3 text-lg grow '>{room.entry}</p>
				<div className='mt-4 flex items-center gap-5 text-lg   '>
					<CountAdults quantityAdults={room.adults} />
					<CountBeds bed={room.beds[0]} />
				</div>
				<div className=' text-primary-700 flex items-end mt-4 hover:translate-x-5 transition-transform transform duration-300 '>
					<Link href={route('room', { slug: room.slug })} className='font-semibold '>Ver disponibilidad</Link>
					<ArrowLongRightIcon className='w-4 h-4 ml-3' />
				</div>
			</div>
		</div>
	)
}

export default CardRoom
