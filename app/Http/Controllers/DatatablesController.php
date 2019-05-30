<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;

class DatatablesController extends Controller
{
	    /**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View

	public function getIndex()
	{
	    return view('users.index');
	}
		 */

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{
	    return Datatables::of(User::query())
	    ->addColumn('action', function ($query) {
            return "
                    <a href=" . route('users.show', $query->id) . " class='btn btn-link'><span class='oi oi-eye'></span></a>
                    <a href=" . route('users.edit', $query->id) . " class='btn btn-link'><span class='oi oi-pencil'></span></a>
                    <button type='button' class='btn btn-link'><span class='oi oi-trash' data-toggle='modal' data-target='#exampleModal' data-perro=' $query->id' ></span></button> ";
            })
	    ->make(true);

	}
}
