import React from 'react'

const SectionRating = () => {
    return (
        <section className='bg-primary py-10' >
            <div className='container'>
                <div className='grid lg:grid-cols-4 gap-14 lg:gap-10 '>

                    <div className='flex flex-col items-center lg:items-start' >
                        <div className='text-lg font-semibold'>
                            <strong className='text-4xl'>8.3</strong>/10
                        </div>
                        <span className=' block mt-1.5 text-lg font-light'>300 comentarios</span>
                        <img className='mt-4 w-48' src="/img/booking.svg" alt="" />
                    </div>

                    <div className='flex flex-col items-center lg:items-start' >
                        <div className='text-lg font-semibold'>
                            <strong className='text-4xl'>4.6</strong>/5
                        </div>
                        <span className=' block mt-1.5 text-lg font-light'>
                            460 notas
                        </span>
                        <img className='mt-4 w-48' src="/img/tripadvisor.svg" alt="" />
                    </div>

                    <div className='flex flex-col items-center lg:items-start' >
                        <div className='text-lg font-semibold'>
                            <strong className='text-4xl'>4.1</strong>/5
                        </div>
                        <span className=' block mt-1.5 text-lg font-light'>1000 notas</span>
                        <img className='mt-4 w-24' src="/img/google.svg" alt="" />
                    </div>
                    <div className='flex flex-col items-center lg:items-start' >
                        <div className='text-lg font-semibold'>
                            <strong className='text-4xl'>93%</strong>
                        </div>
                        <span className=' block mt-1.5 text-lg font-light'>100 comentarios</span>
                        <img className='mt-4 w-56' src="/img/hostel-bookers.svg" alt="" />
                    </div>
                </div>
            </div>
        </section>
    )
}


export default SectionRating
