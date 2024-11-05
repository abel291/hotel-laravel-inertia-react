import React, { useRef, useState } from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';
import 'swiper/css/effect-fade';
import { Autoplay, Navigation, } from 'swiper/modules';
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/react/16/solid';
import FsLightbox from "fslightbox-react";
const CarouselGallery = ({ gallery }) => {

    const unique_id = Math.random().toString(16).slice(2, 8);
    const pagination_button_next = "button-next-" + unique_id
    const pagination_button_prev = "button-prev-" + unique_id

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
        <div >
            <div className='relative'>
                <Swiper
                    modules={[Navigation, Autoplay]}
                    speed={1000}
                    slidesPerView={1}
                    spaceBetween={10}
                    lazy={true}
                    pagination={{
                        clickable: true,
                    }}
                    autoplay={{
                        delay: 2500,
                        disableOnInteraction: false,
                    }}
                    navigation={{
                        nextEl: "." + pagination_button_next,
                        prevEl: "." + pagination_button_prev,
                    }}
                    breakpoints={{
                        768: {
                            slidesPerView: 2,
                        },
                    }}


                // onSlideChange={() => console.log('slide change')}
                // onSwiper={(swiper) => console.log(swiper)}

                >
                    {gallery.images.map((image, index) => (
                        <SwiperSlide>
                            <div className='overflow-hidden cursor-pointer md:p-1' onClick={() => openLightboxOnSlide(index + 1)}>
                                <img src={image.img}
                                    alt={image.alt}
                                    title={image.alt}
                                    className='max-h-96 w-full rounded hover:scale-110 transform transition-all overflow-hidden bg-primary-700/20'
                                    loading="lazy"
                                />
                                <div className="swiper-lazy-preloader swiper-lazy-preloader-white "></div>
                            </div>
                        </SwiperSlide>
                    ))}
                </Swiper>
                <div className="flex items-center justify-end mt-5 gap-x-2 w-full ">
                    <button
                        aria-label="prev-button"
                        className={pagination_button_prev + " w-10 h-10  lg:w-9 lg:h-9 xl:w-10 xl:h-10  text-sm md:text-base lg:text-xl 3xl:text-2xl text-black flex items-center justify-center rounded text-gray-0 bg-white/60 transition duration-250 hover:bg-primary-600 hover:text-white focus:outline-none  transform left-3 disabled:opacity-40 border "}
                    >
                        <ChevronLeftIcon className="h-6 w-6 " />
                    </button>
                    <button
                        aria-label="next-button"
                        className={pagination_button_next + "  w-10 h-10 lg:w-9 lg:h-9 xl:w-10 xl:h-10  text-sm md:text-base lg:text-xl 3xl:text-2xl text-black flex items-center justify-center rounded bg-white/60 transition duration-250 hover:bg-primary-600 hover:text-white focus:outline-none transform right-3 disabled:opacity-40 border "}
                    >
                        <ChevronRightIcon className="h-6 w-6 " />
                    </button>
                </div>

            </div>
            <FsLightbox
                toggler={lightboxController.toggler}
                slide={lightboxController.slide}
                sources={gallery.images.map((image) => image.img)}
            />
        </div >
    )
}

export default CarouselGallery
