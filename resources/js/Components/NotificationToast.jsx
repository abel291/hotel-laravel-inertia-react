import { usePage } from '@inertiajs/react'
import React, { useEffect } from 'react'
import { Toaster, toast } from 'sonner'

const NotificationToast = () => {
    const { flash, errors } = usePage().props

    useEffect(() => {
        flash.success && toast.success(flash.success);
        flash.error && toast.warning(flash.error);


        const errorsArray = Object.values(errors);
        (errorsArray.length > 0) &&
            toast.error(
                <div className='ml-3 grow'>
                    <h3 className='text-red-800 font-medium text-sm'>
                        Hubo {errors.length} errores
                    </h3>
                    <div className='text-sm mt-2'>
                        <ul role="list" className='text-red-700 pl-5 list-disc space-y-1'>
                            {errorsArray.map((value) => (
                                <li key={value}>{value}</li>
                            ))}
                        </ul>
                    </div>
                </div>
            )

    }, [flash])

    return (
        <div>
            <Toaster
                richColors
                position="top-right"
                expand={true}
            // toastOptions={{
            //     custom: {
            //         duration: 4000,

            //     }
            // }}
            />
        </div>
    )
}

export default NotificationToast
