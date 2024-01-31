import Breadcrumb from '@/Components/Breadcrumb'
import SectionContact from '@/Components/Section/SectionContact'
import SectionRating from '@/Components/Section/SectionRating'
import Layout from '@/Layouts/Layout'
import { Head } from '@inertiajs/react'
import React from 'react'

const Contact = ({ page }) => {
    const breadcrumb = [
        {
            title: 'Información de contactos'
        },
    ]
    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>

            <Breadcrumb data={breadcrumb} />

            <SectionContact />

            <SectionRating />


        </Layout >
    )
}

export default Contact
