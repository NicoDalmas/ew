<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


class WelcomeController extends Controller
{
    public function index()
    {
        //$users = DB::table('users')->get();
        

       

//        return view('users.index')
//            ->with('users', User::all())
//            ->with('title', 'Listado de usuarios');

        return view('welcome.blade.php');
    }

   
