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
            <x-stat label="Usuarios registrados">
                {{ $registeredUserCount }}
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
            <x-title>
                Nuevo usuarios
                <div class="mt-6 chart-container ">
                    <canvas id="chart-new-users" class="w-full lg:h-96 relative"></canvas>
                </div>
            </x-title>
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

        const options = {
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

        const chart1 = new Chart(chartReservationRoom, {
            type: 'bar',
            options: options
        });

        const chart2 = new Chart(chartRegisterUsers, {
            type: 'bar',
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
            }
        });
        document.addEventListener('livewire:init', () => {
            Livewire.on('update-chart', (event) => {
                console.log(event[0].chart1)
                chart1.data = {
                    labels: event[0].chart1.labels,
                    datasets: [{
                        label: 'Habitaciones',
                        data: event[0].chart1.datasets,
                        backgroundColor: ['#0284c7']
                    }]
                };
                chart1.update();

                chart2.data = {
                    labels: event[0].chart2.labels,
                    datasets: [{
                        label: 'Usuarios Registrados',
                        data: event[0].chart2.datasets,
                        backgroundColor: ['#0284c7']
                    }]
                };
                chart2.update();
                // chart1.resize();

            });
        });
    </script>
@endpush
