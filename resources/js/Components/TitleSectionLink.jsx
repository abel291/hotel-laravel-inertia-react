import React from 'react'
import PrimaryButton from './PrimaryButton'
import { Link } from '@inertiajs/react'
import TitleSection from './TitleSection'

const TitleSectionLink = ({ title, titleLink, urlLink, children }) => {
    return (
        <div className='flex flex-col md:flex-row md:items-center md:justify-between'>
            <TitleSection>
                {title}
            </TitleSection>
            {urlLink && (
                <Link data-aos="fade-up" className="shrink-0 btn-secondary  mt-4 md:mt-0 w-full md:w-auto" href={urlLink}>{titleLink}</Link>
            )}
        </div>
    )
}

export default TitleSectionLink
