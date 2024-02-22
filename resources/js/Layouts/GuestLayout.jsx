import ApplicationLogo from '@/Components/ApplicationLogo';
import Card from '@/Components/Card';
import { Link } from '@inertiajs/react';
import Layout from './Layout';

export default function Guest({ children }) {
    return (
        <Layout>
            <div className="flex flex-col sm:justify-center items-center pt-6 sm:py-20 bg-gray-100">

                <div >
                    <Link href="/">
                        <ApplicationLogo textColor="text-primary-700" />
                    </Link>
                </div>
                <Card className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {children}
                </Card>
            </div>
        </Layout>
    );
}
