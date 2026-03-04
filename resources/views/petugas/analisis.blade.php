@extends('layouts.app')

@section('title', 'Analisis - Laporin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Analisis Laporan</h1>
    <p class="text-gray-400 text-sm mt-1">Statistik dan tren laporan warga tahun {{ date('Y') }}</p>
</div>

{{-- Summary Cards --}}
<div class="grid grid-cols-4 gap-4 mb-8">
    <div class="bg-gray-900 rounded-2xl p-5 text-white">
        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Laporan</p>
        <p class="text-3xl font-bold mt-2">{{ $totalSemua }}</p>
        <p class="text-xs text-gray-400 mt-1">Semua laporan masuk</p>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4">
        <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Belum Dibaca</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalBelumDibaca }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4">
        <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Selesai</p>
            <p class="text-2xl font-bold text="gray-900">{{ $totalSelesai }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4">
        <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Ditolak</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalDitolak }}</p>
        </div>
    </div>
</div>

{{-- Charts Row 1 --}}
<div class="grid grid-cols-3 gap-6 mb-6">

    {{-- Laporan Per Bulan --}}
    <div class="col-span-2 bg-white rounded-2xl border border-gray-100 p-6">
        <h2 class="text-sm font-bold text-gray-900 mb-1">Laporan Per Bulan</h2>
        <p class="text-xs text-gray-400 mb-4">Tren laporan masuk sepanjang tahun {{ date('Y') }}</p>
        <div id="chart-perbulan"></div>
    </div>

    {{-- Laporan Per Status --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-6">
        <h2 class="text-sm font-bold text-gray-900 mb-1">Status Laporan</h2>
        <p class="text-xs text-gray-400 mb-4">Distribusi status saat ini</p>
        <div id="chart-status"></div>
    </div>

</div>

{{-- Charts Row 2 --}}
<div class="bg-white rounded-2xl border border-gray-100 p-6">
    <h2 class="text-sm font-bold text-gray-900 mb-1">Laporan Per Kategori</h2>
    <p class="text-xs text-gray-400 mb-4">Jumlah laporan berdasarkan jenis masalah</p>
    <div id="chart-kategori"></div>
</div>

{{-- ApexCharts CDN --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // Data dari Laravel
    const bulanLabel = @json($bulanLabel);
    const dataPerBulan = @json($dataPerBulan);
    const perKategori = @json($perKategori);

    // Chart Per Bulan
    new ApexCharts(document.getElementById('chart-perbulan'), {
        chart: { type: 'area', height: 280, toolbar: { show: false }, fontFamily: 'inherit' },
        series: [{ name: 'Laporan', data: dataPerBulan }],
        xaxis: { categories: bulanLabel },
        colors: ['#111827'],
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.3, opacityTo: 0.05 } },
        stroke: { curve: 'smooth', width: 2 },
        dataLabels: { enabled: false },
        grid: { borderColor: '#f3f4f6' },
        tooltip: { theme: 'light' },
    }).render();

    // Chart Status Donut
    new ApexCharts(document.getElementById('chart-status'), {
        chart: { type: 'donut', height: 280, fontFamily: 'inherit' },
        series: [{{ $totalBelumDibaca }}, {{ $totalDikerjakan }}, {{ $totalSelesai }}, {{ $totalDitolak }}],
        labels: ['Belum Dibaca', 'Dikerjakan', 'Selesai', 'Ditolak'],
        colors: ['#EAB308', '#3B82F6', '#22C55E', '#EF4444'],
        legend: { position: 'bottom' },
        dataLabels: { enabled: true },
        plotOptions: { pie: { donut: { size: '65%' } } },
    }).render();

    // Chart Kategori
    new ApexCharts(document.getElementById('chart-kategori'), {
        chart: { type: 'bar', height: 250, toolbar: { show: false }, fontFamily: 'inherit' },
        series: [{ name: 'Laporan', data: perKategori.map(k => k.total) }],
        xaxis: { categories: perKategori.map(k => k.kategori) },
        colors: ['#111827'],
        plotOptions: { bar: { borderRadius: 8, columnWidth: '40%' } },
        dataLabels: { enabled: false },
        grid: { borderColor: '#f3f4f6' },
    }).render();
</script>

@endsection