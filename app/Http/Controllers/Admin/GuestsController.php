<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;
use App\Accommodation;
use App\Reservation;

class GuestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Retorna as acomodaçoes disponiveis e o tipo de acomodaçao
        $accommodation = Accommodation::where('status', 1)
        ->join('types', 'types.id', '=', 'accommodations.id_type')
        ->select('accommodations.id', 'accommodations.number', 'types.type')
        ->get();

    	return view('admin.form_guests', [
            'accommodation' => $accommodation
        ]);
    }

    public function form_guests_id($id)
    {
        return view('admin.form_guests_id', [
            'id_reservation' => $id
        ]);
    }

    public function guests()
    {
    	$guests = Guest::all();

    	return view('admin.guests', [
    		'guests' => $guests
    	]);
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'cpf' => 'required|string',
    		'cell' => 'required|integer',
    		'number_companions' => 'required|integer',
    		'date_entry' => 'required|date',
    		'date_exit' => 'required|date'
    	]);

    	$name = $request->input('name');
    	$cpf = $request->input('cpf');
    	$cell = $request->input('cell');
    	$number_companions = $request->input('number_companions');
    	$date_entry = $request->input('date_entry');
    	$date_exit = $request->input('date_exit');
        $id_reservation = $request->input('id_reservation');

    	//Utilizando o pacote Carbon para formatar as duas datas
        $entry = Carbon::createFromFormat('Y-m-d', $date_entry);
		$exit = Carbon::createFromFormat('Y-m-d', $date_exit);       
        //Total de dias o cliente vai ficar no hotel
        $number_days = $exit->diffInDays($entry);

        //Se o id da acomodação não estiver vazio, vai alterar o status para reservado
        if(!empty($id_reservation)) {

        	//Busca o status do id da acomodação
        	$accommodation = Accommodation::where('id', $id_reservation)->get('status');

            //Se retornar true significa que nao existe uma acomodaçao com esse id 
            if(!$accommodation->isEmpty()) {
            	//Verifica se a acomodação esta disponivel
            	foreach($accommodation as $item) {
            		//Se status for igual a 1 esta diponivel, então altera ocupado (2)
            		if($item['status'] == 1) {
            			//Edita status para 2 (ocupado)
                		$update = Accommodation::where('id', $id_reservation)
                        					->update(['status' => 2]);
    	        	} else {
    	        		return redirect()->route('form_guests')->with('warning', 'Acomodação escolhida está ocupada ou reservada!');
    	        	}
            	}
            } else {
                return redirect()->route('form_guests')->with('warning', 'Essa acomodação não existe!');
            }
        }

    	//Insere o hospéde
        $insert = new Guest();
        $insert->name = $name;
        $insert->cell = $cell;
        $insert->cpf = $cpf;
        $insert->number_companions = $number_companions;
        $insert->id_reservation = $id_reservation;
        $insert->start = $date_entry;
        $insert->end = $date_exit;
        $insert->number_days = $number_days;
        $insert->title = $name;
        $insert->save();

        return redirect()->route('guests');
    }

    public function guest($id)
    {
        $reservation = Reservation::find($id);

        //Retorna o numero e o nome da acomodação dessa reserva em especifico
        $accommodation = Accommodation::where('accommodations.id', $reservation['reservation_number'])
                    ->join('types', 'types.id', '=', 'accommodations.id_type')
                    ->select('accommodations.number', 'types.type')
                    ->get();
                
        return view('admin.reservation_guest', [
            'reservation' => $reservation,
            'accommodation' => $accommodation
        ]);
    }

    public function register_reservation_guest(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string',
            'cell' => 'required|integer',
            'number_companions' => 'required|integer',
            'id_reservation' => 'required|integer',
            'date_entry' => 'required|date',
            'date_exit' => 'required|date'
        ]);

        $name = $request->input('name');
        $cpf = $request->input('cpf');
        $cell = $request->input('cell');
        $number_companions = $request->input('number_companions');
        $id_reservation = $request->input('id_reservation');
        $date_entry = $request->input('date_entry');
        $date_exit = $request->input('date_exit');

        //Utilizando o pacote Carbon para formatar as duas datas
        $entry = Carbon::createFromFormat('Y-m-d', $date_entry);
        $exit = Carbon::createFromFormat('Y-m-d', $date_exit);       
        //Total de dias o cliente vai ficar no hotel
        $number_days = $exit->diffInDays($entry);

        if(!empty($id)) {
            //Deleta essa reserva
            $delete_reservation = Reservation::where('id', $id)->delete();
        }

        //Insere o hospéde
        $insert = new Guest();
        $insert->name = $name;
        $insert->cell = $cell;
        $insert->cpf = $cpf;
        $insert->number_companions = $number_companions;
        $insert->id_reservation = $id_reservation;
        $insert->start = $date_entry;
        $insert->end = $date_exit;
        $insert->number_days = $number_days;
        $insert->title = $name;
        $insert->save();

        return redirect()->route('guests');
    }

    public function edit($id)
    {
        $guest = Guest::find($id);

/*        Accommodation::join('accommodations', 'accommodations.id', '=', 'reservations.reservation_number')
               ->join('types', 'types.id', '=', 'accommodations.id_type')
               ->where('reservations.start', $today)
               ->select('reservations.*', 'accommodations.number', 'types.type')
               ->get(); */

        //Retorna as acomodaçoes disponiveis e o tipo de acomodaçao
        $accommodation = Accommodation::where('accommodations.id', $guest['id_reservation'])
        //->join('accommodations', 'accommodations.id', '=', 'guests.id_reservation')
        ->join('types', 'types.id', '=', 'accommodations.id_type')
        ->select('accommodations.id', 'accommodations.number', 'types.type')
        ->get();
//dd($accommodation[0]);
        return view('admin.edit_guest', [
            'guest' => $guest,
            'accommodation' => $accommodation
        ]);
    }

    public function register_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string',
            'cell' => 'required|integer',
            'number_companions' => 'required|integer'
        ]);

        if(!empty($id)) {
            //Edita nome, cpf, celular e quantidade de acompanhantes
            $update = Guest::where('id', $id)
                        ->update(['name'=> $request->input('name'),
                                  'cpf'=> $request->input('cpf'),
                                  'cell'=> $request->input('cell'),
                                  'number_companions'=> $request->input('number_companions')
                            ]);
        }
        return redirect()->route('guests');
    }
}
