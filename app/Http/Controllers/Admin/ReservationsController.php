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
}
