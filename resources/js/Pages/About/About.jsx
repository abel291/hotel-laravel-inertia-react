import Breadcrumb from '@/Components/Breadcrumb'
import Layout from '@/Layouts/Layout'
import { Head } from '@inertiajs/react'
import React from 'react'
import BenefitsHeader from './BenefitsHeader'
import BenefitsList from './BenefitsList'
import Rooms from './Rooms'
import StagesBooking from './StagesBooking'
import RuleReservation from './RuleReservation'
import FrequentlyAsked from './FrequentlyAsked'

const About = ({ page }) => {
    const breadcrumb = [
        {
            title: 'Acerca de '
        },
    ]
    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>

            <Breadcrumb data={breadcrumb} />

            <BenefitsHeader />

            <Rooms />

            <StagesBooking />

            <div className='bg-primary-800/10'>
                <RuleReservation />
            </div>

            <FrequentlyAsked />





        </Layout >
    )
}

export default About
