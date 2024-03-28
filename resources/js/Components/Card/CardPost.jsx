import { Link } from '@inertiajs/react'
import { CalendarDaysIcon } from 'lucide-react'
import React from 'react'

const CardPost = ({ post }) => {
    return (
        <Link data-aos="fade-up" href={route('post', { slug: post.slug })}>
            <div className='rounded-lg shadow overflow-hidden bg-white flex flex-col'>
                <div className='relative'>
                    <img className='h-60 w-full object-cover object-center bg-primary-300' src={post.thumb} alt="" />
                    <div className='absolute top-8 left-0 bg-white h-10 px-4 flex items-center rounded-r-lg text-base'>
                        <span className='font-bold text-primary-700'>
                            {post.category.name}
                        </span>
                    </div>
                </div>
                <div className='p-6 grow flex flex-col '>
                    <h3 className="text-2xl  font-semibold">
                        {post.title}
                    </h3>
                    <p className='mt-3 font-light grow'>
                        {post.entry}
                    </p>
                    <div className='mt-3 flex items-center gap-8 text-base text-primary-800'>
                        <div className='flex items-center'>
                            <CalendarDaysIcon className='w-6 h-6 mr-1.5' />
                            <span>{post.time}</span>
                        </div>
                    </div>
                </div>
            </div>
        </Link>
    )
}

export default CardPost
