import React from 'react'

const InfoIconItem = ({ Icon, title, children, colorIcon = 'text-primary-800', bgIcon = 'bg-primary-700/20' }) => {
    return (
        <div>
            <div className='flex items-center'>
                <div className={'flex-shrink-0 w-20 h-20 rounded-lg mr-6 flex items-center justify-center ' + bgIcon}>
                    <Icon className={"w-9 h-9 " + colorIcon} />
                </div>
                <div>
                    <h4 className='text-lg sm:text-xl font-bold'>{title}</h4>
                    <div className='font-light text-sm sm:text-base'>
                        {children}
                    </div>
                </div>
            </div>
        </div>
    )
}

export default InfoIconItem
