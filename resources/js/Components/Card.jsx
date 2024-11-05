import React from 'react'

const Card = ({ className, children, ...props }) => {
    return (
        <div className={"rounded-lg shadow bg-white border-none " + className} {...props}>{children}</div>
    )
}

export default Card
