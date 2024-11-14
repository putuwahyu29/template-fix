<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trackingmaps; 
use App\Models\mastershp;
use App\Models\mastershpb;


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

    // Buat query dengan filter berdasarkan kode_kabkot
    $query = mastershpb::with('statuspendataan')
        ->selectRaw('kode_status, COUNT(*) as count')
        ->groupBy('kode_status');

    if ($request->filled('kode_kabkot')) {
        $query->where('kode_kabkot', 'LIKE', '%' . $request->input('kode_kabkot') . '%');
    }

    // Eksekusi query
    $data = $query->get();

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

    if ($request->filled('kode_kategori')) {
        $query->where('kode_kategori', 'LIKE', '%' . $request->input('kode_kategori') . '%');
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

    return view('admin.pages.monitoring.shpb', compact('chartData', 'chartData2', 'totalResponden', 'totalRespondenPerStatus', 'breadcrumbs'));
}


    /**
     * =============================================
     *  show sample page for shp
     * =============================================
     */
    public function shp(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['SHP' => null]);

        {
            $totalResponden = mastershp::count();
            // Membuat query dengan filter berdasarkan kode_kabkot
    $query = mastershp::with('statuspendataan')
    ->selectRaw('kode_status, COUNT(*) as count')
    ->groupBy('kode_status');

if ($request->filled('kode_kabkot')) {
    $query->where('kode_kabkot', 'LIKE', '%' . $request->input('kode_kabkot') . '%');
}

// Eksekusi query
$data = $query->get();

// Mengubah data menjadi format yang cocok untuk chart
$chartData = [
    'labels' => $data->pluck('statuspendataan.status_pendataan')->map(function ($label) {
        return $label ?? '-'; // Tampilkan '-' jika null
    })->toArray(),
    'data' => $data->pluck('count')->toArray()
];
// Hitung total responden berdasarkan keempat status
$totalRespondenPerStatus = $data->sum('count');

            return view('admin.pages.monitoring.shp', compact('chartData','totalResponden', 'totalRespondenPerStatus','breadcrumbs'));
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


    /**
     * =============================================
     *  show sample page for susenas
     * =============================================
     */
    public function susenas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Susenas' => null]);

        return view('admin.pages.monitoring.susenas', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for seruti
     * =============================================
     */
    public function seruti(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Seruti' => null]);

        return view('admin.pages.monitoring.seruti', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for sakernas
     * =============================================
     */
    public function sakernas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Sakernas' => null]);

        return view('admin.pages.monitoring.sakernas', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for tracking
     * =============================================
     */
    public function tracking(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tracking' => null]);
        $query = Trackingmaps::query()
    ->when($request->filled('survei'), function ($q) use ($request) {
        $q->where('Nama_Survei', 'LIKE', '%' . $request->input('survei') . '%');
    })
    ->when($request->filled('surveyor'), function ($q) use ($request) {
        $q->where('Username_Surveyor', 'LIKE', '%' . $request->input('surveyor') . '%');
    })
    ->selectRaw("*, SUBSTRING_INDEX(Coordinates, ',', 1) AS latitude, SUBSTRING_INDEX(Coordinates, ',', -1) AS longitude");

    
// Retrieve the results
$locations = $query->get();
        return view('admin.pages.monitoring.tracking', compact('breadcrumbs'),['locations' => $locations]);

    }

}
