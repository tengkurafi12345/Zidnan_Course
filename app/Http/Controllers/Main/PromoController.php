<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromoController extends Controller
{
    /**
     * @return View
     */
    public function index(Request $request): View
    {
        $month = $request->query('month');

        $promotions = Promotion::query()
            ->when($month, function ($query) use ($month) {
                return $query->whereMonth('end_date', $month);
            })
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

        return view('Frontend.promo', compact(['promotions', 'leftHeaders', 'rightHeaders', 'month']));
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
