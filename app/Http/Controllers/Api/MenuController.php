<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $categories = MenuCategory::query()
            ->where('is_active', true)
            ->with(['items' => function ($q) {
                $q->where('is_available', true)
                    ->orderBy('title');
            }])
            ->orderBy('title')
            ->get(['id', 'title', 'is_active']);

        return response()->json([
            'categories' => $categories,
        ]);
    }
}

