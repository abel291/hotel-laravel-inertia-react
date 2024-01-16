import TitleSectionLink from '@/Components/TitleSectionLink'

import { EyeIcon, CalendarDaysIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const Post = () => {
    const { posts } = usePage().props
    return (
        <section className="py-section">
            <div className='container'>
                <TitleSectionLink title="Noticias Hoteleras" titleLink="Ver todas las noticias" urlLink={route('blog')} />

                <div className='mt-7'>
                    <div className='grid md:grid-cols-2 xl:grid-cols-3 gap-7'>
                        {posts.map((post) => (
                            <div key={post.id} className='rounded-lg shadow-lg shadow-neutral-200 overflow-hidden bg-white flex flex-col'>
                                <div className='relative'>
                                    <img className='h-60 w-full object-cover object-center bg-red-300' src={post.thumb} alt="" />
                                    <div className='absolute top-8 left-0 bg-white h-10 px-4 flex items-center rounded-r-lg text-base'>
                                        <span className='font-bold  text-primary-700'>
                                            Travel
                                        </span>

                                    </div>
                                </div>
                                <div className='p-6 grow flex flex-col '>
                                    <Link className="text-2xl  font-bold">
                                        {post.title}
                                    </Link>
                                    <p className='mt-3 text-lg font-light grow'>
                                        {post.entry}
                                    </p>
                                    <div className='mt-3 flex items-center gap-8 text-base text-primary-800'>
                                        <div className='flex items-center'>
                                            <CalendarDaysIcon className='w-6 h-6 mr-1.5' />
                                            <span>{post.time}</span>
                                        </div>
                                        {/* <div className='flex items-center'>
                                            <EyeIcon className='w-6 h-6 mr-1.5' />
                                            <span>120 views</span>
                                        </div> */}

                                    </div>

                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </section>
    )
}

export default Post
