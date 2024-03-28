import React from 'react'

const Card = ({ className, children, ...props }) => {
    return (
        <div className={"rounded-lg shadow-sm bg-white " + className} {...props}>{children}</div>
    )
}

export default Card
