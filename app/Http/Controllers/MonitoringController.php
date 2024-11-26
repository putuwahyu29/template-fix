<?php

namespace App\Http\Controllers;

use App\Models\datakabkot;
use App\Models\masterkegiatan;
use App\Models\masterresponden;
use App\Models\profilpetugas;
use Illuminate\Http\Request;
use App\Models\Trackingmaps;
use App\Models\monitoring;
use App\Models\trackingpetugas; 
use App\Models\mastershp;
use App\Models\mastershpb;
use App\Models\KategoriLapanganUsaha;
use Illuminate\Support\Facades\DB;


/**
     * ################################################
     *      THIS IS SAMPLE CONTROLLER
     *  mostly used to display UI implementation.
     *  the main UI for SamBoilerplate is from the Sneat Theme,
     *  check or license about them (to remove credit in footer) in their website
     * ################################################
     */
class MonitoringController extends Controller
{

    private $mainBreadcrumbs;

    /**
     * =============================================
     *      constructor
     * =============================================
     */

    public function __construct()
    {

        // Store common breadcrumbs in the constructor
        $this->mainBreadcrumbs = [
            'Admin' => route('admin.user.index'),
            'Monitoring' => route('admin.user.index'),
        ];
    }

    /**
     * =============================================
     *      show sample page for ringkasan
     * =============================================
     */
    public function shpb(Request $request)
{   
    $breadcrumbs = array_merge($this->mainBreadcrumbs, ['SHPB' => null]);

    // Hitung jumlah total responden
    $totalResponden = mastershpb::count();

    $kode_kabkot = $request->input('kode_kabkot', null);
    // Buat query dengan filter berdasarkan kode_kabkot
    $query = mastershpb::with('statuspendataan','datakabkot')
        ->selectRaw('kode_status, COUNT(*) as count')
        ->groupBy('kode_status');

    if ($kode_kabkot) {
        $query->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
    }

    // Eksekusi query
    $data = $query->get();

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

    // Buat query dengan filter berdasarkan kategorishpb
    $query2 = mastershpb::with('kategoriSHPB')
        ->selectRaw('kode_kategori, COUNT(*) as count')
        ->groupBy('kode_kategori');

        if ($kode_kabkot) {
            $query2->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
        }

    // Eksekusi query
    $data2 = $query2->get();

    $chartData2 = [
        'labels2' => $data2->pluck('kategoriSHPB.kategori_name')->map(function ($label2) {
            return $label2 ?? '-'; // Tampilkan '-' jika null
        })->toArray(),
        'data2' => $data2->pluck('count')->toArray()
    ];

    // Hitung total responden berdasarkan keempat status
    $totalRespondenPerStatus = $data->sum('count');
    $totalRespondenStatus12 = $data->whereIn('kode_status', [1, 2])->sum('count');

    return view('admin.pages.monitoring.shpb', compact('chartData', 'chartData2', 'kode_kabkot', 'totalResponden', 'totalRespondenPerStatus','totalRespondenStatus12' , 'breadcrumbs', 'req_kabkot','datakabkot'));
}


    /**
     * =============================================
     *  show sample page for shp
     * =============================================
     */
    public function shp(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['SHP' => null]);

        {
            // Hitung jumlah total responden
    $totalResponden = mastershp::count();

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

    // Buat query dengan filter berdasarkan kategorilapanganusaha
    $query2 = mastershp::with('KategoriLapanganUsaha')
        ->selectRaw('kode_usaha, COUNT(*) as count')
        ->groupBy('kode_usaha');

        if ($kode_kabkot) {
            $query2->where('kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
        }

    // Eksekusi query
    $data2 = $query2->get();

    $chartData2 = [
        'labels2' => $data2->pluck('KategoriLapanganUsaha.lapanganusaha_name')->map(function ($label2) {
            return $label2 ?? '-'; // Tampilkan '-' jika null
        })->toArray(),
        'data2' => $data2->pluck('count')->toArray()
    ];

    // Buat query dengan join dan gabungan dua kolom
    $query3 = DB::table('responden_shp')
        ->join('kategori_kbli', 'responden_shp.kode_kbli', '=', 'kategori_kbli.kode_kbli')
        ->selectRaw('CONCAT(kategori_kbli.cat_kbli, " - ", kategori_kbli.catname_kbli) as combined_kbli, COUNT(responden_shp.kode_kbli) as count')
        ->groupBy('kategori_kbli.cat_kbli', 'kategori_kbli.catname_kbli'); // Harus grup berdasarkan kedua kolom

    // Tambahkan filter kode_kabkot jika diperlukan
    if ($kode_kabkot) {
    $query3->where('responden_shp.kode_kabkot', 'LIKE', '%' . $kode_kabkot . '%');
    }

    // Eksekusi query
    $data3 = $query3->get();

    // Sesuaikan pemetaan data untuk chart
    $chartData3 = [
        'labels3' => $data3->pluck('combined_kbli')->map(function ($label3) {
            return $label3 ?? '-'; // Tampilkan '-' jika null
        })->toArray(),
        'data3' => $data3->pluck('count')->toArray()
        ];


    // Hitung total responden berdasarkan keempat status
    $totalRespondenPerStatus = $data->sum('count');
    $totalRespondenStatus12 = $data->whereIn('kode_status', [1, 2])->sum('count');

    return view('admin.pages.monitoring.shp', compact('chartData', 'chartData2', 'chartData3', 'kode_kabkot', 'totalResponden', 'totalRespondenPerStatus','totalRespondenStatus12' , 'breadcrumbs', 'req_kabkot','datakabkot'));
        }
    
        }


