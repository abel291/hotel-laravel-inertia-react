import Layout from '@/Layouts/Layout'
import { Head, usePage } from '@inertiajs/react'
import React from 'react'
import HeroImage from './HeroImage'
import Rooms from './Rooms'
import Services from './Services'
import Photos from './Photos'
import RoomPrice from './RoomPrice'
import Post from './Post'
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
                <Services />
            </div>

            <Photos />

            <div className='bg-primary-800/5'>
                <RoomPrice />
            </div>

            <Post />

            <div className='bg-primary-800/5'>

                <SectionContact />

            </div>


        </Layout >
    )
}

export default Home
