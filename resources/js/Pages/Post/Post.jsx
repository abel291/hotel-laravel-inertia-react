import TextTime from '@/Components/TextTime'
import LayoutBlog from '@/Layouts/LayoutBlog'
import { Head } from '@inertiajs/react'
import React from 'react'

const Post = ({ post }) => {
    const breadcrumb = [
        {
            title: 'Blog',
            path: route('blog')
        },
        {
            title: post.title
        },
    ]

    return (
        <LayoutBlog breadcrumb={breadcrumb}>
            <Head >
                <title>{post.title}</title>
                <meta head-key="description" name="description" content={post.description} />
            </Head>
            <div >
                <img src={post.img} alt={post.title} className='rounded-lg' />
                <div className='mt-6'>
                    <TextTime time={post.time} />
                </div>
                <p className='mt-6 text-lg font-light'>
                    {post.description}
                </p>
                <div className='mt-6  flex items-center'>
                    <h4 className='text-lg mr-4'>Category</h4>
                    <div className='text-lg font-light'>
                        {post.category.name}
                    </div>
                </div>
                <div className='mt-3 flex items-center'>
                    <h4 className='text-lg inline-block'>Tags</h4>
                    <div className='text-lg font-light ml-10 flex flex-wrap gap-x-4'>
                        {post.tags.map((tag) => (
                            <span>{tag.name}</span>
                        ))}
                    </div>
                </div>
            </div>
        </LayoutBlog>
    )
}

export default Post
