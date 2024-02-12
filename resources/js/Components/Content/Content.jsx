import React from 'react'

const Content = ({ children, className }) => {
    return (
        <div className={`relative rounded-lg bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 ${className}`} >
            <div className="h-full w-full p-6 sm:px-8 sm:py-7">
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
