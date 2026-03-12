{{-- Form Edit Laporan --}}
<div class="bg-white rounded-2xl border border-gray-100 p-8 max-w-2xl">
    <form method="POST" action="{{ route('warga.update', $laporan->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-5">
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                Judul Laporan
            </label>
            <input
                type="text"
                name="judul"
                value="{{ old('judul', $laporan->judul) }}"
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
                <option value="Jalan Rusak" {{ old('kategori', $laporan->kategori) == 'Jalan Rusak' ? 'selected' : '' }}>Jalan Rusak</option>
                <option value="Banjir" {{ old('kategori', $laporan->kategori) == 'Banjir' ? 'selected' : '' }}>Banjir</option>
                <option value="Sampah" {{ old('kategori', $laporan->kategori) == 'Sampah' ? 'selected' : '' }}>Sampah</option>
                <option value="Lampu Mati" {{ old('kategori', $laporan->kategori) == 'Lampu Mati' ? 'selected' : '' }}>Lampu Mati</option>
                <option value="Lainnya" {{ old('kategori', $laporan->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
            >{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
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
                <p class="text-sm text-gray-400">Klik untuk upload foto baru</p>
                <p class="text-xs text-gray-300 mt-1">JPG, PNG • Max 3 foto • Max 2MB per foto</p>
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
            <div class="flex gap-3 mt-3 flex-wrap">
                @foreach($laporan->foto as $foto)
                    <img src="{{ asset('storage/'.$foto) }}" width="120">
                @endforeach
            </div>
            @endif
        </div>

        {{-- Tombol --}}
        <div class="flex gap-3">
            <button
                type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors"
            >
                Update Laporan
            </button>

            <a href="{{ route('warga.dashboard') }}"
                class="px-6 py-3 rounded-xl text-sm font-medium text-gray-500 hover:bg-gray-100 transition-colors">
                Batal
            </a>
        </div>

    </form>
</div>