<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::with('user')->latest();

        if ($request->status && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        if ($request->kategori && $request->kategori !== 'semua') {
            $query->where('kategori', $request->kategori);
        }

        $laporan = $query->paginate(10);

        $totalBelumDibaca = Laporan::where('status', 'Belum Dibaca')->count();
        $totalDikerjakan  = Laporan::where('status', 'Dikerjakan')->count();
        $totalSelesai     = Laporan::where('status', 'Selesai')->count();
        $totalDitolak     = Laporan::where('status', 'Ditolak')->count();

        return view('petugas.dashboard', compact(
            'laporan',
            'totalBelumDibaca',
            'totalDikerjakan',
            'totalSelesai',
            'totalDitolak'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Belum Dibaca,Dikerjakan,Selesai,Ditolak',
            'catatan_petugas' => 'nullable|string',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'status' => $request->status,
            'catatan_petugas' => $request->catatan_petugas,
        ]);

        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function analisis()
{
    // Total keseluruhan
    $totalSemua      = Laporan::count();
    $totalBelumDibaca = Laporan::where('status', 'Belum Dibaca')->count();
    $totalDikerjakan  = Laporan::where('status', 'Dikerjakan')->count();
    $totalSelesai     = Laporan::where('status', 'Selesai')->count();
    $totalDitolak     = Laporan::where('status', 'Ditolak')->count();

    // Laporan per bulan (12 bulan terakhir)
    $perBulan = Laporan::selectRaw('MONTH(created_at) as bulan, YEAR(created_at) as tahun, COUNT(*) as total')
        ->whereYear('created_at', date('Y'))
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->orderByRaw('YEAR(created_at), MONTH(created_at)')
        ->get();

    $bulanLabel = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    $dataPerBulan = array_fill(0, 12, 0);
    foreach ($perBulan as $item) {
        $dataPerBulan[$item->bulan - 1] = $item->total;
    }

    // Laporan per kategori
    $perKategori = Laporan::selectRaw('kategori, COUNT(*) as total')
        ->groupBy('kategori')
        ->get();

        return view('petugas.analisis', compact(
            'totalSemua',
            'totalBelumDibaca',
            'totalDikerjakan',
            'totalSelesai',
            'totalDitolak',
            'bulanLabel',
            'dataPerBulan',
            'perKategori'
        ));
    }

    public function show($id)
    {
        $laporan = Laporan::with('user')->findOrFail($id);
        return view('petugas.detail-laporan', compact('laporan'));
    }
}