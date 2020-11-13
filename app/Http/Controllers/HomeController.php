<?php

namespace App\Http\Controllers;
use App\Models\Contato;
use App\Models\ContatoTelefone;
use Illuminate\Http\Request;

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

        $numeroContatos = Contato::all()->count();
        $numeroTelefones = ContatoTelefone::all()->count();
        return view('home',[ 'numeroContatos' => $numeroContatos, 'numeroTelefones' => $numeroTelefones ]);
    }
}
