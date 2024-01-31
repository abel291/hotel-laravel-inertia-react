import { Link, usePage } from '@inertiajs/react'
import React from 'react'

const WidgetCategories = () => {
    const { categories, filters } = usePage().props
    return (
        <div>
            <h4 >Categorias</h4>
            <div className='mt-4'>
                <ul role="list" className="flex-1 flex flex-col gap-1 ">
                    {categories.map((category, index) => (
                        <li key={index}>
                            <Link href={route('blog', { category: category.slug })} className={
                                ((filters?.category == category.slug)
                                    ? 'bg-primary-700/5 text-primary-700 font-medium '
                                    : ' hover:text-primary-800 font-light hover:bg-primary-700/5  ') +
                                '  block rounded-md px-5 py-3 '}>

                                <span className=" text-lg leading-6 ">
                                    {category.name}
                                </span>

                            </Link>
                        </li>
                    ))}
                </ul>
            </div>
        </div>
    )
}



export default WidgetCategories
