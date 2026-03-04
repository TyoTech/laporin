@extends('layouts.app')

@section('title', 'Tentang Kami - Laporin')

@section('content')

{{-- Hero Section --}}
<div class="bg-gray-900 rounded-2xl mb-6 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-32 translate-x-32"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
    <div class="relative z-10 p-12">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3">Platform Pelaporan Warga</p>
        <h1 class="text-4xl font-black text-white mb-4">Laporin.</h1>
        <p class="text-gray-300 text-base max-w-lg leading-relaxed">
            Platform digital untuk menyampaikan keluhan dan laporan warga secara langsung kepada petugas yang berwenang — cepat, transparan, dan terstruktur.
        </p>
    </div>
</div>

{{-- Latar Belakang --}}
<div class="grid grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-2xl border border-gray-100 p-8">
        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
            </svg>
        </div>
        <h2 class="text-base font-bold text-gray-900 mb-3">Latar Belakang</h2>
        <p class="text-sm text-gray-500 leading-relaxed">
            Selama ini, banyak keluhan warga tidak tersampaikan karena sulitnya akses ke petugas dan tidak adanya sistem pencatatan yang jelas. Laporan yang masuk sering kali hilang begitu saja tanpa tindak lanjut yang transparan.
        </p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-8">
        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center mb-4">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <h2 class="text-base font-bold text-gray-900 mb-3">Solusi Kami</h2>
        <p class="text-sm text-gray-500 leading-relaxed">
            Laporin hadir sebagai jembatan antara warga dan petugas. Warga dapat membuat laporan kapan saja, melampirkan foto bukti, dan memantau status penanganannya secara real-time — semuanya dalam satu platform.
        </p>
    </div>
</div>

{{-- Fitur Utama --}}
<div class="bg-white rounded-2xl border border-gray-100 p-8 mb-6">
    <h2 class="text-base font-bold text-gray-900 mb-6">Fitur Utama</h2>
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-gray-50 rounded-xl p-5">
            <div class="w-9 h-9 bg-gray-900 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <h3 class="text-sm font-semibold text-gray-900 mb-1">Buat Laporan</h3>
            <p class="text-xs text-gray-400 leading-relaxed">Warga dapat melaporkan masalah lengkap dengan foto bukti dan deskripsi detail.</p>
        </div>
        <div class="bg-gray-50 rounded-xl p-5">
            <div class="w-9 h-9 bg-gray-900 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <h3 class="text-sm font-semibold text-gray-900 mb-1">Pantau Status</h3>
            <p class="text-xs text-gray-400 leading-relaxed">Setiap laporan dapat dipantau statusnya — mulai dari diterima, dikerjakan, hingga selesai.</p>
        </div>
        <div class="bg-gray-50 rounded-xl p-5">
            <div class="w-9 h-9 bg-gray-900 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <h3 class="text-sm font-semibold text-gray-900 mb-1">Manajemen Petugas</h3>
            <p class="text-xs text-gray-400 leading-relaxed">Petugas dapat mengelola semua laporan masuk dan memberikan update langsung kepada warga.</p>
        </div>
    </div>
</div>

{{-- Tim --}}
<div class="bg-white rounded-2xl border border-gray-100 p-8 mb-6">
    <h2 class="text-base font-bold text-gray-900 mb-6">Tim Pengembang</h2>
    <div class="space-y-4">

        {{-- Head Developer --}}
        <div class="flex items-center gap-4 p-4 bg-gray-900 rounded-xl">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-gray-900 text-sm font-black">A</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-white">Ahmad Zulfikar Al Hafizh</p>
                <p class="text-xs text-gray-400">Head Developer</p>
            </div>
            <span class="px-3 py-1 bg-white/10 text-white text-xs font-medium rounded-lg">Lead</span>
        </div>

        {{-- Developer --}}
        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-gray-600 text-sm font-bold">B</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-900">Budi Prasetyo</p>
                <p class="text-xs text-gray-400">Developer</p>
            </div>
            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-lg">Dev</span>
        </div>

        {{-- UI/UX --}}
        @foreach([['Andini Nina Apsari', 'A'], ['Rama Yudha Pratama', 'R'], ['Alvin W.D', 'A']] as $member)
        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-gray-600 text-sm font-bold">{{ $member[1] }}</span>
            </div>
            <div class="flex-1">
                <p class="text-sm font-bold text-gray-900">{{ $member[0] }}</p>
                <p class="text-xs text-gray-400">UI/UX Designer</p>
            </div>
            <span class="px-3 py-1 bg-purple-50 text-purple-600 text-xs font-medium rounded-lg">UI/UX</span>
        </div>
        @endforeach

    </div>
</div>

{{-- Kontak & Sosmed --}}
<div class="bg-white rounded-2xl border border-gray-100 p-8">
    <h2 class="text-base font-bold text-gray-900 mb-6">Hubungi Kami</h2>
    <div class="flex flex-wrap gap-3">

        <a href="https://instagram.com/username_kamu" target="_blank"
            class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
            Instagram
        </a>

        <a href="https://github.com/username_kamu" target="_blank"
            class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
            </svg>
            GitHub
        </a>

        <a href="mailto:laporin@email.com"
            class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Email
        </a>

        <a href="https://wa.me/628xxxxxxxxxx" target="_blank"
            class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            WhatsApp
        </a>

    </div>
</div>

@endsection