<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pengawasan1Controller extends Controller
{

    /**
     * =============================================
     *      view dashboard pages
     * =============================================
     */
    public function index(Request $request){

        return view('admin.pages.pengawasan1.index', [
            'user' => $request->user(),
        ]);
    }
}