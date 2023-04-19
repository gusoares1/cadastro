<?php

namespace App\Http\Controllers;

use App\Models\Localizacao;
use Illuminate\Http\Request;

class ControladorLocalizacao extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexView()
    {
        return view('localizacao');
    }

    public function index()
    {
        $loc = Localizacao::all();
        return $loc->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loc = new Localizacao();
        $loc->rua = $request->input('rua');
        $loc->bairro = $request->input('bairro');
        $loc->cidade = $request->input('cidade');
        $loc->cep = $request->input('cep');
        $loc->cliente = $request->input('cliente');
        $loc->save();
        return json_encode($loc);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $loc = Localizacao::find($id);
        if (isset($loc)) {
            return json_encode($loc);
        }
        return response ('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loc = Localizacao::find($id);
        if (isset($loc)) {
            $loc->rua = $request->input('rua');
            $loc->bairro = $request->input('bairro');
            $loc->cidade = $request->input('cidade');
            $loc->cep = $request->input('cep');
            $loc->cliente = $request->input('cliente');
            $loc->save();
            return json_encode($loc);
        }
        return response ('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loc = Localizacao::find($id);
        if (isset($loc)) {

            $loc->delete();
            return response('ok',200);
        }
        return response ('Produto não encontrado', 404);
    }
}
