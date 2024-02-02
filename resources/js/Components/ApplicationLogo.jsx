import { BuildingOffice2Icon } from "@heroicons/react/16/solid";
import { Link, usePage } from "@inertiajs/react";
import { BaggageClaim, Hotel, LuggageIcon } from "lucide-react";

export default function ApplicationLogo({ bgIcon = 'bg-primary-600', colorIcon = 'text-white', textColor = 'text-white' }) {
    const { appName } = usePage().props
    return (
        <Link className="brand flex items-center" href={route('home')}>
            <span className={"flex items-center p-2 rounded-full mr-2  " + bgIcon}>
                <LuggageIcon strokeWidth={1.5} className={'h-8 w-8 ' + colorIcon} />
            </span>
            <span className={"text-2xl font-bold " + textColor}>
                {appName}
            </span>
        </Link>
    );
}
