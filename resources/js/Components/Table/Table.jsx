import React from 'react'

export const Table = ({ children }) => {
    return (
        <table className='w-full text-sm'>{children}</table>
    )
}

export const TableHead = ({ children }) => {
    return (
        <thead>
            <tr>
                {children}
            </tr>
        </thead>
    )
}
export const TableHeadRow = ({ children }) => {
    return (
        <th className='py-3.5 px-3 text-start font-semibold border-b'>{children}</th>
    )
}
export const TableBody = ({ children }) => {
    return (
        <tbody className='divide-y'>{children}</tbody>
    )
}
export const TableRow = ({ children, ...props }) => {
    return (
        <tr className='[&>*:last-child]:text-right'>{children}</tr>
    )
}
export const TableCell = ({ children }) => {
    return (
        <td className='px-3 py-3.5 text-start'>{children}</td>
    )
}


