
import { Head } from '@inertiajs/react'
import React from 'react'

import CardPost from './CardPost'

import LayoutBlog from '@/Layouts/LayoutBlog'

const Blog = ({ page, posts, filters }) => {
    const breadcrumb = [
        {
            title: 'Blog'
        },
    ]

    return (
        <LayoutBlog breadcrumb={breadcrumb}>
            <Head >
                <title>{page.title}</title>
                <meta head-key="description" name="description" content={page.description} />
            </Head>
            <div className='space-y-8'>
                {posts.map((post) => (
                    <CardPost post={post} />
                ))}
            </div>
        </LayoutBlog>
    )
}

export default Blog
