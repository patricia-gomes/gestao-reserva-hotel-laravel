<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guest;
use App\Accommodation;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function finish_guest($id)
    {
    	//Busca os dados do hospede
    	$guest = Guest::find($id);

		//Antes de deletar altera o status da acomodaçao desse hospede
    	$update = Accommodation::where('id', $guest->id_reservation)
    							->update(['status' => 1]);
    	if(!empty($id)) {
            //Deleta esse hospede
            $delete_guest = Guest::where('id', $id)->delete();

            return redirect()->route('admin.exit_today');
        }
    }
}
