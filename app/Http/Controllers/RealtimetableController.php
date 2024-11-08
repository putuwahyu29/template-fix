<?php

namespace App\Http\Controllers;

use App\Models\Pengawasan1;
use App\Models\tbaru;
use Illuminate\Http\Request;
use App\Models\Tracking; 
use App\Models\sample2024; 
use App\Models\Pengawasan; 
use App\Models\Petugas; 
use App\Models\mastershp; 

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
            $search = $request->input('search');
            $query->where('nama_perusahaan', 'LIKE', '%' . $search . '%')
                  ->orWhere('alamat_perusahaan', 'LIKE', '%' . $search . '%')
                  ->orWhere('kode_kabkot', 'LIKE', '%' . $search . '%')
                  ->orWhere('kode_kecamatan', 'LIKE', '%' . $search . '%')
                  ->orWhere('kode_keldes', 'LIKE', '%' . $search . '%')
                  ->orWhere('no_telepon', 'LIKE', '%' . $search . '%')
                  ->orWhere('kategori_usaha', 'LIKE', '%' . $search . '%')
                  ->orWhere('kode_kbli', 'LIKE', '%' . $search . '%')
                  ->orWhere('komoditas_utama', 'LIKE', '%' . $search . '%')
                  ->orWhere('status', 'LIKE', '%' . $search . '%')
                  ->orWhere('catatan', 'LIKE', '%' . $search . '%');
            // Tambahkan `orWhere` untuk kolom lainnya yang ingin dicari
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
        return view('admin.pages.realtimetable.mastershpb', compact('breadcrumbs'));
    }

    /**
     * =============================================
     *      show sample page for isian
     * =============================================
     */
    public function petugas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Daftar Petugas' => null]);
       
        $query = Petugas::query();
        if ($request->filled('petugas')) {
            $query->where('Nama_Petugas', 'LIKE', '%' . $request->input('petugas') . '%');
        }
    
        if ($request->filled('pengawas')) {
            $query->where('Pengawas', 'LIKE', '%' . $request->input('pengawas') . '%');
        }
        $petugas = $query->paginate(perPage: 10); 
        return view('admin.pages.realtimetable.petugas', compact('petugas','breadcrumbs'));
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
        $trackings = $query->paginate(10); 
        return view('admin.pages.realtimetable.trackings', compact('trackings','breadcrumbs'));
    }


}
