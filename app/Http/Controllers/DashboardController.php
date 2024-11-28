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
    public function index(Request $request){
        
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
            
            $chartDatatarget = [
                'labels' => $data->pluck('statuspendataan.status_pendataan')->map(function ($label) {
                    return $label ?? '-'; // Tampilkan '-' jika null
                })->toArray(),
                'data' => $data->pluck('count')->toArray()
            ];

            // Tangkap rentang tanggal
            $dateRange = $request->input('date_range');
            $days = 0; // Default jika rentang tanggal tidak ada

            if ($dateRange) {
                // Pisahkan tanggal (dengan asumsi formatnya: "YYYY-MM-DD to YYYY-MM-DD")
                $dates = explode(' to ', $dateRange);
                if (count($dates) === 2) {
                    $startDate = Carbon::parse($dates[0]);
                    $endDate = Carbon::parse($dates[1]);

                    // Hitung jumlah hari
                    $days = $endDate->diffInDays($startDate) + 1; // Tambahkan 1 agar inklusif
                }
            }

            // Hitung persentase berdasarkan formula
            $target = $days > 0 ? (10 / $days) * 100 : 0; 
            //dd($target);

            //$kode_kabkot = $request->input('kode_kabkot', null);
            // Buat query dengan filter berdasarkan kode_kabkot
            $query2 = mastershpb::with('statuspendataan','datakabkot')
                ->selectRaw('kode_status, COUNT(*) as count')
                ->groupBy('kode_status');
        
            if ($kode_kabkot) {
                $query2->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
            }
        
            // Eksekusi query
            $data2 = $query2->get();

            // Total petugas dengan filter berdasarkan kode_kabkot
            $totalPetugasSHPB = profilpetugas::where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%')
            ->whereHas('plotingpetugas', function ($query) {
                $query->where('kode_kegiatan', 1002);
            })->count();
            
            
            // Mengubah data menjadi format yang cocok untuk chart
            $chartData2 = [
                'labels' => $data2->pluck('statuspendataan.status_pendataan')->map(function ($label) {
                    return $label ?? '-'; // Tampilkan '-' jika null
                })->toArray(),
                'data' => $data2->pluck('count')->toArray()
            ];

            // Hitung total responden berdasarkan keempat status
            $totalRespondenPerStatusshpb = $data2->sum('count');
            $totalRespondenStatus12shpb = $data2->whereIn('kode_status', [1, 2])->sum('count');
            
            // Hitung persentase progress
            $shpbprogress = $totalRespondenPerStatusshpb > 0 
            ? round(($totalRespondenStatus12shpb / $totalRespondenPerStatusshpb) * 100, 2) 
            : 0; // Pastikan tidak membagi dengan nol

            // Ambil data kabkot dari request
            $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();
            $datakabkot = datakabkot::all();

        return view('admin.pages.dashboard.index', 
        compact('chartData', 'kode_kabkot', 
        'totalRespondenPerStatus','totalRespondenStatus12' , 
        'req_kabkot','datakabkot','progress',
        'totalPetugasSHP','shpbprogress','totalRespondenPerStatusshpb','totalRespondenStatus12shpb',
        'totalPetugasSHPB','chartData2','chartDatatarget','target'));
    }
}
