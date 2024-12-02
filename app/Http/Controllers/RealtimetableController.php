<?php

namespace App\Http\Controllers;

use App\Models\Pengawasan1;
use App\Models\tbaru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tracking; 
use App\Models\plotingpetugas;
use App\Models\masterkegiatan;
use App\Models\sample2024; 
use App\Models\Pengawasan; 
use App\Models\monitoring;
use App\Models\daftarpetugas;
use App\Models\loginpetugas; 
use App\Models\mastershp;
use App\Models\mastershpb;
use App\Helpers\AlertHelper;
use App\Models\datakabkot;

/**
     * ################################################
     *      THIS IS SAMPLE CONTROLLER
     *  mostly used to display UI implementation.
     *  the main UI for SamBoilerplate is from the Sneat Theme,
     *  check or license about them (to remove credit in footer) in their website
     * ################################################
     */
class RealtimetableController extends Controller
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
            'Realtime Table' => route('admin.user.index'),
        ];
    }

    /**
     * =============================================
     *      show sample page for master_shp
     * =============================================
     */
    public function mastershp(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Master SHP' => null]);

        $kode_kabkot = $request->input('kode_kabkot', null);
        $query = mastershp::query();
        if ($request->filled('search')) {
            $search = '%' . $request->input('search') . '%';
            $columns = [
                'nama_perusahaan', 'alamat_perusahaan', 'kode_kabkot', 'kode_kecamatan',
                'kode_keldes', 'no_telepon', 'kode_usaha', 'kode_kbli',
                'komoditas_utama', 'kode_status', 'catatan'
            ];
        
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', $search);
                }
            });
        }

        // Filter berdasarkan kode_kabkot
        if ($kode_kabkot) {
            $query->where('kode_kabkot', $kode_kabkot);
        }
        // Ambil data kabkot dari request
        $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();

        $datakabkot = datakabkot::all();
        $mastershp = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.mastershp', compact('mastershp','breadcrumbs','kode_kabkot','req_kabkot','datakabkot'));
    }

    /**
     * =============================================
     *      show sample page for master_shpb
     * =============================================
     */
    public function mastershpb(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Master SHPB' => null]);

        $kode_kabkot = $request->input('kode_kabkot', null);
        $query = mastershpb::query();
        if ($request->filled('search')) {
            $search = '%' . $request->input('search') . '%';
            $columns = [
                'nama_perusahaan', 'alamat_perusahaan', 'kode_kabkot', 'kode_kecamatan',
                'kode_keldes', 'no_telepon', 'kode_kategori', 'kode_status', 'catatan'
            ];
        
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', $search);
                }
            });
        }

        // Filter berdasarkan kode_kabkot
        if ($kode_kabkot) {
            $query->where('kode_kabkot', $kode_kabkot);
        }
        // Ambil data kabkot dari request
        $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();

        $datakabkot = datakabkot::all();
        $mastershpb = $query->paginate(perPage: 10); 

        return view('admin.pages.realtimetable.mastershpb', compact('mastershpb', 'breadcrumbs','kode_kabkot','req_kabkot','datakabkot'));
    }

    /**
     * =============================================
     *      show sample page for daftarpetugas
     * =============================================
     */
    public function daftarpetugas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Daftar Petugas' => null]);

        $kode_kabkot = $request->input('kode_kabkot', null);
        $query = daftarpetugas::query();
        if ($request->filled('search')) {
            $search = '%' . $request->input('search') . '%';
            $columns = [
                'Nama_Petugas', 'kode_kabkot', 'kode_petugas', 'Username', 'Password',
                'Pengawas', 'email_petugas', 'alamat_petugas', 'no_petugas'
            ];
        
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', $search);
                }
            });
        }

        // Filter berdasarkan kode_kabkot
        if ($kode_kabkot) {
            $query->where('kode_kabkot', $kode_kabkot);
        }
        // Ambil data kabkot dari request
        $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();

        $datakabkot = datakabkot::all();
        $daftarpetugas = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.daftarpetugas.index', compact('daftarpetugas','breadcrumbs','kode_kabkot','req_kabkot','datakabkot'));
    }

    
    public function addPetugas(Request $request)
    {
        $breadcrumbs = [
            'Realtime Table' => route('admin.user.index'),
            'Daftar Petugas' => route('daftarpetugas'),
            'Tambah Petugas' => null,
        ];

        // Ambil data kabkot dari request
    $kode_kabkot = $request->input('kode_kabkot', null);
    $req_kabkot = datakabkot::where('kode_kabkot', $kode_kabkot)->first();
    $datakabkot = datakabkot::all();

        return view('admin.pages.realtimetable.daftarpetugas.add', compact('breadcrumbs','datakabkot','req_kabkot','kode_kabkot'));
    }
    
    public function storePetugas(Request $request)
{
    $validatedData = $request->validate([
        'Nama_Petugas' => 'required|string|max:255',
        'kode_kabkot' => 'required|string|max:20',
        'kode_petugas' => 'required|string|max:20|unique:daftarpetugas',
        'Username' => 'required|string|max:100|unique:daftarpetugas',
        'Password' => 'required|string|min:6',
        'Pengawas' => 'required|string|max:100',
        'email_petugas' => 'required|email|max:255|unique:daftarpetugas',
        'alamat_petugas' => 'nullable|string|max:255',
        'no_petugas' => 'required|string|max:15'
    ]);

    $validatedData['Password'] = bcrypt($validatedData['Password']); // Encrypt the password

    $petugas = daftarpetugas::create($validatedData);

    $alert = $petugas
        ? AlertHelper::createAlert('success', 'Petugas berhasil ditambahkan.')
        : AlertHelper::createAlert('danger', 'Gagal menambahkan petugas.');

    return redirect()->route('daftarpetugas')->with('alerts', [$alert]);
}

    
    public function editPetugas($id)
    {
        $breadcrumbs = [
            'Realtime Table' => route('admin.user.index'),
            'Daftar Petugas' => route('daftarpetugas'),
            'Edit Petugas' => null,
        ];
    
        $petugas = daftarpetugas::findOrFail($id);
    
        return view('admin.pages.realtimetable.daftarpetugas.edit', compact('petugas', 'breadcrumbs'));
    }
    
    public function updatePetugas(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'Nama_Petugas' => 'required|string|max:255',
        'kode_kabkot' => 'required|int',
        'kode_petugas' => 'required|string|max:11|unique:profil_petugas,kode_petugas,' . $request->input('id'),
        'username' => 'required|string|max:255|unique:login_petugas,username,' . $request->input('id'),
        'password' => 'nullable|string|min:6',
        'Pengawas' => 'required|string|max:255',
        'email_petugas' => 'required|email|max:255|unique:profil_petugas,email_petugas,' . $request->input('id'),
        'alamat_petugas' => 'nullable|string|max:255',
        'no_petugas' => 'required|string|max:255'
    ]);

    // Cari data di tabel profil_petugas
    $petugas = daftarpetugas::with('loginpetugas')->findOrFail($request->input('id'));

    // Update tabel profil_petugas
    $petugasUpdated = $petugas->update([
        'Nama_Petugas' => $validatedData['Nama_Petugas'],
        'kode_kabkot' => $validatedData['kode_kabkot'],
        'kode_petugas' => $validatedData['kode_petugas'],
        'Pengawas' => $validatedData['Pengawas'],
        'email_petugas' => $validatedData['email_petugas'],
        'alamat_petugas' => $validatedData['alamat_petugas'],
        'no_petugas' => $validatedData['no_petugas'],
    ]);

    // Update atau buat data di tabel login_petugas
    if ($petugas->loginpetugas) {
        $update = $petugas->loginpetugas->update([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $petugas->loginpetugas->password,
        ]);
        \Log::info('LoginPetugas updated: ', ['result' => $update]);
    } else {
        $create = $petugas->loginpetugas()->create([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : bcrypt('default_password'),
            'email_petugas' => $validatedData['email_petugas'],
        ]);
        \Log::info('LoginPetugas created: ', ['result' => $create]);
    }
    
    

    // Berikan feedback ke user
    $alert = $petugasUpdated
        ? AlertHelper::createAlert('success', 'Data petugas berhasil diperbarui.')
        : AlertHelper::createAlert('danger', 'Gagal memperbarui data petugas.');

        return redirect()->route('daftarpetugas')->with('alerts', [$alert]);;
}

    
    public function deletePetugas(Request $request)
    {
        $petugas = daftarpetugas::findOrFail($request->input('id'));
        $deleted = $petugas->delete();
    
        $alert = $deleted
            ? AlertHelper::createAlert('success', 'Petugas berhasil dihapus.')
            : AlertHelper::createAlert('danger', 'Gagal menghapus petugas.');
    
        return redirect()->route('admin.pages.daftarpetugas.index', ['action' => 'index'])->with('alerts', [$alert]);
    }
    


    /**
     * =============================================
     *  show sample page for pengawasans
     * =============================================
     */
    public function pengawasans(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan' => null]);
        
        $query = Pengawasan::query();

        if ($request->filled('nama_pengawas')) {
            $query->where('nama_pengawas', 'LIKE', '%' . $request->input('nama_pengawas') . '%');
        }
    
        if ($request->filled('petugas')) {
            $query->where('Petugas', 'LIKE', '%' . $request->input('petugas') . '%');
        }
        $pengawasan = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.pengawasans', compact('pengawasan','breadcrumbs'));
    }

    /**
     * =============================================
     * show sample page for pengawasan1
     * =============================================
     */
    public function pengawasan1(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan 1' => null]);
        $query = Pengawasan1::query();

        if ($request->filled('nama')) {
            $query->where('nama', 'LIKE', '%' . $request->input('nama') . '%');
        }
    
        if ($request->filled('peserta')) {
            $query->where('peserta', 'LIKE', '%' . $request->input('peserta') . '%');
        }
        $pengawasan1 = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.pengawasan1', compact('pengawasan1','breadcrumbs'));
    }

    /**
     * =============================================
     *  show sample page for sampel2024
     * =============================================
     */
    public function sampel2024(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Sampel 2024' => null]);
        $query = sample2024::query();

        if ($request->filled('nama_petugas')) {
            $query->where('nama_petugas', 'LIKE', '%' . $request->input('nama_petugas') . '%');
        }
    
        if ($request->filled('survei')) {
            $query->where('nama_survei', 'LIKE', '%' . $request->input('survei') . '%');
        }
        $sampel2024 = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.sampel2024', compact('sampel2024','breadcrumbs'));
    }

    /**
     * =============================================
     *  show sample page for tbaru
     * =============================================
     */
    public function tbaru(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tbaru' => null]);
        $query = tbaru::query();

        if ($request->filled('survei')) {
            $query->where('nama_survei', 'LIKE', '%' . $request->input('survei') . '%');
        }
    
        if ($request->filled('surveyor')) {
            $query->where('namapetugas', 'LIKE', '%' . $request->input('surveyor') . '%');
        }
        $tbaru = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.tbaru', compact('tbaru','breadcrumbs'));
    }

    /**
     * =============================================
     *      show sample page for trackings
     * =============================================
     */
    public function trackings(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tracking' => null]);
        $query = Tracking::query();

        if ($request->filled('survei')) {
            $query->where('Nama_Survei', 'LIKE', '%' . $request->input('survei') . '%');
        }
    
        if ($request->filled('surveyor')) {
            $query->where('Username_Surveyor', 'LIKE', '%' . $request->input('surveyor') . '%');
        }

        if ($request->filled('date_range')) {
            $dateRange = explode(' to ', $request->input('date_range')); // Misal: '2024-11-18 to 2024-11-21'
            if (count($dateRange) === 2) {
                $startDate = $dateRange[0];
                $endDate = $dateRange[1];
                $query->whereBetween('Waktu_Unique', [$startDate, $endDate]);
            }
        }

        $trackings = $query->paginate(10); 
        return view('admin.pages.realtimetable.trackings', compact('trackings','breadcrumbs'));
    }

