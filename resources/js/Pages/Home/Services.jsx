import PrimaryButton from '@/Components/PrimaryButton'
import TitleSectionLink from '@/Components/TitleSectionLink'
import { ArrowLongRightIcon, BriefcaseIcon, MapPinIcon, WifiIcon } from '@heroicons/react/24/outline'
import { Link } from '@inertiajs/react'
import React from 'react'

const Services = () => {
	return (
		<section className='py-section overflow-hidden'>
			<div className='container'>


				<div className='grid xl:grid-cols-12'>
					<div className='xl:col-span-6 xl:pr-20 flex items-center lg:max-w-2xl xl:max-w-full'>
						<div>
							<TitleSectionLink title="Tenemos todo lo que necesitas" />

							<p className='mt-5 text-lg   font-light'>
								Cada habitación es un espacio para el relax y la desconexión, donde se conjugan diseño y
								servicios con una clara inspiración mediterránea.
							</p>
							<div className='mt-8 grid md:grid-cols-2 gap-x-5 gap-y-5 font-light text-base'>
								<div className='flex items-center '>
									<div className='mr-3'>
										<WifiIcon className='w-16 h-1w-16 text-primary-800' />
									</div>
									<p>WiFi de alta velocidad disponible gratis</p>
								</div>
								<div className='flex items-center'>
									<div className='mr-3'>
										<MapPinIcon className='w-16 h-1w-16 text-primary-800' />
									</div>
									<p>Ubicación conveniente en el centro.</p>
								</div>
								<div className='flex items-center'>
									<div className='mr-3'>
										<BriefcaseIcon className='w-16 h-16 text-primary-800' />
									</div>
									<p>Almacenamiento gratuito de equipaje de cualquier tamaño.</p>
								</div>
								<div className='flex items-center'>
									<div className='mr-3'>
										<svg className='w-16 h-16 text-primary-800' viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" clipRule="evenodd" d="M23.8125 17.6466H32.3944C36.9672 17.6466 40.6875 21.3669 40.6875 25.9395V26.2285C40.6875 30.8012 36.9672 34.5215 32.3944 34.5215H26.625V42.3535H23.8125V17.6466ZM32.3944 31.7091C35.4164 31.7091 37.875 29.2505 37.875 26.2286V25.9396C37.875 22.9177 35.4164 20.4591 32.3944 20.4591H26.625V31.7091H32.3944Z" fill="currentColor"></path><path fillRule="evenodd" clipRule="evenodd" d="M30 6C36.4106 6 42.4375 8.49638 46.9706 13.0294C51.5035 17.5625 54 23.5895 54 30C54 36.4105 51.5035 42.4375 46.9706 46.9706C42.4375 51.5036 36.4106 54 30 54C23.5894 54 17.5625 51.5035 13.0295 46.9705C8.49647 42.4375 6 36.4105 6 30C6 23.5895 8.49647 17.5625 13.0294 13.0294C17.5625 8.49638 23.5894 6 30 6ZM30 51.1875C35.6593 51.1875 40.98 48.9836 44.9819 44.9819C48.9836 40.98 51.1875 35.6593 51.1875 30C51.1875 24.3407 48.9836 19.02 44.9819 15.0181C40.98 11.0164 35.6593 8.8125 30 8.8125C24.3406 8.8125 19.02 11.0164 15.0182 15.0181C11.0164 19.02 8.8125 24.3407 8.8125 30C8.8125 35.6593 11.0164 40.98 15.0182 44.9818C19.02 48.9836 24.3406 51.1875 30 51.1875Z" fill="currentColor"></path></svg>
									</div>
									<p>
										Plaza de aparcamiento asignada a usted
									</p>
								</div>
							</div>
							<div className='mt-10 flex flex-col-reverse lg:flex-row items-center gap-x-2 '>
								<PrimaryButton className='w-full lg:w-auto mt-6 lg:mt-0'>Reservar ahora</PrimaryButton>
								<Link className=' lg:ml-7 text-primary-700 font-medium text-base'>
									Saber mas<ArrowLongRightIcon className='inline-block w-5 h-5 ' />
								</Link>
							</div>
						</div>
					</div>
					<div className='mt-10 xl:mt-0 xl:col-span-6 xl:w-[1000px]'>
						<img src="/img/home-2.jpg" alt="" />
					</div>
				</div>
			</div>
		</section>
	)
}

export default Services
