@extends('layouts.app')

@section('title', 'Dashboard Petugas - Laporin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard Petugas</h1>
    <p class="text-gray-400 text-sm mt-1">Kelola dan perbarui status laporan warga</p>
</div>

{{-- Success Alert --}}
@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 text-sm rounded-xl px-4 py-3 mb-6">
        {{ session('success') }}
    </div>
@endif

{{-- Stats Card Horizontal --}}
<div class="grid grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4">
        <div class="w-10 h-10 bg-yellow-50 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Belum Dibaca</p>
            <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalBelumDibaca }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4">
        <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Dikerjakan</p>
            <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalDikerjakan }}</p>
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
            <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalSelesai }}</p>
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
            <p class="text-2xl font-bold text-gray-900 mt-0.5">{{ $totalDitolak }}</p>
        </div>
    </div>
</div>

{{-- Filter --}}
<div class="bg-white rounded-2xl border border-gray-100 p-4 mb-6">
    <form method="GET" action="{{ route('petugas.dashboard') }}" class="flex flex-wrap gap-3">
        <select name="status" onchange="this.form.submit()"
            class="px-4 py-2 rounded-xl border border-gray-200 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900">
            <option value="semua" {{ !request('status') || request('status') == 'semua' ? 'selected' : '' }}>Semua Status</option>
            <option value="Belum Dibaca" {{ request('status') == 'Belum Dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
            <option value="Dikerjakan" {{ request('status') == 'Dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>

        <select name="kategori" onchange="this.form.submit()"
            class="px-4 py-2 rounded-xl border border-gray-200 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-900">
            <option value="semua" {{ !request('kategori') || request('kategori') == 'semua' ? 'selected' : '' }}>Semua Kategori</option>
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
    <table class="w-full">
        <thead>
            <tr class="border-b border-gray-100">
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Laporan</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pelapor</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Kategori</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal</th>
                <th class="text-left px-6 py-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($laporan as $item)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4 text-sm text-gray-400">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('petugas.show', $item->id) }}">
                        <p class="text-sm font-medium text-gray-900 hover:underline cursor-pointer">{{ $item->judul }}</p>
                        <p class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ $item->deskripsi }}</p>
                        @if($item->catatan_petugas)
                            <p class="text-xs text-blue-500 mt-0.5">Catatan: {{ $item->catatan_petugas }}</p>
                        @endif
                    </a>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">{{ $item->user->name }}</td>
                <td class="px-6 py-4">
                    <span class="px-2.5 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-600">
                        {{ $item->kategori }}
                    </span>
                </td>
                <td class="px-6 py-4">
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
                <td class="px-6 py-4 text-sm text-gray-400">
                    {{ $item->created_at->format('d M Y') }}
                </td>
                <td class="px-6 py-4">
                    <button
                        onclick="openModal({{ $item->id }}, '{{ $item->status }}', '{{ addslashes($item->catatan_petugas ?? '') }}')"
                        class="px-3 py-1.5 rounded-lg text-xs font-medium bg-gray-900 text-white hover:bg-gray-700 transition-colors">
                        Update Status
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-12 text-center text-gray-400 text-sm">
                    Belum ada laporan yang masuk.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($laporan->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $laporan->appends(request()->query())->links() }}
    </div>
    @endif
</div>

{{-- Modal Update Status --}}
<div id="modal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 w-full max-w-md shadow-xl">
        <h2 class="text-lg font-bold text-gray-900 mb-6">Update Status Laporan</h2>

        <form method="POST" id="modal-form">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                    Status
                </label>
                <select name="status" id="modal-status"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
                    <option value="Belum Dibaca">Belum Dibaca</option>
                    <option value="Dikerjakan">Dikerjakan</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                    Catatan <span class="text-gray-400 normal-case font-normal">(opsional)</span>
                </label>
                <textarea name="catatan_petugas" id="modal-catatan" rows="3"
                    placeholder="Tambahkan catatan untuk pelapor..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 resize-none"></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 bg-gray-900 text-white py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors">
                    Simpan
                </button>
                <button type="button" onclick="closeModal()"
                    class="flex-1 py-3 rounded-xl text-sm font-medium text-gray-500 hover:bg-gray-100 transition-colors">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id, status, catatan) {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal-form').action = `/petugas/laporan/${id}/status`;
    document.getElementById('modal-status').value = status;
    document.getElementById('modal-catatan').value = catatan;
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

// Tutup modal kalau klik di luar
document.getElementById('modal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>

@endsection