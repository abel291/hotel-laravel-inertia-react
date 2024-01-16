import PrimaryButton from '@/Components/PrimaryButton'
import SecondaryButton from '@/Components/SecondaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ArrowLongRightIcon } from '@heroicons/react/16/solid'
import { UserIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const Rooms = () => {
	const { rooms } = usePage().props
	return (
		<section className='py-section '>
			<div className='container'>
				<TitleSectionLink title="Habitaciones" titleLink="Ver todas las habitaciones" urlLink={route('rooms')} />

				<div className='mt-7'>
					<div className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7'>
						{rooms.map((room) => (
							<div className='rounded-lg shadow-lg shadow-neutral-200 overflow-hidden bg-white flex flex-col'>
								<div className='relative'>
									<img className='h-64 w-full object-cover object-center bg-red-300' src={room.img} alt="" />
									<div className='absolute bottom-8 right-0 bg-white h-10 px-4 flex items-center rounded-l-lg text-base'>
										<span className='font-bold text-xl'>${room.price} </span>
										/ 1 noche
									</div>
								</div>
								<div className='p-6 grow  flex flex-col'>
									<Link className="text-xl lg:text-2xl font-bold grow">
										{room.name}
									</Link>
									<div className='mt-2 flex items-center gap-5 text-lg   '>
										<div className='flex items-center'>
											<UserIcon className='w-6 h-6 mr-2 text-primary-700' />
											{room.adults} Adultos
										</div>
										<div>1 bunk bed</div>
									</div>
									<div className=' text-primary-700 flex items-end mt-4 '>
										<Link className='font-semibold '>Ver disponibilidad</Link>
										<ArrowLongRightIcon className='w-4 h-4 ml-3' />
									</div>
								</div>
							</div>
						))}


						<div className='bg-primary-700 rounded-lg overflow-hidden text-white p-10 '>
							<h3 className='text-3xl font-extrabold  tracking-wide'>Quédese más tiempo, ahorre más</h3>
							<p className='mt-4'>Es simple: ¡cuanto más tiempo permanezcas, más ahorrarás!</p>
							<div className='mt-5 border-l-2 border-white pl-4 py-1'>
								<p className='text-base'>Ahorre hasta un 30 % en la tarifa diaria para más de 14 noches</p>
								<p className='text-base mt-5'>Ahorre hasta un 20 % de descuento en la tarifa por noche entre 7 y 14 noches</p>
							</div>
							<SecondaryButton className='mt-8'>Elige habitación</SecondaryButton>
						</div>
					</div>
				</div>
			</div>

		</section>
	)
}

export default Rooms
