import React from 'react'
import TitleSection from './TitleSection'

const TitleEntry = ({ title, children }) => {
    return (
        <div className='lg:flex items-center justify-between'>
            {children}
        </div>
    )
}

const Title = ({ children }) => {
    return (
        <div className='lg:max-w-lg'>
            <TitleSection>
                {children}
            </TitleSection>
        </div>
    )
}
const Entry = ({ children }) => {
    return (
        <p className='text-lg lg:max-w-lg mt-4 lg:mt-0 lg:text-right font-light'>
            {children}
        </p>
    )
}
TitleEntry.Title = Title
TitleEntry.Entry = Entry

export default TitleEntry
