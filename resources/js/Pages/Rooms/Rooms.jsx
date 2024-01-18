import Breadcrumb from '@/Components/Breadcrumb'
import Layout from '@/Layouts/Layout'
import { Head } from '@inertiajs/react'
import React from 'react'
import RoomsList from './RoomsList'

const Rooms = ({ page }) => {
    const breadcrumb = [
        {
            title: 'Habitaciones'
        },
    ]
    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>

            <Breadcrumb data={breadcrumb} />

            <RoomsList />

        </Layout >

    )
}

export default Rooms
