<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengawasanController extends Controller
{

    /**
     * =============================================
     *      view dashboard pages
     * =============================================
     */
    public function index(Request $request){

        return view('admin.pages.pengawasan.index');
    }
}