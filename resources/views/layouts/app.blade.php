<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laporin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 min-h-screen bg-white border-r border-gray-100 flex flex-col fixed top-0 left-0">

        {{-- Logo --}}
        <div class="px-6 py-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-gray-900 rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-bold">L</span>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-medium">Aplikasi</p>
                    <p class="text-sm font-bold text-gray-900">Laporin.</p>
                </div>
            </div>
        </div>

        {{-- Nav Menu --}}
        <nav class="flex-1 px-4 py-6 space-y-1">

            @if(auth()->user()->isPetugas())
                <a href="{{ route('petugas.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                {{ request()->routeIs('petugas.dashboard') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('petugas.analisis') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                {{ request()->routeIs('petugas.analisis') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Analisis
                </a>
            @else
                {{-- Menu Warga --}}
                <a href="{{ route('warga.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                   {{ request()->routeIs('warga.dashboard') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('warga.buat') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                   {{ request()->routeIs('warga.buat') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Buat Laporan
                </a>

                <a href="{{ route('warga.tentang') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                   {{ request()->routeIs('warga.tentang') ? 'bg-gray-900 text-white' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-900' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
                    </svg>
                    Tentang Kami
                </a>
            @endif

        </nav>

        {{-- Account + Logout --}}
        <div class="px-4 py-4 border-t border-gray-100">
            <a href="{{ route('account') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-xl mb-2 hover:bg-gray-50 transition-colors {{ request()->routeIs('account') ? 'bg-gray-100' : '' }}">
                <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                    <span class="text-gray-600 text-xs font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- Main Content --}}
    <main class="ml-64 flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>