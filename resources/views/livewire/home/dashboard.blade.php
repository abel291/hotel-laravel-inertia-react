@section('title', 'Dashboard')
<x-slot name="header">
    <div class="flex justify-between items-end">
        <x-header-title>
            Dashboard
        </x-header-title>

    </div>
</x-slot>

<div>

    <div class="grid grid-cols-1 lg:grid-cols-8 gap-6 ">
        <div class="lg:col-span-8">
            <x-home.filter-tab :active-tab="$activeTab" :filter-time="$filterTime" />
        </div>
        <div class="lg:col-span-2">
            <x-stat label="Total ingresos">
                @money($totalIncome)
            </x-stat>
        </div>
        <div class="lg:col-span-2">
            <x-stat label="Habitaciones reservadas">
                {{ $totalRoomsReservation }}
            </x-stat>
        </div>
        <div class="lg:col-span-2">
            <x-stat label="Promedio de noches reservadas">
                {{ $averageNights }} noches
            </x-stat>
        </div>
        <div class="lg:col-span-2">
            <x-stat label="Total ingresos">
                @money($totalIncome)
            </x-stat>
        </div>

        <x-content class="lg:col-span-4">
            <x-title>
                Ventas por habitacion
                <div class="mt-6 chart-container  ">
                    <canvas id="chart-order-reservations-rooms" class="w-full lg:h-96 relative"></canvas>
                </div>
            </x-title>
        </x-content>

        <x-content class="lg:col-span-4">
            {{-- <x-title>
                Nuevo usuarios
                <div class="mt-6 lg:h-96 chart-container " style="position: relative; width:100%">
                    <canvas id="chart-new-users" class="w-full"></canvas>
                </div>
            </x-title> --}}
        </x-content>

        <div class="lg:col-span-6">
            <x-home.reservation-list :reservations-recent="$reservationRecent" />
        </div>

        <div class="lg:col-span-2">
            <x-home.popular-room :room="$popularRoom" />
        </div>
    </div>
</div>
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartRegisterUsers = document.getElementById('chart-new-users');
        const chartReservationRoom = document.getElementById('chart-order-reservations-rooms');

        const getDaysInMonth = () => {
            let daysCount = new Date(
                new Date().getFullYear(),
                new Date().getMonth() + 1,
                0
            ).getDate();

            return Array.from({
                length: daysCount
            }, (_, i) => i + 1)
        };
        const arrayDaysInMonth = getDaysInMonth();

        const options = {
            // maintainAspectRatio: false,
            responsive: true,

            scales: {
                y: {
                    beginAtZero: true
                }
            },
            scales: {
                x: {
                    display: false
                },

            }
        }
        const data = {
            labels: @json($reservationForRoom->keys()->toArray()),
            datasets: [{
                data: @json($reservationForRoom->values()->toArray()),
            }]
        }
        const chart1 = new Chart(chartReservationRoom, {
            type: 'bar',
            options: options
        });
        document.addEventListener('livewire:init', () => {
            Livewire.on('update-chart', (event) => {
                console.log(event[0].chart1)
                chart1.data = {
                    labels: event[0].chart1.labels,
                    datasets: [{
                        label: 'Habitaciones',
                        data: event[0].chart1.datasets
                    }]
                };
                chart1.update();
                // chart1.resize();

            });
        });
        // const chart2 = new Chart(chartRegisterUsers, {
        //     type: 'bar',
        //     data: {
        //         labels: arrayDaysInMonth,
        //         datasets: [{
        //             label: 'Usuarios Registrados',
        //             data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
        //             backgroundColor: ['#3b82f6']
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    </script>
@endpush
