import React, { useRef, useState } from 'react';

import { Swiper, SwiperSlide } from 'swiper/react';

import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';
import 'swiper/css/effect-fade';
import { EffectFade, FreeMode, Navigation, Thumbs } from 'swiper/modules';
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/react/16/solid';
const CarouselImages = ({ images }) => {
    const unique_id = Math.random().toString(16).slice(2, 8);
    const pagination_button_next = "button-next-" + unique_id
    const pagination_button_prev = "button-prev-" + unique_id

    const [thumbsSwiper, setThumbsSwiper] = useState(null);

    return (
        <div className='lg:grid lg:grid-cols-12 gap-6'>
            <div className='lg:col-span-8 '>
                <div className='relative'>
                    <Swiper
                        loop={true}
                        className="mySwiper2 "
                        thumbs={{ swiper: thumbsSwiper }}
                        modules={[EffectFade, FreeMode, Navigation, Thumbs]}
                        speed={1500}
                        effect={'fade'}
                        pagination={{
                            clickable: true,
                        }}

                        navigation={{
                            nextEl: "." + pagination_button_next,
                            prevEl: "." + pagination_button_prev,
                        }}
                        spaceBetween={10}
                        slidesPerView={1}
                    // onSlideChange={() => console.log('slide change')}
                    // onSwiper={(swiper) => console.log(swiper)}

                    >
                        {images.map((image, index) => (
                            <SwiperSlide key={index}>
                                <div >
                                    <img src={image.img} alt="" className='h-full lg:h-[540px] w-full object-cover object-center rounded-xl' />
                                </div>
                            </SwiperSlide>
                        ))}
                    </Swiper>
                    <div className="flex items-center w-full absolute top-2/4 z-10 ">
                        <button
                            aria-label="prev-button"
                            className={pagination_button_prev + " absolute -mt-2 md:-mt-2 w-10 h-10  lg:w-9 lg:h-9 xl:w-10 xl:h-10 2xl:w-12 2xl:h-12 text-sm md:text-base lg:text-xl 3xl:text-2xl text-black flex items-center justify-center rounded text-gray-0 bg-white/60 transition duration-250 hover:bg-primary-600 hover:text-white focus:outline-none  transform shadow-md left-3 disabled:opacity-40 "}
                        >
                            <ChevronLeftIcon className="h-6 w-6 lg:h-6 lg:w-6" />
                        </button>
                        <button
                            aria-label="next-button"
                            className={pagination_button_next + " absolute -mt-2 md:-mt-2 w-10 h-10 lg:w-9 lg:h-9 xl:w-10 xl:h-10 2xl:w-12 2xl:h-12 text-sm md:text-base lg:text-xl 3xl:text-2xl text-black flex items-center justify-center rounded bg-white/60 transition duration-250 hover:bg-primary-600 hover:text-white focus:outline-none transform shadow-md right-3 disabled:opacity-40 "}
                        >
                            <ChevronRightIcon className="h-6 w-6 lg:h-6 lg:w-6" />
                        </button>
                    </div>

                </div>
            </div>
            <div className='lg:col-span-4 hidden lg:block '>
                <Swiper
                    className=' mySwiper h-[540px]'
                    direction={'vertical'}
                    onSwiper={setThumbsSwiper}
                    spaceBetween={24}
                    slidesPerView={2}
                    freeMode={true}
                    watchSlidesProgress={true}
                    modules={[FreeMode, Navigation, Thumbs]}
                    pagination={{
                        clickable: true,
                    }}
                    speed={1200}
                >
                    {images.map((image, index) => (
                        <SwiperSlide key={index}>
                            <img src={image.img} alt="" className=' rounded-xl h-full w-full object-cover object-center' />
                        </SwiperSlide>
                    ))}
                </Swiper>
            </div>
        </div>
    )
}

export default CarouselImages