    /**
     * =============================================
     * show sample page for pengawasan
     * =============================================
     */
    public function pengawasan(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan' => null]);

        return view('admin.pages.monitoring.pengawasan', compact('breadcrumbs'));

    }


    // /**
    //  * =============================================
    //  *  show sample page for susenas
    //  * =============================================
    //  */
    // public function susenas(Request $request){

    //     $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Susenas' => null]);

    //     return view('admin.pages.monitoring.susenas', compact('breadcrumbs'));

    // }

    // /**
    //  * =============================================
    //  *  show sample page for seruti
    //  * =============================================
    //  */
    // public function seruti(Request $request){

    //     $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Seruti' => null]);

    //     return view('admin.pages.monitoring.seruti', compact('breadcrumbs'));

    // }

    // /**
    //  * =============================================
    //  *      show sample page for sakernas
    //  * =============================================
    //  */
    // public function sakernas(Request $request){

    //     $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Sakernas' => null]);

    //     return view('admin.pages.monitoring.sakernas', compact('breadcrumbs'));

    // }

    /**
     * =============================================
     *      show sample page for tracking
     * =============================================
     */
public function tracking(Request $request)
{
    $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tracking' => null]);

    // Ambil parameter filter dari request
    $kode_kegiatan = $request->input('kode_kegiatan', null);
    $kode_kabkot = $request->input('kode_kabkot', null);
    $kode_petugas = $request->input('kode_petugas', null);

    // Query data kegiatan dan kabkot
    $masterkegiatan = MasterKegiatan::all();
    $datakabkot = DataKabkot::all();

    // Query data petugas
    $profilpetugas = ProfilPetugas::when($kode_kabkot, function ($query) use ($kode_kabkot) {
        $query->where('kode_kabkot', $kode_kabkot);
    })->get();

    // Query data monitoring dengan relasi profilpetugas
    $locations = Monitoring::query()
        ->join('profil_petugas', 'monitoring.kode_petugas', '=', 'profil_petugas.kode_petugas') // Join ke profilpetugas
        ->join('status_pendataan', 'monitoring.kode_status', '=', 'status_pendataan.kode_status') // Join ke tabel status_pendataan
        ->join('master_responden', 'monitoring.kode_responden', '=', 'master_responden.kode_responden') // Join ke tabel master_responden
        ->when($kode_kegiatan, function ($query) use ($kode_kegiatan) {
            $query->where('monitoring.kode_kegiatan', $kode_kegiatan); // Filter berdasarkan kode_kegiatan
        })
        ->when($kode_kabkot, function ($query) use ($kode_kabkot) {
            $query->where('profil_petugas.kode_kabkot', $kode_kabkot); // Filter berdasarkan kode_kabkot
        })
        ->when($kode_petugas, function ($query) use ($kode_petugas) {
            $query->where('monitoring.kode_petugas', $kode_petugas); // Filter berdasarkan kode_petugas
        })
        ->select([
            'monitoring.latitude_start',
            'monitoring.longitude_start',
            'monitoring.latitude_stop',
            'monitoring.longitude_stop',
            'monitoring.kode_petugas',
            'monitoring.kode_kegiatan',
            'monitoring.jam_mulai',
            'monitoring.jam_selesai',
            'monitoring.total_waktu',
            'monitoring.keterangan',
            'monitoring.kode_status',
            'profil_petugas.Nama_Petugas',
            'status_pendataan.status_pendataan',
            'master_responden.source_table',
            'master_responden.kode_responden',
        ])
        ->with(['masterresponden.mastershp', 'masterresponden.mastershpb']) // Eager loading untuk menghindari query N+1
        ->get();

    // Tambahkan Nama_Perusahaan ke setiap data lokasi
    foreach ($locations as $location) {
        $masterResponden = $location->masterResponden;

        // Tentukan Nama_Perusahaan berdasarkan source_table
        if ($masterResponden->source_table === 'responden_shp') {
            $location->nama_perusahaan = $masterResponden->mastershp->nama_perusahaan ?? 'Tidak ditemukan';
        } elseif ($masterResponden->source_table === 'responden_shpb') {
            $location->nama_perusahaan = $masterResponden->mastershpb->nama_perusahaan ?? 'Tidak ditemukan';
        } else {
            $location->nama_perusahaan = 'Tidak ditemukan';
        }
    }

    // Kirim data ke view
    return view('admin.pages.monitoring.tracking', compact(
        'breadcrumbs',
        'masterkegiatan',
        'datakabkot',
        'profilpetugas',
        'locations',
        'kode_kegiatan',
        'kode_kabkot',
        'kode_petugas'
    ));
}



    public function filterPetugas(Request $request)
{
    $kode_kabkot = $request->input('kode_kabkot');

    // Query petugas berdasarkan kode_kabkot
    $profilpetugas = profilpetugas::where('kode_kabkot', $kode_kabkot)->get();

    // Kembalikan data dalam format JSON
    return response()->json($profilpetugas);
}

}
