import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import React from 'react'
import HeroImage from './HeroImage'
import HomeSectionRooms from './HomeSectionRooms'
import HomeServices from './HomeServices'
import HomeSectionPhotos from './HomeSectionPhotos'
import HomeSectionRoomPrice from './HomeSectionRoomPrice'
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

            <HomeSectionRooms />

            <div className='bg-primary'>
                <HomeServices />
            </div>

            <HomeSectionPhotos />

            <div className='bg-primary'>
                <HomeSectionRoomPrice />
            </div>

            <HomeSectionPost />

            <div className='bg-primary'>

                <SectionContact />

            </div>


        </Layout>
    )
}

export default Home
