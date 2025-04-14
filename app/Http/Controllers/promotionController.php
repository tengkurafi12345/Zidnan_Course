<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\promotion;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class promotionController extends Controller
{
    public function index()
    {
        $promotions = promotion::query()->orderByDesc('created_at')->paginate(10);

        return view('Backend.Admin.Promotion.index', compact('promotions'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('Backend.Admin.Promotion.create');
    }

    /**
     * @param StorePromotionRequest $request
     * @return RedirectResponse
     */
    public function store(StorePromotionRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['img_poster'] = "asdasdsa";

        // Menyimpan term and condition
        $termConditions = [];
        foreach ($request->term_and_conditions as $_termCondition) {
            if (!empty($_termCondition)) {
                $termConditions[] = $_termCondition;
            }
        }

        // Simpan sebagai JSON
        if (!empty($termConditions)) {
            $validatedData['term_and_conditions'] = $termConditions;
        }

        Promotion::create($validatedData);

        return redirect()
            ->route('promotion.index') // Arahkan ke halaman index
            ->with('success', 'Promo berhasil dibuat.');
    }

    /**
     * @param Promotion $promotion
     * @return View
     */
    public function edit(Promotion $promotion): View
    {
        return view('Backend.Admin.Promotion.edit', compact(['promotion']));
    }

    /**
     * @param UpdatePromotionRequest $request
     * @param Promotion $promotion
     * @return RedirectResponse
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            // Menyimpan term and condition
            $termConditions = [];
            foreach ($request->term_and_conditions as $_termCondition) {
                if (!empty($_termCondition)) {
                    $termConditions[] = $_termCondition;
                }
            }

            // Simpan sebagai JSON
            if (!empty($termConditions)) {
                $validatedData['term_and_conditions'] = $termConditions;
            }

            // Update data utama Promosi
            $promotion->update($validatedData);

            return redirect()->route('promotion.index')
                ->with('success', 'Data Promo berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('promotion.edit', $promotion->id)
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * @param Promotion $promotion
     * @return RedirectResponse
     */
    public function destroy(Promotion $promotion): RedirectResponse
    {
        try {
            // Hapus promo
            $promotion->delete();

            return redirect()->route('promotion.index')
                ->with('success', 'Data Promosi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('promotion.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
