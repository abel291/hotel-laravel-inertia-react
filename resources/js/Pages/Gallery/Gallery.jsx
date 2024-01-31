import Breadcrumb from '@/Components/Breadcrumb'
import Layout from '@/Layouts/Layout'
import { Head } from '@inertiajs/react'
import React, { useState } from 'react'
import CarouselGallery from './CarouselGallery'
const Gallery = ({ page, galleries }) => {
    const breadcrumb = [
        {
            title: 'Fotos de nuestro Hotel '
        },
    ]

    const [images, setImages] = useState(galleries[0].images);

    const handleButtonFilter = (slug) => {
        let newGalleries = galleries.filter(
            (item, key) => item.slug === slug
        );
        //console.log(newImages);
        setImages(newGalleries[0].images);
    };
    return (
        <Layout>
            <Head>
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>

            <Breadcrumb data={breadcrumb} />
            <section className='py-section'>
                <div className='container'>

                    <div className='space-y-10'>
                        {galleries.map((gallery, index) => (
                            <div key={index} >
                                <h5 className='text-primary-700 text-2xl font-bold'>{gallery.name}</h5>
                                <p className='lg:w-2/3 lg:text-lg font-light mt-2'>{gallery.entry}</p>
                                <div className='mt-5'>
                                    <CarouselGallery gallery={gallery} />
                                </div>
                            </div>
                        ))}
                    </div>

                </div>
            </section>


        </Layout >
    )
}

export default Gallery
