<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;

class ReservationsController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$list = Reservation::join('accommodations', 'accommodations.id', '=', 'reservations.id_reservation')
               ->select('reservations.*', 'accommodations.number')
               ->get();              

    	return view('admin.reservations', [
    		'reservations' => $list
    	]);
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        return view('admin.edit_reservations', [
            'reservation' => $reservation
        ]);
    }

    public function register_edit(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required|string',
            'cell' => 'required|integer'
        ]);

        //Edita nome e celular apenas
        $update = Reservation::where('id', $id)
                            ->update(['name'=> $request->input('name'), 'cell'=> $request->input('cell')]);

        return redirect()->route('reservations');
    }
}
