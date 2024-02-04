import { Link } from '@inertiajs/react'
import React from 'react'

const LinkDelete = ({ ...props }) => {
    return (
        <Link {...props} className="text-red-600 hover:text-red-700 font-medium">Eliminar</Link>
    )
}

export default LinkDelete
