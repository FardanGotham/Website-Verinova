@php
    $encodedChartData = json_encode($chartData ?? [0, 0, 0, 0]);
@endphp

<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 border border-slate-200/80 dark:border-slate-800 shadow-sm transition-colors duration-200 h-full flex flex-col justify-between">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-6">
        <div>
            <h3 class="text-base font-bold text-slate-900 dark:text-white">
                Statistik Distribusi Data
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                Volume perbandingan entitas utama dalam sistem Verinova
            </p>
        </div>
        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 text-xs font-semibold">
            <x-icon name="trending-up" class="w-3.5 h-3.5" />
            <span>Aktif Terdata</span>
        </div>
    </div>

    <!-- Chart Canvas Container -->
    <div class="relative w-full h-64 sm:h-72">
        <canvas id="dashboardDistributionChart"></canvas>
    </div>

    <div class="grid grid-cols-4 gap-2 pt-5 mt-4 border-t border-slate-100 dark:border-slate-800 text-center text-xs">
        <div>
            <p class="text-slate-400">Siswa</p>
            <p class="font-bold text-slate-800 dark:text-white mt-0.5">{{ $students }}</p>
        </div>
        <div>
            <p class="text-slate-400">Galeri</p>
            <p class="font-bold text-slate-800 dark:text-white mt-0.5">{{ $galleries }}</p>
        </div>
        <div>
            <p class="text-slate-400">Pengurus</p>
            <p class="font-bold text-slate-800 dark:text-white mt-0.5">{{ $organizations }}</p>
        </div>
        <div>
            <p class="text-slate-400">Jadwal</p>
            <p class="font-bold text-slate-800 dark:text-white mt-0.5">{{ $schedules }}</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('dashboardDistributionChart');
        if (!ctx) return;

        const chartDataValues = {!! $encodedChartData !!};
        const isDark = document.documentElement.classList.contains('dark');

        const gridColor = isDark ? 'rgba(148, 163, 184, 0.1)' : 'rgba(148, 163, 184, 0.15)';
        const textColor = isDark ? '#94a3b8' : '#64748b';

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Data Siswa', 'Galeri Foto', 'Pengurus', 'Jadwal Pelajaran'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: chartDataValues,
                    backgroundColor: [
                        'rgba(37, 99, 235, 0.85)',
                        'rgba(147, 51, 234, 0.85)',
                        'rgba(14, 165, 233, 0.85)',
                        'rgba(16, 185, 129, 0.85)'
                    ],
                    borderColor: [
                        '#2563eb',
                        '#9333ea',
                        '#0ea5e9',
                        '#10b981'
                    ],
                    borderWidth: 1.5,
                    borderRadius: 8,
                    borderSkipped: false,
                    maxBarThickness: 48
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDark ? '#0f172a' : '#1e293b',
                        titleColor: '#ffffff',
                        bodyColor: '#cbd5e1',
                        padding: 10,
                        cornerRadius: 8,
                        boxPadding: 4
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: textColor,
                            font: {
                                size: 11,
                                family: 'Figtree, sans-serif'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: gridColor
                        },
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                            color: textColor,
                            font: {
                                size: 11,
                                family: 'Figtree, sans-serif'
                            }
                        }
                    }
                }
            }
        });

        window.addEventListener('theme-changed', (e) => {
            const darkNow = e.detail.dark;
            const newTextColor = darkNow ? '#94a3b8' : '#64748b';
            const newGridColor = darkNow ? 'rgba(148, 163, 184, 0.1)' : 'rgba(148, 163, 184, 0.15)';

            chart.options.scales.x.ticks.color = newTextColor;
            chart.options.scales.y.ticks.color = newTextColor;
            chart.options.scales.y.grid.color = newGridColor;
            chart.options.plugins.tooltip.backgroundColor = darkNow ? '#0f172a' : '#1e293b';
            chart.update();
        });
    });
</script>
@endpush
