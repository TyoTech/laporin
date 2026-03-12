<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::with('user')->latest();

        // Filter status
        if ($request->status && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        // Filter kategori
        if ($request->kategori && $request->kategori !== 'semua') {
            $query->where('kategori', $request->kategori);
        }

        $laporan = $query->paginate(10);

        return view('warga.dashboard', compact('laporan'));
    }

    public function create()
    {
        return view('warga.buat-laporan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'foto.*' => 'nullable|image|max:2048',
        ]);

        $fotos = [];
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('laporan', 'public');
                $fotos[] = $path;
            }
        }

        Laporan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => json_encode($fotos),
            'status' => 'Belum Dibaca',
        ]);

        return redirect()->route('warga.dashboard')->with('success', 'Laporan berhasil dikirim!');
    }

    public function tentang()
    {
        return view('warga.tentang');
    }

    public function show($id)
    {
        $laporan = Laporan::with('user')->findOrFail($id);
        return view('warga.detail-laporan', compact('laporan'));
    }
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        if ($laporan->user_id !== auth()->id()) {
            abort(403, 'Kamu tidak punya akses untuk mengedit laporan ini.');
        }
        return view('warga.edit', compact('laporan'));
    }
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->user_id != auth()->id()) {
            abort(403);
        }

        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $fotoPaths = [];

            foreach ($request->file('foto') as $foto) {
                $path = $foto->store('laporan', 'public');
                $fotoPaths[] = $path;
            }

            $data['foto'] = $fotoPaths;
        }

        $laporan->update($data);

        return redirect()->route('warga.dashboard')->with('success','Laporan berhasil diupdate');
    }
}