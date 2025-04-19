<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\View\View;

class PromoController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $promotions = Promotion::query()
            ->orderByDesc('created_at')
            ->paginate(9);

        $leftHeaders = Promotion::where('is_header', true)
            ->where('header_position', 'left')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        $rightHeaders = Promotion::where('is_header', true)
            ->where('header_position', 'right')
            ->orderByDesc('created_at')
            ->limit(2)
            ->get();

        return view('Frontend.promo', compact(['promotions', 'leftHeaders', 'rightHeaders']));
    }

    /**
     * @param Promotion $promotion
     * @return View
     */
    public function show(Promotion $promotion): View
    {
        return view('Frontend.promo-detail', compact(['promotion']));
    }
}
