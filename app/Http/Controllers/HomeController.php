<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Muestra un listado de autopistas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('autopistas.index');

    }
}
