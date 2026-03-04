@extends('layouts.app')

@section('title', 'Detail Laporan - Laporin')

@section('content')

{{-- Back Button --}}
<a href="{{ route('petugas.dashboard') }}"
    class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-gray-900 transition-colors mb-6">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
    </svg>
    Kembali ke Dashboard
</a>

<div class="max-w-2xl space-y-6">

    {{-- Card Info Laporan --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-8">

        {{-- Header --}}
        <div class="flex items-start justify-between mb-6 pb-6 border-b border-gray-100">
            <div>
                <h1 class="text-xl font-bold text-gray-900">{{ $laporan->judul }}</h1>
                <p class="text-sm text-gray-400 mt-1">Dilaporkan oleh {{ $laporan->user->name }}</p>
            </div>
            @php
                $statusColor = match($laporan->status) {
                    'Belum Dibaca' => 'bg-yellow-50 text-yellow-600',
                    'Dikerjakan'   => 'bg-blue-50 text-blue-600',
                    'Selesai'      => 'bg-green-50 text-green-600',
                    'Ditolak'      => 'bg-red-50 text-red-600',
                    default        => 'bg-gray-50 text-gray-600',
                };
            @endphp
            <span class="px-3 py-1.5 rounded-xl text-xs font-semibold {{ $statusColor }}">
                {{ $laporan->status }}
            </span>
        </div>

        {{-- Detail Info --}}
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Kategori</p>
                <span class="px-2.5 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-600">
                    {{ $laporan->kategori }}
                </span>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Tanggal Laporan</p>
                <p class="text-sm text-gray-900">{{ $laporan->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">No. HP Pelapor</p>
                <p class="text-sm text-gray-900">{{ $laporan->user->no_hp ?? '-' }}</p>
            </div>
            @if($laporan->user->alamat)
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Alamat Pelapor</p>
                <p class="text-sm text-gray-900">{{ $laporan->user->alamat }}</p>
            </div>
            @endif
        </div>

        {{-- Deskripsi --}}
        <div class="mb-6">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Deskripsi</p>
            <p class="text-sm text-gray-700 leading-relaxed">{{ $laporan->deskripsi }}</p>
        </div>

        {{-- Catatan Petugas --}}
        @if($laporan->catatan_petugas)
        <div class="bg-blue-50 rounded-xl px-4 py-3 mb-6">
            <p class="text-xs font-semibold text-blue-400 uppercase tracking-wider mb-1">Catatan Petugas</p>
            <p class="text-sm text-blue-700">{{ $laporan->catatan_petugas }}</p>
        </div>
        @endif

        {{-- Update Status langsung dari detail --}}
        <div class="border-t border-gray-100 pt-6">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Update Status</p>
            <form method="POST" action="{{ route('petugas.updateStatus', $laporan->id) }}" class="space-y-3">
                @csrf
                @method('PATCH')

                <select name="status"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
                    <option value="Belum Dibaca" {{ $laporan->status == 'Belum Dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="Dikerjakan"   {{ $laporan->status == 'Dikerjakan'   ? 'selected' : '' }}>Dikerjakan</option>
                    <option value="Selesai"      {{ $laporan->status == 'Selesai'      ? 'selected' : '' }}>Selesai</option>
                    <option value="Ditolak"      {{ $laporan->status == 'Ditolak'      ? 'selected' : '' }}>Ditolak</option>
                </select>

                <textarea name="catatan_petugas" rows="3"
                    placeholder="Tambahkan catatan (opsional)..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 resize-none">{{ $laporan->catatan_petugas }}</textarea>

                <button type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors">
                    Simpan Status
                </button>
            </form>
        </div>

    </div>

    {{-- Card Foto --}}
    @if($laporan->foto && count($laporan->foto) > 0)
    <div class="bg-white rounded-2xl border border-gray-100 p-8">
        <h2 class="text-sm font-bold text-gray-900 mb-4">Foto Bukti</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach($laporan->foto as $foto)
            <a href="{{ Storage::url($foto) }}" target="_blank">
                <img src="{{ Storage::url($foto) }}"
                    class="w-full h-40 object-cover rounded-xl border border-gray-100 hover:opacity-80 transition-opacity cursor-zoom-in">
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection