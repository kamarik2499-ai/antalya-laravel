<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ReservationAdminController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::query()
            ->latest('date')
            ->latest('time')
            ->paginate(20);

        return view('admin.reservations', compact('reservations'));
    }

    public function updateStatus(Request $request, Reservation $reservation): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['new', 'confirmed', 'completed', 'cancelled'])],
        ]);

        $reservation->update([
            'status' => $data['status'],
        ]);

        return back()->with('ok', "Статус брони #{$reservation->id} обновлён.");
    }
}
