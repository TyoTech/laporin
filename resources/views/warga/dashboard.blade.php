@extends('layouts.app')

@section('title', 'Dashboard - Laporin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-2xl md:text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-gray-400 text-sm mt-1">Semua laporan yang masuk dari warga</p>
</div>

{{-- Success Alert --}}
@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 text-sm rounded-xl px-4 py-3 mb-6">
        {{ session('success') }}
    </div>
@endif

{{-- Filter --}}
<div class="bg-white rounded-2xl border border-gray-100 p-4 mb-6 flex flex-wrap gap-3 items-center">
    <form method="GET" action="{{ route('warga.dashboard') }}" class="flex flex-wrap gap-3 w-full">

        <select name="status" onchange="this.form.submit()"
            class="px-4 py-2 rounded-xl border border-gray-200 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900">
            <option value="semua" {{ request('status') == 'semua' || !request('status') ? 'selected' : '' }}>Semua Status</option>
            <option value="Belum Dibaca" {{ request('status') == 'Belum Dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
            <option value="Dikerjakan" {{ request('status') == 'Dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>

        <select name="kategori" onchange="this.form.submit()"
            class="px-4 py-2 rounded-xl border border-gray-200 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900">
            <option value="semua" {{ request('kategori') == 'semua' || !request('kategori') ? 'selected' : '' }}>Semua Kategori</option>
            <option value="Jalan Rusak" {{ request('kategori') == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak</option>
            <option value="Banjir" {{ request('kategori') == 'Banjir' ? 'selected' : '' }}>Banjir</option>
            <option value="Sampah" {{ request('kategori') == 'Sampah' ? 'selected' : '' }}>Sampah</option>
            <option value="Lampu Mati" {{ request('kategori') == 'Lampu Mati' ? 'selected' : '' }}>Lampu Mati</option>
            <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>

    </form>
</div>

{{-- Tabel Laporan --}}
<div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
    <div class="hidden md:block overflow-x-auto">
        <table class="w-full min-w-[700px]">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Judul</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Kategori</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pelapor</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal</th>
                    <th class="text-left px-4 md:px-6 py-3 md:py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($laporan as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 md:px-6 py-3 md:py-4 text-sm text-gray-400">{{ $loop->iteration }}</td>
                    <td class="px-4 md:px-6 py-3 md:py-4">
                        <a href="{{ route('warga.show', $item->id) }}">
                            <p class="text-sm font-medium text-gray-900 hover:underline cursor-pointer">{{ $item->judul }}</p>
                            <p class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ $item->deskripsi }}</p>
                        </a>
                    </td>
                    <td class="px-4 md:px-6 py-3 md:py-4">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-600">
                            {{ $item->kategori }}
                        </span>
                    </td>
                    <td class="px-4 md:px-6 py-3 md:py-4 text-sm text-gray-600">{{ $item->user->name }}</td>
                    <td class="px-4 md:px-6 py-3 md:py-4">
                        @php
                            $statusColor = match($item->status) {
                                'Belum Dibaca' => 'bg-yellow-50 text-yellow-600',
                                'Dikerjakan'   => 'bg-blue-50 text-blue-600',
                                'Selesai'      => 'bg-green-50 text-green-600',
                                'Ditolak'      => 'bg-red-50 text-red-600',
                                default        => 'bg-gray-50 text-gray-600',
                            };
                        @endphp
                        <span class="px-2.5 py-1 rounded-lg text-xs font-medium {{ $statusColor }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="px-4 md:px-6 py-3 md:py-4 text-sm text-gray-400">
                        {{ $item->created_at->format('d M Y') }}
                    </td>
                    <td class="px-4 md:px-6 py-3 md:py-4">
                        @if($item->user_id == auth()->id())
                        <a href="{{ route('warga.edit', $item->id) }}"
                            class="text-blue-500">
                            Edit
                        </a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400 text-sm">
                        Belum ada laporan yang masuk.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="md:hidden space-y-4">

    @foreach($laporan as $item)

    <div class="bg-white p-4 rounded-xl border border-gray-100">

        <p class="font-semibold text-gray-900">
            {{ $item->judul }}
        </p>

        <p class="text-sm text-gray-500 mt-1">
            {{ $item->deskripsi }}
        </p>

        <div class="mt-3 text-sm space-y-1">

            <p><span class="text-gray-400">Kategori:</span> {{ $item->kategori }}</p>

            <p><span class="text-gray-400">Pelapor:</span> {{ $item->user->name }}</p>

            <p><span class="text-gray-400">Status:</span> {{ $item->status }}</p>

            <p><span class="text-gray-400">Tanggal:</span> {{ $item->created_at->format('d M Y') }}</p>

        </div>

        <a href="{{ route('warga.edit', $item->id) }}"
        class="inline-block mt-3 text-blue-500 text-sm">
            Edit
        </a>

    </div>

    @endforeach

    </div>

    {{-- Pagination --}}
    @if($laporan->hasPages())
    <div class="px-4 md:px-6 py-3 md:py-4 border-t border-gray-100">
        {{ $laporan->appends(request()->query())->links() }}
    </div>
    @endif
</div>

@endsection