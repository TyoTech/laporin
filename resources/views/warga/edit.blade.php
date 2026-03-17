{{-- Form Edit Laporan --}}
@extends('layouts.app')

@section('content')
<div class="w-full max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl border border-gray-100 p-5 sm:p-8 shadow-sm w-full">
        <form method="POST" action="{{ route('warga.update', $laporan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-5">

                {{-- Judul --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Judul Laporan
                    </label>
                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul', $laporan->judul) }}"
                        placeholder="Contoh: Jalan berlubang di depan RT 03"
                        class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-gray-900 focus:outline-none
                        {{ $errors->has('judul') ? 'border-red-400' : 'border-gray-200' }}"
                        required
                    >
                    @error('judul')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Kategori
                    </label>
                    <select
                        name="kategori"
                        class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-gray-900 focus:outline-none
                        {{ $errors->has('kategori') ? 'border-red-400' : 'border-gray-200' }}"
                        required
                    >
                        @foreach(['Jalan Rusak','Banjir','Sampah','Lampu Mati','Lainnya'] as $item)
                            <option value="{{ $item }}" {{ old('kategori', $laporan->kategori) == $item ? 'selected' : '' }}>
                                {{ $item }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Deskripsi
                    </label>
                    <textarea
                        name="deskripsi"
                        rows="4"
                        placeholder="Jelaskan detail laporan kamu..."
                        class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-gray-900 focus:outline-none resize-none
                        {{ $errors->has('deskripsi') ? 'border-red-400' : 'border-gray-200' }}"
                        required
                    >{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Upload Foto --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
                        Foto Bukti
                        <span class="text-gray-400 normal-case font-normal">
                            (opsional, max 3 foto)
                        </span>
                    </label>

                    <div
                        class="border-2 border-dashed border-gray-200 rounded-xl p-5 sm:p-6 text-center hover:border-gray-400 transition cursor-pointer"
                        onclick="document.getElementById('foto-input').click()"
                    >
                        <p class="text-sm text-gray-400">Klik untuk upload</p>
                        <p class="text-xs text-gray-300 mt-1">JPG / PNG • Max 2MB</p>
                    </div>

                    <input
                        type="file"
                        name="foto[]"
                        id="foto-input"
                        multiple
                        accept="image/*"
                        class="hidden"
                    >

                    {{-- Preview foto lama --}}
                    @if($laporan->foto)
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-3 mt-4">
                        @php
                            $fotos = is_array($laporan->foto)
                                ? $laporan->foto
                                : json_decode($laporan->foto, true);
                        @endphp

                        @foreach($fotos ?? [] as $foto)
                            <div class="relative">
                                <img src="{{ asset('storage/'.$foto) }}"
                                    class="w-full h-24 object-cover rounded-lg border">
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Tombol --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-3">
                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition"
                    >
                        Update Laporan
                    </button>

                    <a href="{{ route('warga.dashboard') }}"
                        class="w-full sm:w-auto text-center px-6 py-3 rounded-xl text-sm font-medium text-gray-500 hover:bg-gray-100 transition">
                        Batal
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection