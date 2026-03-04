<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laporin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md px-4 py-10">

        {{-- Logo --}}
        <div class="flex flex-col items-center mb-8">
            <div class="w-14 h-14 bg-gray-900 rounded-full flex items-center justify-center mb-4">
                <span class="text-white text-xl font-bold">L</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Buat Akun Baru.</h1>
            <p class="text-gray-400 text-sm mt-1">Daftarkan diri kamu sebagai warga</p>
        </div>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl px-4 py-3 mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Nama Lengkap
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nama kamu"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Alamat
                    </label>
                    <input
                        type="text"
                        name="alamat"
                        value="{{ old('alamat') }}"
                        placeholder="Alamat kamu (opsional)"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        No. HP
                    </label>
                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="08xxxxxxxxxx (opsional)"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                    >
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Min. 6 karakter"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                        Konfirmasi Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-gray-900"
                        required
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold text-sm hover:bg-gray-700 transition-colors"
                >
                    Buat Akun
                </button>
            </form>
        </div>

        <p class="text-center text-sm text-gray-400 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-gray-900 font-semibold hover:underline">Login Di Sini</a>
        </p>

    </div>

</body>
</html>