import React from 'react'

const DetailsDescription = ({ title = '', children }) => {
    return (
        <div className='flex items-end gap-5 py-2 '>
            <dt className=''>{title}:</dt>
            <dd className='font-medium'>{children}</dd>
        </div>
    )

}

export default DetailsDescription
