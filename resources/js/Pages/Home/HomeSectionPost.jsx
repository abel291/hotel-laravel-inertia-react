import CardPost from '@/Components/Card/CardPost'
import TitleSectionLink from '@/Components/TitleSectionLink'

import { EyeIcon, CalendarDaysIcon } from '@heroicons/react/24/outline'
import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const HomeSectionPost = () => {
    const { posts } = usePage().props
    return (
        <section className="py-section">
            <div className='container'>
                <TitleSectionLink title="Noticias Hoteleras" titleLink="Ver todas las noticias" urlLink={route('blog')} />

                <div className='mt-12'>
                    <div className='grid md:grid-cols-2 xl:grid-cols-3 gap-7'>
                        {posts.map((post, index) => (
                            <CardPost key={index} post={post} />
                        ))}
                    </div>
                </div>
            </div>
        </section>
    )
}

export default HomeSectionPost
