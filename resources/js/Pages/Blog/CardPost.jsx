import Card from '@/Components/Card'
import TextTime from '@/Components/TextTime'
import { Link } from '@inertiajs/react'
import { CalendarDaysIcon } from 'lucide-react'
import React from 'react'

const CardPost = ({ post }) => {
    return (
        <Card className='grid md:grid-cols-12 lg:grid-cols-1 xl:grid-cols-12 overflow-hidden min-h-60'>
            <div className='md:col-span-5 relative overflow-hidden'>
                <img src={post.thumb} alt={post.alt} className='object-cover object-center h-full hover:scale-110 transition-transform ' />
                <div className='absolute top-7 right-0 bg-white h-10 px-4 flex items-center rounded-l-lg text-base'>
                    <span className='font-bold  text-primary-700'>
                        {post.category.name}
                    </span>
                </div>
            </div>
            <div className='md:col-span-7 p-5 lg:p-8 lg:flex justify-between'>
                <div className='flex flex-col font-light'>

                    <Link href={route('post', { slug: post.slug })} className='font-bold text-2xl transition-color-text duration-700'>
                        {post.title}
                    </Link>

                    <p className=' grow mt-4  md:text-lg  font-light'>
                        {post.entry}
                    </p>
                    <div className='mt-5 flex items-center gap-8  '>
                        <TextTime time={post.time} />
                    </div>
                </div>
            </div>
        </Card>
    )
}

export default CardPost
