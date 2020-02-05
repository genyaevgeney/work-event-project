<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    /**
     * Show SPA client
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