//     public function detailpetugas($id)
// {
//     // Ambil data petugas berdasarkan ID
//     $petugas = daftarpetugas::with(['datakabkot', 'loginpetugas'])->find($id);

//     // Query data kegiatan
//     $masterkegiatan = MasterKegiatan::all();

//     // Jika data tidak ditemukan, tampilkan error 404
//     if (!$petugas) {
//         abort(404, 'Data petugas tidak ditemukan.');
//     }

//     // Breadcrumbs untuk halaman
//     $breadcrumbs = array_merge($this->mainBreadcrumbs, [
//         'Daftar Petugas' => route('daftarpetugas'),
//         'Detail Petugas' => null,
//     ]);

//     // Tampilkan halaman detail
//     return view('admin.pages.realtimetable.daftarpetugas.detail', compact('breadcrumbs', 'petugas'));
// }

public function detailpetugas($id)
{
    // Ambil data petugas berdasarkan ID dengan relasi terkait
    $petugas = daftarpetugas::with(['datakabkot', 'loginpetugas'])->find($id);

    // Jika data tidak ditemukan, tampilkan error 404
    if (!$petugas) {
        abort(404, 'Data petugas tidak ditemukan.');
    }

    // Ambil semua kegiatan yang diikuti petugas terkait
    $kegiatan = PlotingPetugas::query()
        ->join('master_kegiatan', 'ploting_petugas.kode_kegiatan', '=', 'master_kegiatan.kode_kegiatan')
        ->join('profil_petugas', 'ploting_petugas.kode_petugas', '=', 'profil_petugas.kode_petugas')
        ->where('ploting_petugas.kode_petugas', $petugas->kode_petugas)
        ->distinct() // Hindari duplikasi data
        ->select('ploting_petugas.*', 'master_kegiatan.kegiatan_name', 'profil_petugas.Pengawas')
        ->groupBy('ploting_petugas.kode_kegiatan')
        ->get();

    

    // Ambil data responden yang terkait dengan SHP (kode_kegiatan 1001)
$respondenSHP = monitoring::query()
->join('master_responden', 'monitoring.kode_responden', '=', 'master_responden.kode_responden')
->leftJoin('responden_shp', function ($join) {
    $join->on('master_responden.source_table', '=', DB::raw("'responden_shp'"))
        ->on('master_responden.kode_responden', '=', 'responden_shp.kode_responden');
})
->join('status_pendataan', 'monitoring.kode_status', '=', 'status_pendataan.kode_status')
->select(
    'monitoring.*',
    'responden_shp.nama_perusahaan',
    'status_pendataan.status_pendataan AS status',
    DB::raw("DATE_FORMAT(monitoring.jam_selesai, '%d %M %Y') AS tanggal_mencacah"),
    DB::raw("
        CONCAT(
            IF(HOUR(monitoring.total_waktu) > 0, CONCAT(HOUR(monitoring.total_waktu), ' Jam '), ''),
            IF(MINUTE(monitoring.total_waktu) > 0, CONCAT(MINUTE(monitoring.total_waktu), ' Menit '), ''),
            IF(SECOND(monitoring.total_waktu) > 0, CONCAT(SECOND(monitoring.total_waktu), ' Detik'), '')
        ) AS waktu_mencacah
    ")
)
->where('monitoring.kode_petugas', $petugas->kode_petugas)
->where('monitoring.kode_kegiatan', 1001) // Filter hanya untuk SHP
->orderByRaw("FIELD(status_pendataan.status_pendataan, '1', '2') DESC") // Prioritaskan status 1 dan 2
->groupBy('responden_shp.nama_perusahaan') // Menghapus duplikat nama perusahaan
->get();

// Ambil data responden yang terkait dengan SHPB (kode_kegiatan 1002)
$respondenSHPB = monitoring::query()
->join('master_responden', 'monitoring.kode_responden', '=', 'master_responden.kode_responden')
->leftJoin('responden_shpb', function ($join) {
    $join->on('master_responden.source_table', '=', DB::raw("'responden_shpb'"))
        ->on('master_responden.kode_responden', '=', 'responden_shpb.kode_responden');
})
->join('status_pendataan', 'monitoring.kode_status', '=', 'status_pendataan.kode_status')
->select(
    'monitoring.*',
    'responden_shpb.nama_perusahaan',
    'status_pendataan.status_pendataan AS status',
    DB::raw("DATE_FORMAT(monitoring.jam_selesai, '%d %M %Y') AS tanggal_mencacah"),
    DB::raw("
        CONCAT(
            IF(HOUR(monitoring.total_waktu) > 0, CONCAT(HOUR(monitoring.total_waktu), ' Jam '), ''),
            IF(MINUTE(monitoring.total_waktu) > 0, CONCAT(MINUTE(monitoring.total_waktu), ' Menit '), ''),
            IF(SECOND(monitoring.total_waktu) > 0, CONCAT(SECOND(monitoring.total_waktu), ' Detik'), '')
        ) AS waktu_mencacah
    ")
)
->where('monitoring.kode_petugas', $petugas->kode_petugas)
->where('monitoring.kode_kegiatan', 1002) // Filter hanya untuk SHPB
->orderByRaw("FIELD(status_pendataan.status_pendataan, '1', '2') DESC") // Prioritaskan status 1 dan 2
->groupBy('responden_shpb.nama_perusahaan') // Menghapus duplikat nama perusahaan
->get();

        
    // Fetch responden per survei


    // Fetch data PML (Pengawas) berdasarkan petugas
    $pml = daftarpetugas::where('id', $id)->pluck('Pengawas')->first();  // Ambil Pengawas pertama
    // $kegiatan = $query1->paginate(10);

    // Breadcrumbs untuk halaman
    $breadcrumbs = array_merge($this->mainBreadcrumbs, [
        'Daftar Petugas' => route('daftarpetugas'),
        'Detail Petugas' => null,
    ]);

    // Tampilkan halaman detail dengan data yang dibutuhkan
    return view('admin.pages.realtimetable.daftarpetugas.detail', compact('breadcrumbs', 'petugas', 'pml', 'kegiatan', 'respondenSHP', 'respondenSHPB'));
}




    public function condelPetugas($id)
{
    $breadcrumbs = [
        'Realtime Table' => route('admin.user.index'),
        'Daftar Petugas' => route('daftarpetugas'),
        'Hapus Petugas' => null,
    ];

    $petugas = daftarpetugas::findOrFail($id);

    return view('admin.pages.realtimetable.daftarpetugas.delete', compact('breadcrumbs','petugas'));
}

}
