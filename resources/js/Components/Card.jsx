import React from 'react'

const Card = ({ className, children }) => {
    return (
        <div className={"rounded-lg shadow-sm bg-white " + className}>{children}</div>
    )
}

export default Card
