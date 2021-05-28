<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;
use App\Accommodation;

class GuestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.form_guests');
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

        //Se o id da acomodação não estiver vazio, vai alterar o status para reservado
        if(!empty($id_reservation)) {

        	//Busca o status do id da acomodação
        	$accommodation = Accommodation::where('id', $id_reservation)->get('status');

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
}
