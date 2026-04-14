<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MenuAdminController extends Controller
{
    public function index(): View
    {
        $menuItems = MenuItem::query()
            ->with('category')
            ->orderBy('category_id')
            ->orderBy('title')
            ->paginate(30);

        return view('admin.menu', compact('menuItems'));
    }

    public function toggle(MenuItem $menuItem): RedirectResponse
    {
        $menuItem->update([
            'is_available' => !$menuItem->is_available,
        ]);

        return back()->with('ok', "Доступность «{$menuItem->title}» изменена.");
    }
}
