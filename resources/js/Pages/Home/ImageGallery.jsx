import { ArrowsPointingOutIcon } from '@heroicons/react/24/outline'
import React from 'react'

const ImageGallery = ({ className = '', img = '' }) => {
    return (
        <div className={className + ' rounded-lg overflow-hidden relative group h-full '}>
            <img src={img} className='w-full h-full object-cover object-center ease-out duration-500 transition-transform transform group-hover:scale-125' alt="" />

            <div className='transition-opacity duration-500 opacity-0 group-hover:opacity-100 absolute inset-0 bg-primary0 flex items-center justify-center'>
                <ArrowsPointingOutIcon className=' w-28 h-2w-28 text-white' />
            </div>
        </div>
    )
}

export default ImageGallery
