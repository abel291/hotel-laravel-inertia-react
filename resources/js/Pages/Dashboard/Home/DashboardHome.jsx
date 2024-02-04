import Card from '@/Components/Card'
import DashboardLayout from '@/Layouts/Dashboard/DashboardLayout'
import { Head } from '@inertiajs/react'
import React from 'react'

const DashboardHome = ({ auth }) => {
    return (
        <DashboardLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <Card className="mt-10">
                        <div className="p-6 text-gray-900">You're logged in!</div>
                    </Card>

                </div>
            </div>
        </DashboardLayout>
    )
}

export default DashboardHome
