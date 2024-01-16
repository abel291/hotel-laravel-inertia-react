import { BuildingOffice2Icon } from "@heroicons/react/16/solid";
import { Link } from "@inertiajs/react";

export default function ApplicationLogo({ bgIcon = 'bg-primary-600', colorIcon = 'text-white', textColor = 'text-white' }) {
    return (
        <Link className="brand flex items-center" href={route('home')}>
            <span className={"inline-block p-2 rounded mr-2 " + bgIcon}>
                <BuildingOffice2Icon className={'h-7 w-7 ' + colorIcon} />
            </span>
            <span className={"text-2xl font-bold " + textColor}>
                Hotel Medellin
            </span>
        </Link>
    );
}
