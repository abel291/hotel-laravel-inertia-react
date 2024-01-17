import TitleSection from '@/Components/TitleSection'
import TitleSectionLink from '@/Components/TitleSectionLink'
import React from 'react'
import BenefitsList from './BenefitsList'
import TitleEntry from '@/Components/TitleEntry'

const BenefitsHeader = () => {
    return (
        <section className='py-section'>
            <div className='container'>
                <TitleEntry>
                    <TitleEntry.Title>
                        Los principales beneficios de elegir Hosteller
                    </TitleEntry.Title>
                    <TitleEntry.Entry>
                        Aliquam eleifend mi in nulla. Viverra nibh cras pulvinar mattis nunc
                    </TitleEntry.Entry>
                </TitleEntry>

                <div className='mt-12'>
                    <BenefitsList />
                </div>

                <div className='mt-12 lg:mt-14'>
                    <iframe className='w-full aspect-video rounded-lg ' src="https://www.youtube.com/embed/2mQL4trji5M" title="South Korea&#39;s Top 5 Luxury Hotels" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowFullScreen></iframe>
                </div>
            </div>
        </section>
    )
}

export default BenefitsHeader
