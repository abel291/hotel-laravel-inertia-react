import Card from '@/Components/Card'
import DangerButton from '@/Components/DangerButton'
import PrimaryButton from '@/Components/PrimaryButton'
import BadgeActive from '@/Components/Table/BadgeActive'
import LinkDelete from '@/Components/Table/LinkDelete'
import { Table, TableBody, TableCell, TableHead, TableHeadRow, TableRow } from '@/Components/Table/Table'
import TableTitleImage from '@/Components/Table/TableTitleImage'
import { formatCurrency } from '@/Helpers/helper'
import DashboardLayout from '@/Layouts/Dashboard/DashboardLayout'
import { Head, Link } from '@inertiajs/react'
import React from 'react'
import RoomSearch from './RoomSearch'
import ListAmenities from '@/Components/ListAmenities'
import Dropdown from '@/Components/Dropdown'
import { ChevronDownIcon } from 'lucide-react'
import RoomListBeds from '@/Components/RoomListBeds'
import CountBeds from '@/Components/CountBeds'

const RoomList = ({ rooms }) => {
    console.log(rooms.data[0].beds)
    const headList = [
        'Nombre',
        'Comodidades',
        'Tipos de camas',
        'Cantidad',
        'Precio x noche',
        'Activo',
        'opciones',
    ]
    return (
        <DashboardLayout header="Habitaciones" >

            <Head title="Habitaciones" />

            <div className="mt-6  flex justify-between items-center">
                <RoomSearch rounteName="dashboard.rooms.index" />
                <div>
                    <Link href={route('dashboard.rooms.create')} className="btn btn-primary">Create Habitacion</Link>
                </div>
            </div>

            <Card className="mt-6 p-5">
                <div className="relative w-full ">
                    <Table>
                        <TableHead>
                            {headList.map((name, index) => (
                                <TableHeadRow key={index}>
                                    {name}
                                </TableHeadRow>
                            ))}
                        </TableHead>

                        <TableBody>
                            {rooms.data.map((room) => (
                                <TableRow key={room.id}>
                                    <TableCell>
                                        <TableTitleImage
                                            title={room.name}
                                            img={room.thumb}
                                            path={route('room', { slug: room.slug })}
                                            subTitle={room.slug}
                                        />

                                    </TableCell>
                                    <TableCell>
                                        <div className='max-w-80'>
                                            <ListAmenities amenities={room.amenities} />

                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        <div>
                                            {room.beds.map((bed) => (
                                                <div className='flex items-center whitespace-nowrap'>
                                                    <img src={bed.icon} className='w-6 h-6 mr-2 text-primary-800' />
                                                    <span className='text-sm'>{bed.quantity} {bed.name}</span>
                                                </div>
                                            ))}
                                        </div>
                                    </TableCell>
                                    <TableCell>
                                        {room.quantity}
                                    </TableCell>
                                    <TableCell>
                                        <span className='font-medium'>
                                            {formatCurrency(room.price)}
                                        </span>
                                    </TableCell>
                                    <TableCell>
                                        <BadgeActive active={room.active} />

                                    </TableCell>
                                    <TableCell>
                                        <div className='flex gap-x-4'>
                                            <RoomListOptionsEdit roomId={room.id} />
                                            <Link className="table-button-option-danger">Eliminar</Link>
                                        </div>
                                    </TableCell>
                                </TableRow>
                            ))}

                        </TableBody>
                    </Table>
                </div>
            </Card>

        </DashboardLayout>
    )
}
const RoomListOptionsEdit = ({ roomId }) => {
    return (
        <Dropdown>
            <Dropdown.Trigger>
                <button type="button" className="table-button-option">
                    <div className='flex items-center'>
                        <span>Editar</span>
                        <div>
                            <ChevronDownIcon className="ml-1 h-4 w-4 " />
                        </div>
                    </div>
                </button>
            </Dropdown.Trigger>

            <Dropdown.Content align='left'>
                <Dropdown.Link href={route('dashboard.rooms.edit', roomId)}>Habitacion</Dropdown.Link>
                <Dropdown.Link href={route('profile.edit')}>Comodidaes</Dropdown.Link>
                <Dropdown.Link href={route('profile.edit')}>Camas</Dropdown.Link>
                <Dropdown.Link href={route('profile.edit')}>Imagenes</Dropdown.Link>
            </Dropdown.Content>
        </Dropdown>
    )
}


export default RoomList
