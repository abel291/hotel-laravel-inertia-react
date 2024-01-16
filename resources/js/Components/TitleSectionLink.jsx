import React from 'react'
import PrimaryButton from './PrimaryButton'
import { Link } from '@inertiajs/react'

const TitleSectionLink = ({ title, titleLink, urlLink }) => {
    return (
        <div className='flex flex-col md:flex-row md:items-center md:justify-between'>
            <h2 className='text-3xl sm:text-[40px] sm:leading-none  font-bold tracking-wide'>{title}</h2>
            {urlLink && (
                <Link className="shrink-0 btn-secondary  mt-4 md:mt-0 w-full md:w-auto" href={urlLink}>{titleLink}</Link>
            )}
        </div>
    )
}

export default TitleSectionLink
