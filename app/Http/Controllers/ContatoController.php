<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\ContatoTelefone;
use App\Models\TipoTelefone;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view('contatos.index')->with('contatos', $contatos);
    }
    public function getById($id)
    {
        $contato = Contato::find($id);
        if (empty($contato)) {
            return "Contato não existente";
        }

        $telefones = ContatoTelefone::where("idContato", $id)->get();

        $params = [
            "tipos_telefones" => TipoTelefone::all(),
            "telefones" => $telefones,
            "contato" => $contato
        ];

        return view('contatos.form')->with($params);
    }

    public function getTelByContatoId($id){

        $contato = Contato::find($id);
        if (empty($contato)) {
            return "Contato não existente";
        }

        $telefones = ContatoTelefone::where("idContato", $id)->get();
        $params = [
            "tipos_telefones" => TipoTelefone::all(),
            "telefones" => $telefones,
            "contato" => $contato
        ];
        return view('contatos.telefones')->with($params);

    }

    public function getTelById($id, $idcontato){

        $telefone = ContatoTelefone::find($id);
        if (empty($telefone)) {
            return "Telefone não existente";
        }

        $contato = Contato::find($idcontato);


        $params = [
            "tipos_telefones" => TipoTelefone::all(),
            "telefone" => $telefone,
            "contato" => $contato
        ];
        return view('contatos.telefoneform')->with($params);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $contato = new \StdClass();
        $contato->id = '';
        $contato->nome = '';
        $contato->email = '';
        $contato->linkedin = '';
        $contato->facebook = '';
        $contato->login = '';

        $params = [
            "tipos_telefones" => TipoTelefone::all(),
            "telefones" => [],
            "contato" => $contato
        ];

        return view('contatos.form')->with($params);
    }

    public function createTelefone($id)
    {
        $contato = Contato::find($id);
        if (empty($contato)) {
            return "Contato não existente";
        }

        $telefone = new \StdClass();
        $telefone->id = '';
        $telefone->numero = '';
        $telefone->idcontato = $contato->id;
        $telefone->idTipoTelefone = 1;


        $params = [
            "contato" => $contato,
            "telefone" =>$telefone
        ];

        return view('contatos.telefoneform')->with($params);
    }

    /**
     * insert a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $contato = Contato::create($request->all());

            Mail::send('body', [], function ($message) use ($contato) {
                $message->to($contato->getAttribute("email"), $contato->getAttribute("nome"))->subject('Bem vindo ao sistema' . $contato->getAttribute("nome") . "!");
            });

        return response()->json([
            "message" => "Contato inserido com sucesso! ",
            "contato" => $contato,
            "redirect" => '/contato/index'
        ]);
    }



    public function insertTelefone(Request $request)
    {
        $telefone = ContatoTelefone::create($request->all());
        return response()->json(
            [
                "message" => "Telefone inserido com sucesso!",
                "telefone" => $telefone,
                "redirect" => '/contato/telefone/'.$telefone->idContato
            ]);
    }


    public function update(Request $request){


        $contato = Contato::find($request->id);
        if(!empty($contato)) {
            $contato->update($request->all());
        }
        return response()->json(
            [
                "message" => "Contato atualizado com sucesso!",
                "contato" => $contato,
                "redirect" => '/contato/index'
            ]
        );
    }

    public function updateTelefone(Request $request){


        $telefone = ContatoTelefone::find($request->id);
        if(!empty($telefone)) {
            $telefone->update($request->all());
        }
        $contato = Contato::find($telefone->idContato);
        return response()->json(
            [
                "message" => "Contato atualizado com sucesso!",
                "contato" => $contato,
                "redirect" => '/contato/telefone/'.$telefone->idContato
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();
        return response()->json(["message" => " Contato deletado com sucesso! ",    "redirect" => '/contato/index']);
    }

    public function destroyTelefone($id, $idContato)
    {
        $telefone = ContatoTelefone::find($id);
        $contato = Contato::find($idContato);
        $telefone->delete();
        return response()->json(
            [
                "message" => " Telefone deletado com sucesso! ",
                "redirect" => '/contato/telefone/'.$contato->id]);
    }
}
