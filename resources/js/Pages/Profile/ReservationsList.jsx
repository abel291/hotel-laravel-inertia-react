
import { useState } from "react";
import LayoutProfile from "../../Layouts/LayoutProfile";

import { Head, Link } from "@inertiajs/react";
import Pagination from "@/Components/Pagination";
import Badge from "@/Components/Badge";
import { formatCurrency, formatDate } from "@/Helpers/helper";

const ReservationsList = ({ reservations }) => {


    console.log(reservations);
    return (
        <LayoutProfile title="Pedidos" breadcrumb={[
            {
                title: "Reservaciones",
                path: route("profile.reservations")

            },
        ]}>
            <Head title="Pedidos" />


            <div className="space-y-2">

                <table className="table-list">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Habitacion</th>
                            <th>Noches</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        {reservations.data.map((item, key) => (
                            <tr key={key}>
                                <td>
                                    <Link preserveScroll className="block font-medium text-primary-600" href={route('profile.reservation', item.code)}>
                                        #{item.code}
                                    </Link>
                                    <Badge className="mt-1">{item.state}</Badge>
                                </td>
                                <td>
                                    {item.data.room.name}
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td className="pr-3 text-primary-600">Entrada:</td>
                                            <td >{formatDate(item.start_date)}</td>
                                        </tr>
                                        <tr>
                                            <td className="pr-3 text-primary-600">Salida</td>
                                            <td  >{formatDate(item.end_date)}</td>
                                        </tr>
                                    </table>

                                    <Badge>{item.nights} {item.nights > 1 ? 'noches' : 'noche'}</Badge>
                                </td>
                                <td>
                                    <span className="font-medium text-base ">{formatCurrency(item.total)}</span>

                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
                {/* <div>
                    <div className="mt-8">
                        {reservations.meta.total > reservations.meta.per_page && (
                            <div className="mt-8">
                                <Pagination paginator={reservations.meta} />
                            </div>
                        )}
                    </div>
                </div> */}
            </div>
        </LayoutProfile>
    );
};

export default ReservationsList;
