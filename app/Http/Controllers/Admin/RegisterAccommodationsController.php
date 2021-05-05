<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Accommodation;
use App\Type;

class RegisterAccommodationsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accommodations()
    {
        //Busca dados de duas tabelas: types e accommodations
        $list = Accommodation::join('types', 'types.id', '=', 'accommodations.id_type')
               ->select('accommodations.*', 'types.name')
               ->get();
        
    	return view('admin.accommodations', [
            'accommodations' => $list
        ]);
    }

    public function form_accommodations()
    {
        $type_accommodation = Type::all();

    	return view('admin.form_accommodations', [
            'types' => $type_accommodation
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'types' => 'required|integer',
            'description' => 'required|string',
            'accommodates' => 'required|integer',
            'floor' => 'required|integer',
            'number' => 'required|string',
            'quantity' => 'required|integer'
        ]);

        $type = $request->input('types');
        $description = $request->input('description');
        $accommodates = $request->input('accommodates');
        $floor = $request->input('floor');
        $number = $request->input('number');
        $quantity = $request->input('quantity');

        //Inserir multiplos registros
        for($i=1; $i <= $quantity; $i++) {     

            $insert = new Accommodation;
            $insert->id_type = $type;
            $insert->description = $description;
            $insert->accommodates = $accommodates;
            $insert->floor = $floor;
            $insert->number = $number;
            $insert->quantity = $quantity;
            $insert->save();
        }

        return redirect()->route('admin.accommodations');
    }
}
