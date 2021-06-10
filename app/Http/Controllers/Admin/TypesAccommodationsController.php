<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypesAccommodationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.form_types');
    }

    public function types()
    {
    	$types = Type::all();

    	return view('admin.types', [
    		'types' => $types
    	]);
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string'
    	]);

    	$name = $request->input('name');

    	$insert = new Type();
        $insert->type = $name;
        $insert->save();

        return redirect()->route('types');
    }

    public function edit($id)
    {
    	$type = Type::find($id);

    	return view('admin.edit_types', [
            'type' => $type
        ]);
    }

    public function register_edit(Request $request, $id)
    {
    	$request->validate([
    		'name' => 'required|string'
    	]);

    	//Se nao tiver vazio edita pelo id
    	if(!empty($id)) {
    		$update = Type::where('id', $id)
    						->update(['type' => $request->input('name')]);
    	}
    	return redirect()->route('types');
    }

    public function delete($id)
    {
    	if(!empty($id)) {
    		//Deleta 
            $delete_type = Type::where('id', $id)->delete();

            return redirect()->route('types');
    	}
    }
}
