<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use Carbon\Carbon;
use App\Accommodation;

class RegisterReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.form_reservations');
    }

    public function form_reservations_id($id)
    { 
        return view('admin.form_reservations_id', [
            'id_accomomdation' => $id
        ]);
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'cell' => 'required|integer',
    		'start' => 'required|date',
    		'end' => 'required|date'
    	]);

    	$name = $request->input('name');
        $cell = $request->input('cell');
        $reservation_number = $request->input('reservation_number');
		$start = $request->input('start');
        $end = $request->input('end');

        //Utilizando o pacote Carbon para formatar as duas datas
        $date_entry = Carbon::createFromFormat('Y-m-d', $start);
		$date_exit = Carbon::createFromFormat('Y-m-d', $end);       
        //Total de dias o cliente vai ficar no hotel
        $number_days = $date_exit->diffInDays($date_entry);

        //Se o id da acomodação não estiver vazio, vai alterar o status para reservado
        if(!empty($reservation_number)) {

            //Busca o status do id da acomodação
            $accommodation = Accommodation::where('id', $reservation_number)->get('status');

            //Se retornar true significa que nao existe uma acomodaçao com esse id 
            if(!$accommodation->isEmpty()) {
                //Verifica se a acomodação esta disponivel
                foreach($accommodation as $item) { 
                    //Se status for igual a 1 esta diponivel, então altera reservado (3)
                    if($item['status'] == 1) {             
                        //Edita status para 3 (reservado)
                        $update = Accommodation::where('id', $reservation_number)
                                ->update(['status' => 3]);
                    } else {
                        return redirect()->route('form_reservations')->with('warning', 'Acomodação escolhida está ocupada ou reservada!');
                    }
                }
            } else {
                return redirect()->route('form_reservations')->with('warning', 'Essa acomodação não existe!');
            }
        }

        //Insere a reserva
        $insert = new Reservation();
        $insert->name = $name;
        $insert->cell = $cell;
        $insert->reservation_number = $reservation_number;
        $insert->start = $start;
        $insert->end = $end;
        $insert->title = $name;
        $insert->number_days = $number_days;
        $insert->save();

        return redirect()->route('reservations');
    }
}