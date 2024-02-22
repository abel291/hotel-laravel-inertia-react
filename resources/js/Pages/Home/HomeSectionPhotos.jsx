import PrimaryButton from '@/Components/PrimaryButton'
import { ArrowsPointingInIcon, ArrowsPointingOutIcon } from '@heroicons/react/24/outline'
import React, { useState } from 'react'
import ImageGallery from './ImageGallery'
import FsLightbox from "fslightbox-react";
import TitleSectionLink from '@/Components/TitleSectionLink';
const HomeSectionPhotos = () => {
    const [lightboxController, setLightboxController] = useState({
        toggler: false,
        slide: 1
    });

    function openLightboxOnSlide(number) {
        setLightboxController({
            toggler: !lightboxController.toggler,
            slide: number
        });
    }
    return (
        <section>
            <div className='py-section container'>
                <TitleSectionLink title="Fotos de nuestras habitaciones" titleLink="Ver todas las fotos " urlLink={route('gallery')} />
                <div className='grid grid-rows-4 sm:grid-rows-2 grid-flow-col gap-4 lg:gap-6 mt-7'>
                    <div className='lg:row-span-2 h-full' onClick={() => openLightboxOnSlide(1)}>
                        <ImageGallery img="/img/gallery-1.jpg" />
                    </div>
                    <div onClick={() => openLightboxOnSlide(2)}>
                        <ImageGallery img="/img/gallery-2.jpg" />
                    </div>
                    <div onClick={() => openLightboxOnSlide(3)}>
                        <ImageGallery img="/img/gallery-3.jpg" />
                    </div>
                    <div className='lg:row-span-2 h-full' onClick={() => openLightboxOnSlide(4)}>
                        <ImageGallery img="/img/gallery-4.jpg" />
                    </div>
                </div>
            </div>
            <FsLightbox
                toggler={lightboxController.toggler}
                slide={lightboxController.slide}
                sources={[
                    "/img/gallery-1.jpg",
                    "/img/gallery-2.jpg",
                    "/img/gallery-3.jpg",
                    "/img/gallery-4.jpg",
                ]}
            />
        </section>
    )
}



export default HomeSectionPhotos
