@extends('layouts.app')

@section('title', 'Account - Laporin')

@section('content')

{{-- Header --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-gray-900">Account</h1>
    <p class="text-gray-400 text-sm mt-1">Kelola informasi profil dan keamanan akun kamu</p>
</div>

<div class="max-w-2xl space-y-6">

    {{-- Card Profil --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-8">

        {{-- Avatar --}}
        <div class="flex items-center gap-4 mb-8 pb-6 border-b border-gray-100">
            <div class="w-16 h-16 bg-gray-900 rounded-full flex items-center justify-center">
                <span class="text-white text-2xl font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </span>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-900">{{ auth()->user()->name }}</p>
                <span class="px-2.5 py-1 rounded-lg text-xs font-medium
                    {{ auth()->user()->isPetugas() ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600' }}">
                    {{ ucfirst(auth()->user()->role) }}
                </span>
            </div>
        </div>

        {{-- Success Alert Profil --}}
        @if(session('success_profil'))
            <div class="bg-green-50 border border-green-200 text-green-600 text-sm rounded-xl px-4 py-3 mb-6">
                {{ session('success_profil') }}
            </div>
        @endif

        {{-- Form Profil --}}
        <form method="POST" action="{{ route('account.profil') }}">
            @csrf
            @method('PATCH')

            <h2 class="text-sm font-bold text-gray-900 mb-4">Informasi Profil</h2>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('name') ? 'border-red-300' : '' }}">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('email') ? 'border-red-300' : '' }}">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', auth()->user()->alamat) }}"
                    placeholder="Alamat kamu"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
            </div>

            <div class="mb-6">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">No. HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', auth()->user()->no_hp) }}"
                    placeholder="08xxxxxxxxxx"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
            </div>

            <button type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors">
                Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- Card Ganti Password --}}
    <div class="bg-white rounded-2xl border border-gray-100 p-8">

        {{-- Success Alert Password --}}
        @if(session('success_password'))
            <div class="bg-green-50 border border-green-200 text-green-600 text-sm rounded-xl px-4 py-3 mb-6">
                {{ session('success_password') }}
            </div>
        @endif

        <form method="POST" action="{{ route('account.password') }}">
            @csrf
            @method('PATCH')

            <h2 class="text-sm font-bold text-gray-900 mb-4">Ganti Password</h2>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Password Lama</label>
                <input type="password" name="password_lama"
                    placeholder="Masukkan password lama"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('password_lama') ? 'border-red-300' : '' }}">
                @error('password_lama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Password Baru</label>
                <input type="password" name="password"
                    placeholder="Min. 6 karakter"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 {{ $errors->has('password') ? 'border-red-300' : '' }}">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation"
                    placeholder="Ulangi password baru"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
            </div>

            <button type="submit"
                class="bg-gray-900 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-gray-700 transition-colors">
                Ganti Password
            </button>
        </form>
    </div>

</div>

@endsection