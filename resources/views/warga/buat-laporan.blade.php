@extends('layouts.app')

@section('title', 'Buat Laporan - Laporin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Buat Laporan</h1>
    <p class="text-gray-400 text-sm mt-1">Sampaikan keluhan atau laporan kamu kepada petugas</p>
</div>

{{-- Form --}} 
<div class="bg-white rounded-2xl border border-gray-100 p-8 max-w-2xl">
    <form method="POST" action="{{ route('warga.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-5">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Judul Laporan
            </label>
            <input
                type="text"
                name="judul"
                value="{{ old('judul') }}"
                placeholder="Contoh: Jalan berlubang di depan RT 03"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('judul') ? 'border-red-300' : '' }}"
                required
            >
            @error('judul')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kategori --}}
        <div class="mb-5">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Kategori
            </label>
            <select
                name="kategori"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('kategori') ? 'border-red-300' : '' }}"
                required
            >
                <option value="" disabled selected>Pilih kategori laporan</option>
                <option value="Jalan Rusak" {{ old('kategori') == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak</option>
                <option value="Banjir" {{ old('kategori') == 'Banjir' ? 'selected' : '' }}>Banjir</option>
                <option value="Sampah" {{ old('kategori') == 'Sampah' ? 'selected' : '' }}>Sampah</option>
                <option value="Lampu Mati" {{ old('kategori') == 'Lampu Mati' ? 'selected' : '' }}>Lampu Mati</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('kategori')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-5">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Deskripsi
            </label>
            <textarea
                name="deskripsi"
                rows="4"
                placeholder="Jelaskan detail laporan kamu..."
                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900 resize-none {{ $errors->has('deskripsi') ? 'border-red-300' : '' }}"
                required
            >{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Upload Foto --}}
        <div class="mb-8">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Foto Bukti <span class="text-gray-400 normal-case font-normal">(opsional, max 3 foto, masing-masing max 2MB)</span>
            </label>

            <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-gray-400 transition-colors cursor-pointer"
                onclick="document.getElementById('foto-input').click()">
                <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-sm text-gray-400">Klik untuk upload foto</p>
                <p class="text-xs text-gray-300 mt-1">JPG, PNG • Max 3 foto • Max 2MB per foto</p>
            </div>

            <input
                type="file"
                name="foto[]"
                id="foto-input"
                multiple
                accept="image/*"
                class="hidden"
                onchange="previewFoto(this)"
            >

            {{-- Error validasi foto --}}
            <div id="foto-error" class="hidden mt-2 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl px-4 py-2"></div>

            {{-- Preview foto --}}
            <div id="foto-preview" class="flex gap-3 mt-3 flex-wrap"></div>

            @error('foto.*')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex gap-3">
            <button
                type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors"
            >
                Kirim Laporan
            </button>
            <a href="{{ route('warga.dashboard') }}"
                class="px-6 py-3 rounded-xl text-sm font-medium text-gray-500 hover:bg-gray-100 transition-colors">
                Batal
            </a>
        </div>

    </form>
</div>

{{-- Script Preview Foto --}}
<script>
function previewFoto(input) {
    const preview = document.getElementById('foto-preview');
    const errorBox = document.getElementById('foto-error');
    preview.innerHTML = '';
    errorBox.classList.add('hidden');
    errorBox.textContent = '';

    const files = Array.from(input.files);
    const maxFile = 3;
    const maxSize = 2 * 1024 * 1024; // 2MB

    // Validasi jumlah
    if (files.length > maxFile) {
        errorBox.textContent = 'Maksimal 3 foto yang bisa diupload!';
        errorBox.classList.remove('hidden');
        input.value = '';
        return;
    }

    // Validasi ukuran per file
    const oversized = files.filter(f => f.size > maxSize);
    if (oversized.length > 0) {
        const names = oversized.map(f => `${f.name} (${(f.size / 1024 / 1024).toFixed(1)}MB)`).join(', ');
        errorBox.textContent = `Foto berikut melebihi batas 2MB: ${names}`;
        errorBox.classList.remove('hidden');
        input.value = '';
        return;
    }

    // Preview
    files.forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => {
            const div = document.createElement('div');
            div.className = 'relative';
            div.innerHTML = `
                <img src="${e.target.result}"
                    class="w-24 h-24 object-cover rounded-xl border border-gray-200">
                <p class="text-xs text-gray-400 mt-1 text-center">${(file.size / 1024 / 1024).toFixed(1)}MB</p>
            `;
            preview.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
}
</script>

@endsection