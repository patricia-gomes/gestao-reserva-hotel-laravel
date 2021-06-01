<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reservation;
use App\Guest;

class EntryExitTodayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {	
    	//Data atual
    	$today = Carbon::today();

    	//Busca dados de três tabelas: reservations, accommodations e types
        $list = Reservation::join('accommodations', 'accommodations.id', '=', 'reservations.id_reservation')
        	   ->join('types', 'types.id', '=', 'accommodations.id_type')
        	   ->where('reservations.start', $today)
               ->select('reservations.*', 'accommodations.number', 'types.type')
               ->get();

    	return view('admin.entry_today', [
    		'list' => $list
    	]);
    }

    public function exit()
    {	
    	$today = Carbon::today();

    	//Busca dados de três tabelas: accommodations, guests e types
        $list = Guest::join('accommodations', 'accommodations.id', '=', 'guests.id_reservation')
        	   ->join('types', 'types.id', '=', 'accommodations.id_type')
        	   ->where('guests.end', $today)
               ->select('guests.*', 'accommodations.number', 'types.type')
               ->get();

    	return view('admin.exit_today', [
    		'list' => $list
    	]);
    }
}
