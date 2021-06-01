<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Accommodation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Busca dados de duas tabelas: types e accommodations
        $list = Accommodation::join('types', 'types.id', '=', 'accommodations.id_type')
               ->select('accommodations.*', 'types.type')
               ->get();
               
        return view('admin.home', [
            'accommodations' =>  $list
        ]);
    }
}
