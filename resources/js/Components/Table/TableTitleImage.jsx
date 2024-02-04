import React from 'react'

const TableTitleImage = ({ img = null, title = '', path = null, subTitle = '' }) => {
    return (
        <div className="flex items-center gap-x-4">
            {title && (
                <div className="w-24 flex items-center">
                    <img src={img} className="w-full  rounded " alt="img {title}" />
                </div>
            )}
            {(title || subTitle) && (
                <div >
                    {title && (
                        path ? (
                            <a className="text-blue-500 font-medium" target='_blank' href={path}>
                                {title}
                            </a>
                        ) : (

                            <div className="font-medium text-neutral-800">
                                {title}
                            </div>
                        )
                    )}

                    {subTitle && (
                        <div className="mt-0.5 text-neutral-500">
                            {subTitle}
                        </div>
                    )}

                </div>
            )}
        </div >
    )
}

export default TableTitleImage
