<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $nom =[] ;
        return view("Home.index",['name'=>$nom]) ;
    }
    public function contact()
    {
        return view("Home.contact") ;
    }
    public function submitForm(\Symfony\Component\HttpFoundation\Request $request)
    { $name = $request->input('nom') ;
        return "submitted name without spaces " . $name ;

    }
}
