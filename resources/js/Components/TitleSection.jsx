import React from 'react'

const TitleSection = ({ children }) => {
    return (
        <h2 data-aos="fade-right" className='text-3xl lg:text-4xl xl:text-[40px] xl:leading-none font-bold tracking-wide'>
            {children}
        </h2>
    )
}

export default TitleSection
