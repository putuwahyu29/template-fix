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
use Carbon\Carbon;


class DashboardController extends Controller
{

    /**
     * =============================================
     *      view dashboard pages
     * =============================================
     */
    public function index(Request $request) {
        $kode_kabkot = $request->input('kode_kabkot', null);
        $data_type = $request->input('data_type', 'shp'); // Default SHP jika tidak ada input
        $data_table = $data_type === 'shpb' ? mastershpb::class : mastershp::class;
    
        // Buat query dengan filter berdasarkan kode_kabkot
        $query = $data_table::with('statuspendataan', 'datakabkot')
            ->selectRaw('kode_status, COUNT(*) as count')
            ->groupBy('kode_status');
    
        if ($kode_kabkot) {
            $query->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
        }
    
        $data = $query->get();
    
        // Total petugas dengan filter berdasarkan kode_kabkot
        $kode_kegiatan = $data_type === 'shpb' ? 1002 : 1001;
        $totalPetugas = profilpetugas::where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%')
            ->whereHas('plotingpetugas', function ($query) use ($kode_kegiatan) {
                $query->where('kode_kegiatan', $kode_kegiatan);
            })->count();
    
        // Mengubah data menjadi format yang cocok untuk chart
        $chartData = [
            'labels' => $data->pluck('statuspendataan.status_pendataan')->map(function ($label) {
                return $label ?? '-';
            })->toArray(),
            'data' => $data->pluck('count')->toArray()
        ];
    
        // Hitung total responden berdasarkan keempat status
        $totalRespondenPerStatus = $data->sum('count');
        $totalRespondenStatus12 = $data->whereIn('kode_status', [1, 2])->sum('count');
    
        // Hitung persentase progress
        $progress = $totalRespondenPerStatus > 0 
            ? round(($totalRespondenStatus12 / $totalRespondenPerStatus) * 100, 2)
            : 0;
    
        $datakabkot = datakabkot::all();
        $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();
    
        return view('admin.pages.dashboard.index', compact(
            'chartData', 'kode_kabkot', 'totalRespondenPerStatus', 'totalRespondenStatus12',
            'req_kabkot', 'datakabkot', 'progress', 'totalPetugas', 'data_type'
        ));
    }
}
