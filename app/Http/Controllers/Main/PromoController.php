<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PromoController extends Controller
{
    /**
     * @TODO : Belum dibuatkan table, migration, dan model
     * @return View
     */
    public function index()
    {
        return view('Frontend.promo');
    }
}
