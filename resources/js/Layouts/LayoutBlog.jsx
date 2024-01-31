import Breadcrumb from '@/Components/Breadcrumb'
import WidgetCategories from '@/Pages/Blog/WidgetCategories'
import WidgetPostRecommended from '@/Pages/Blog/WidgetPostRecommended'
import WidgetPostSearch from '@/Pages/Blog/WidgetPostSearch'
import WidgetTags from '@/Pages/Blog/WidgetTags'
import { usePage } from '@inertiajs/react'
import React from 'react'
import Layout from './Layout'
import Card from '@/Components/Card'

const LayoutBlog = ({ breadcrumb, children }) => {

    return (
        <Layout>
            <Breadcrumb data={breadcrumb} />
            <section className='py-section'>
                <div className='container'>
                    <div className='grid lg:grid-cols-12 gap-8'>

                        <div className='lg:col-span-7 xl:col-span-8'>
                            {children}
                        </div>

                        <div className='lg:col-span-5 xl:col-span-4'>
                            <Card className="p-5 md:p-8 space-y-10">
                                <WidgetPostSearch />
                                <WidgetCategories />
                                <WidgetPostRecommended />
                                <WidgetTags />
                            </Card>
                        </div>

                    </div>
                </div>

            </section>

        </Layout >
    )
}

export default LayoutBlog
