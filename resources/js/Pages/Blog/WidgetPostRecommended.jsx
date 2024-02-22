import TextTime from '@/Components/TextTime'
import { Link, usePage } from '@inertiajs/react'
import { CalendarDaysIcon } from 'lucide-react'
import React from 'react'

const WidgetPostRecommended = () => {
    const { postsRecommended } = usePage().props

    return (
        <div>
            <h4 >Artículos recomendados</h4>
            <div className='mt-4  space-y-5'>
                {postsRecommended.map((post, index) => (
                    <div key={index}>
                        <ItemPostRecommended post={post} />
                    </div>
                ))}
            </div>
        </div>
    )
}

const ItemPostRecommended = ({ post }) => {
    return (
        <div className='grid grid-cols-12 gap-4'>
            <div className='col-span-5 md:col-span-4 lg:col-span-5'>
                <img src={post.thumb} alt="" className=' lg:h-20 w-full rounded-lg   object-cover object-center' />
            </div>
            <div className='col-span-7 md:col-span-8 lg:col-span-7'>
                <Link href={route('post', { slug: post.slug })} className='font-bold md:text-xl lg:text-base line-clamp-2 transition-color-text '>{post.title}</Link>
                <div className='mt-1.5'>
                    <TextTime time={post.time} withIcon={false} />
                </div>
            </div>
        </div >
    )
}
export default WidgetPostRecommended
