<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reservation;
use App\Guest;
use App\Accommodation;

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
        $list = Reservation::join('accommodations', 'accommodations.id', '=', 'reservations.reservation_number')
        	   ->join('types', 'types.id', '=', 'accommodations.id_type')
        	   ->where('reservations.start', $today)
               ->select('reservations.*', 'accommodations.number', 'types.type')
               ->get();

    	return view('admin.entry_today', [
    		'list' => $list
    	]);
    }

    public function exit()
    {	date_default_timezone_set('America/Porto_Velho');
    	$today = Carbon::today();// 2021-08-23 00:00:00
        $hours = Carbon::now();// 2021-08-23 hora atual

    	//Busca os dados dos hospedes que sai hoje
        $list = Guest::join('accommodations', 'accommodations.id', '=', 'guests.id_reservation')
        	   ->join('types', 'types.id', '=', 'accommodations.id_type')
        	   ->where('guests.end', $today)
               ->select('guests.*', 'accommodations.number', 'types.type')
               ->get();

        //Se for maior ou igual ao horario de 12:00:00 remove o hospede
        if($hours >= date('Y-m-d 12:00:00')) {
            //Percorre as informaçoes do usuario para pegar o id
            foreach($list as $items => $value) {
                //Antes de remover edita o status da acomodaçao para 1 (disponivel)
                $update = Accommodation::where('id', $value["id_reservation"])
                        ->update(['status' => 1]);
                $delete_guest = Guest::where('id', $value["id"])->delete();
            }
        } 

    	return view('admin.exit_today', [
    		'list' => $list
    	]);
    }
}
