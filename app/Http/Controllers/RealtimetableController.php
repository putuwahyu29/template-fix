<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
     *      show sample page for isian
     * =============================================
     */
    public function isian(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Isian' => null]);

        return view('admin.pages.realtimetable.isian', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for pengawasans
     * =============================================
     */
    public function pengawasans(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan' => null]);

        return view('admin.pages.realtimetable.pengawasans', compact('breadcrumbs'));

    }

    /**
     * =============================================
     * show sample page for pengawasan1
     * =============================================
     */
    public function pengawasan1(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan 1' => null]);

        return view('admin.pages.realtimetable.pengawasan1', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for sampel2024
     * =============================================
     */
    public function sampel2024(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Sampel 2024' => null]);

        return view('admin.pages.realtimetable.sampel2024', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for tbaru
     * =============================================
     */
    public function tbaru(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tbaru' => null]);

        return view('admin.pages.realtimetable.tbaru', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for trackings
     * =============================================
     */
    public function trackings(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tracking' => null]);

        return view('admin.pages.realtimetable.trackings', compact('breadcrumbs'));

    }


}
