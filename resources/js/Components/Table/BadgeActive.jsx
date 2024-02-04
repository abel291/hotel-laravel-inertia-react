import React from 'react'
import Badge from '../Badge'

const BadgeActive = ({ active }) => {
    return (
        active ? (
            <Badge color="green">Activo</Badge>
        ) : (
            <Badge color="gray">Inactivo</Badge>
        )
    )
}

export default BadgeActive
