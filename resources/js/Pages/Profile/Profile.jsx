import LayoutProfile from "@/Layouts/LayoutProfile"
import { Head, Link } from "@inertiajs/react"


const Dashboard = () => {
    //let { url } = useMatch()

    return (
        <LayoutProfile title="Dashboard" breadcrumb={[
            {
                title: "Incio",
                path: route("profile.index")

            },
        ]}>
            <Head title="Perfil" />
            <div className="space-y-2">

                <div>
                    Desde el panel de control de su cuenta, puede ver el hisotrial de
                    <Link href={route('profile.reservations')} className="font-bold underline px-1 ">
                        reservaciones hechas
                    </Link>
                    , administrar los
                    <Link href={route('profile.account-details')} className="font-bold underline px-1 ">
                        detalles de su cuenta
                    </Link>
                    y
                    <Link href={route('profile.password')} className="font-bold underline px-1 ">
                        cambiar su contraseña.
                    </Link>
                    .
                </div>
            </div>
        </LayoutProfile >
    )
}

export default Dashboard
