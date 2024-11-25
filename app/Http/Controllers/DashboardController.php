<?php

namespace App\Http\Controllers;

use App\Models\profilpetugas;
use App\Models\plotingpetugas;
use Illuminate\Http\Request;
use App\Models\datakabkot;
use App\Models\Trackingmaps; 
use App\Models\mastershp;
use App\Models\mastershpb;
use App\Models\daftarpetugas;
use App\Models\KategoriLapanganUsaha;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * =============================================
     *      view dashboard pages
     * =============================================
     */
    public function index(Request $request){
        
            // Hitung jumlah total responden
            $totalResponden = mastershp::count();
            // Hitung jumlah total petugas
            $totalPetugas = daftarpetugas::count();
        
            $kode_kabkot = $request->input('kode_kabkot', null);
            // Buat query dengan filter berdasarkan kode_kabkot
            $query = mastershp::with('statuspendataan','datakabkot')
                ->selectRaw('kode_status, COUNT(*) as count')
                ->groupBy('kode_status');
        
            if ($kode_kabkot) {
                $query->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
            }
        
            // Eksekusi query
            $data = $query->get();

            // Total petugas dengan filter berdasarkan kode_kabkot
            $totalPetugasSHP = profilpetugas::where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%')
            ->whereHas('plotingpetugas', function ($query) {
                $query->where('kode_kegiatan', 1001);
            })->count();
            
            
            // Ambil data kabkot dari request
            $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();
            $datakabkot = datakabkot::all();
        
            
            // Mengubah data menjadi format yang cocok untuk chart
            $chartData = [
                'labels' => $data->pluck('statuspendataan.status_pendataan')->map(function ($label) {
                    return $label ?? '-'; // Tampilkan '-' jika null
                })->toArray(),
                'data' => $data->pluck('count')->toArray()
            ];

            // Hitung total responden berdasarkan keempat status
            $totalRespondenPerStatus = $data->sum('count');
            $totalRespondenStatus12 = $data->whereIn('kode_status', [1, 2])->sum('count');
            
            // Hitung persentase progress
            $progress = $totalRespondenPerStatus > 0 
            ? round(($totalRespondenStatus12 / $totalRespondenPerStatus) * 100, 2) 
            : 0; // Pastikan tidak membagi dengan nol

        return view('admin.pages.dashboard.index', 
        compact('chartData', 'kode_kabkot', 'totalResponden', 
        'totalRespondenPerStatus','totalRespondenStatus12' , 
        'req_kabkot','datakabkot','totalPetugas','progress',
        'totalPetugasSHP',));
    }
}
