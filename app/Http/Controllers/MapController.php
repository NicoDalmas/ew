<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
	public function index()
	    {
	        $title = 'Mapa';
	//        return view('users.index')
	//            ->with('users', User::all())
	//            ->with('title', 'Listado de usuarios');
	        return view('map.map');
	    }
}
