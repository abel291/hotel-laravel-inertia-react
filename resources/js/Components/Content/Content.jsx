import React from 'react'

const Content = ({ children, className }) => {
    return (
        <div className={`relative w-full rounded-lg bg-white border ${className}`} >
            <div className="h-full w-full p-6 py-8 sm:p-8 ">
                {children}
            </div>
        </div >
    )
}

export const ContentTitle = ({ children, className }) => {
    return (
        <h2 className="text-lg leading-6 font-semibold">{children}</h2>
    )
}

export default Content
