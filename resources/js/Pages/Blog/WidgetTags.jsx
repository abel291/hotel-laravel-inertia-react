import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const WidgetTags = () => {
    const { tags, filters } = usePage().props
    return (
        <div>
            <h4>Tags</h4>
            <div className='mt-4'>
                <ul role="list" className="flex-1 flex flex-wrap gap-y-2 gap-x-1 ">
                    {tags.map((tag, index) => (
                        <li key={index}>
                            <Link href={route('blog', { tag: tag.slug })} className={
                                ((filters?.tag == tag.slug)
                                    ? 'bg-primary text-primary-700 font-medium '
                                    : ' hover:text-primary-800 font-light  ') +
                                '  block rounded-md  px-3 py-1.5'}>

                                <span className=" leading-6 ">
                                    {tag.name}
                                </span>

                            </Link>
                        </li>
                    ))}
                </ul>
            </div>
        </div >
    )
}

export default WidgetTags
