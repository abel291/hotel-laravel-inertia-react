import { Link } from '@inertiajs/react'
import React from 'react'

const Breadcrumb = ({ data }) => {
    const breadcrumb = [
        {
            title: 'Inicio',
            path: route('home')
        },
        ...data
    ]
    const lastItem = breadcrumb[breadcrumb.length - 1]
    return (
        <header className='bg-primary py-8 lg:py-12'>
            <div className='container '>
                <ul className='flex'>
                    {breadcrumb.map((item, key) => (
                        <li key={key} className='text-lg flex items-center'>
                            {(key != 0) && (
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" className="h-5 w-4 text-gray-500 mr-1">
                                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                </svg>
                            )}
                            <div className="flex items-center ">
                                {item.path ? (
                                    <Link className='font-medium first-letter:capitalize text-primary-700 ' href={item.path} >{item.title}</Link>
                                ) : (
                                    <span href="#" aria-current="page" className="  text-gray-500 hover:text-gray-600 first-letter:capitalize">{item.title}</span>
                                )}
                            </div>
                        </li>
                    ))}

                </ul>
                <h1 className='mt-4 text-4xl lg:text-5xl font-bold max-w-4xl'>{lastItem.title}</h1>
            </div>
        </header>
    )
}



export default Breadcrumb
