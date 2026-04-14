<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class OrderAdminController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()
            ->with(['items.menuItem'])
            ->latest('id')
            ->paginate(20);

        return view('admin.orders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['new', 'accepted', 'completed', 'cancelled'])],
        ]);

        $order->update([
            'status' => $data['status'],
        ]);

        return back()->with('ok', "Статус заказа #{$order->id} обновлён.");
    }
}
