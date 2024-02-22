import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import React from 'react'
import HeroImage from './HeroImage'
import Rooms from './Rooms'
import HomeServices from './HomeServices'
import HomeSectionPhotos from './HomeSectionPhotos'
import RoomPrice from './RoomPrice'
import HomeSectionPost from './HomeSectionPost'
import SectionContact from '@/Components/Section/SectionContact'


const Home = ({ page }) => {

    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>

            <HeroImage />

            <Rooms />

            <div className='bg-primary-800/5'>
                <HomeServices />
            </div>

            <HomeSectionPhotos />

            <div className='bg-primary-800/5'>
                <RoomPrice />
            </div>

            <HomeSectionPost />

            <div className='bg-primary-800/5'>

                <SectionContact />

            </div>


        </Layout >
    )
}

export default Home
