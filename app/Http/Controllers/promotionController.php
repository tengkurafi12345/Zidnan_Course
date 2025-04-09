<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use Illuminate\Http\Request;

class promotionController extends Controller
{
    public function index()
    {
        return promotion::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'img_poster' => ['required'],
            'term_and_conditions' => ['required'],
            'discount' => ['nullable', 'integer'],
        ]);

        return promotion::create($data);
    }

    public function show(promotion $promotion)
    {
        return $promotion;
    }

    public function update(Request $request, promotion $promotion)
    {
        $data = $request->validate([
            'name' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'img_poster' => ['required'],
            'term_and_conditions' => ['required'],
            'discount' => ['nullable', 'integer'],
        ]);

        $promotion->update($data);

        return $promotion;
    }

    public function destroy(promotion $promotion)
    {
        $promotion->delete();

        return response()->json();
    }
}
