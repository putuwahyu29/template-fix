<?php

namespace App\Http\Controllers;

use App\Models\Pengawasan1;
use App\Models\tbaru;
use Illuminate\Http\Request;
use App\Models\Tracking; 
use App\Models\sample2024; 
use App\Models\Pengawasan; 
use App\Models\daftarpetugas; 
use App\Models\mastershp;
use App\Models\mastershpb;
use App\Helpers\AlertHelper;

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

        $query = mastershp::query();
        if ($request->filled('search')) {
            $search = '%' . $request->input('search') . '%';
            $columns = [
                'nama_perusahaan', 'alamat_perusahaan', 'kode_kabkot', 'kdkec',
                'kode_keldes', 'no_telepon', 'kategori_usaha', 'kode_kbli',
                'komoditas_utama', 'kode_status', 'catatan'
            ];
        
            $query->where(function ($q) use ($columns, $search) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', $search);
                }
            });
        }
        $mastershp = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.mastershp', compact('mastershp','breadcrumbs'));
    }

    /**
     * =============================================
     *      show sample page for master_shpb
     * =============================================
     */
    public function mastershpb(Request $request)
    {
        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Master SHPB' => null]);

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
        $mastershpb = $query->paginate(perPage: 10); 

        return view('admin.pages.realtimetable.mastershpb', compact('mastershpb', 'breadcrumbs'));
    }

    /**
     * =============================================
     *      show sample page for daftarpetugas
     * =============================================
     */
    public function daftarpetugas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Daftar Petugas' => null]);

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
        $daftarpetugas = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.daftarpetugas.index', compact('daftarpetugas','breadcrumbs'));
    }

//     public function daftarpetugas(Request $request, $id = null)
// {
//     $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Daftar Petugas' => null]);
//     $action = $request->input('action', 'index'); // Default action adalah 'index'

//     switch ($action) {
//         case 'index': // List data petugas
//             $query = daftarpetugas::query();

//             if ($request->filled('search')) {
//                 $search = '%' . $request->input('search') . '%';
//                 $columns = [
//                     'Nama_Petugas', 'kode_kabkot', 'kode_petugas', 'Username', 'Password',
//                     'Pengawas', 'email_petugas', 'alamat_petugas', 'no_petugas'
//                 ];

//                 $query->where(function ($q) use ($columns, $search) {
//                     foreach ($columns as $column) {
//                         $q->orWhere($column, 'LIKE', $search);
//                     }
//                 });
//             }

//             $daftarpetugas = $query->paginate(perPage: 10);

//             return view('admin.pages.realtimetable.daftarpetugas.index', compact('daftarpetugas', 'breadcrumbs'));

//         case 'create': // Tampilkan form tambah petugas
//             $breadcrumbs['Tambah Petugas'] = null;

//             return view('admin.pages.realtimetable.addpetugas', compact('breadcrumbs'));

//         case 'store': // Proses simpan data petugas baru
//             $validatedData = $request->validate([
//                 'Nama_Petugas' => 'required|string|max:255',
//                 'kode_kabkot' => 'required|string|max:20',
//                 'kode_petugas' => 'required|string|max:20|unique:daftarpetugas',
//                 'Username' => 'required|string|max:100|unique:daftarpetugas',
//                 'Password' => 'required|string|min:6',
//                 'Pengawas' => 'required|string|max:100',
//                 'email_petugas' => 'required|email|max:255|unique:daftarpetugas',
//                 'alamat_petugas' => 'nullable|string|max:255',
//                 'no_petugas' => 'required|string|max:15'
//             ]);

//             $petugas = daftarpetugas::create($validatedData);

//             $alert = $petugas
//                 ? AlertHelper::createAlert('success', 'Petugas berhasil ditambahkan.')
//                 : AlertHelper::createAlert('danger', 'Gagal menambahkan petugas.');

//             return redirect()->route('admin.daftarpetugas', ['action' => 'index'])->with('alerts', [$alert]);

//         case 'edit': // Tampilkan form edit data petugas
//             $breadcrumbs['Edit Petugas'] = null;

//             $petugas = daftarpetugas::findOrFail($request->input('id'));

//             return view('admin.pages.realtimetable.editpetugas', compact('petugas', 'breadcrumbs'));

//         case 'update': // Proses update data petugas
//             $validatedData = $request->validate([
//                 'Nama_Petugas' => 'required|string|max:255',
//                 'kode_kabkot' => 'required|string|max:20',
//                 'kode_petugas' => 'required|string|max:20|unique:daftarpetugas,kode_petugas,' . $request->input('id'),
//                 'Username' => 'required|string|max:100|unique:daftarpetugas,Username,' . $request->input('id'),
//                 'Password' => 'nullable|string|min:6',
//                 'Pengawas' => 'required|string|max:100',
//                 'email_petugas' => 'required|email|max:255|unique:daftarpetugas,email_petugas,' . $request->input('id'),
//                 'alamat_petugas' => 'nullable|string|max:255',
//                 'no_petugas' => 'required|string|max:15'
//             ]);

//             $petugas = daftarpetugas::findOrFail($request->input('id'));
//             $updated = $petugas->update($validatedData);

//             $alert = $updated
//                 ? AlertHelper::createAlert('success', 'Data petugas berhasil diperbarui.')
//                 : AlertHelper::createAlert('danger', 'Gagal memperbarui data petugas.');

//             return redirect()->route('admin.daftarpetugas', ['action' => 'index'])->with('alerts', [$alert]);

//         case 'delete': // Proses hapus data petugas
//             $petugas = daftarpetugas::findOrFail($request->input('id'));
//             $deleted = $petugas->delete();

//             $alert = $deleted
//                 ? AlertHelper::createAlert('success', 'Petugas berhasil dihapus.')
//                 : AlertHelper::createAlert('danger', 'Gagal menghapus petugas.');

//             return redirect()->route('admin.daftarpetugas', ['action' => 'index'])->with('alerts', [$alert]);

//         default:
//             return response()->json(['message' => 'Aksi tidak valid!'], 400);
//     }
// }


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

    public function detailpetugas($id)
{
    // Ambil data petugas berdasarkan ID
    $petugas = daftarpetugas::with(['datakabkot', 'loginpetugas'])->find($id);

    // Jika data tidak ditemukan, tampilkan error 404
    if (!$petugas) {
        abort(404, 'Data petugas tidak ditemukan.');
    }

    // Breadcrumbs untuk halaman
    $breadcrumbs = array_merge($this->mainBreadcrumbs, [
        'Daftar Petugas' => route('daftarpetugas'),
        'Detail Petugas' => null,
    ]);

    // Tampilkan halaman detail
    return view('admin.pages.realtimetable.daftarpetugas.detail', compact('breadcrumbs', 'petugas'));
}



}
