<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'adults' => 'required|integer',
            'children' => 'required|integer',
        ]);

        Reservation::create($request->all());

        return redirect('/reservation')->with('success', 'Reservation successful!');
    }
}
