<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function novedades()
    {
        return view('cliente.novedades');
    }

    public function productos()
    {
        return view('cliente.productos');
    }

    public function comoLlegar()
    {
        return view('cliente.como-llegar');
    }
}
