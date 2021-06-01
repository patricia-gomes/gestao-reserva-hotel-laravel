<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use App\Accommodation;

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

    public function cancel($id)
    {   
        if(!empty($id)) {
            //Busca os dados dessa reserva especifica
            $reservation = Reservation::find($id);

            //Busca todas as acomodaçoes com esse mesmo id_reservation
            $list = Reservation::where('id_reservation', $reservation->id_reservation)->get();

            //Verificando se pode alterar o status dessa acomodaçao
            if(count($list) == 1) {
                //Alterando o status da acomodaçao dessa reserva
                $update = Accommodation::where('id', $reservation->id_reservation)
                                        ->update(['status' => 1]);
            }
        
            //Deleta essa reserva
            $delete_reservation = Reservation::where('id', $id)->delete();

            return redirect()->route('reservations');
        }
    }
}
