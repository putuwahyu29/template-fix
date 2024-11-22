<?php

namespace App\Http\Controllers;

use App\Models\datakabkot;
use Illuminate\Http\Request;
use App\Models\Trackingmaps; 
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
class MenutambahanController extends Controller
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
            'Menu Tambahan' => route('admin.user.index'),
        ];
    }

    /**
     * =============================================
     *  show sample page for seruti
     * =============================================
     */
    public function plot(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Plot Petugas' => null]);

        return view('admin.pages.tambahan.plot', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for sakernas
     * =============================================
     */
    public function ringkasan(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Ringkasan' => null]);

        return view('admin.pages.tambahan.ringkasan', compact('breadcrumbs'));

    }

}
