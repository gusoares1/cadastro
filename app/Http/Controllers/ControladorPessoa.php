<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoas;

class ControladorPessoa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoa = Pessoas::all();
        return view('pessoas', compact('pessoa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('novapessoa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = ['nome' => 'required',
        'cpf_cnpj' => 'required|unique:pessoas',
        'endereco' => 'required',
        'email' => 'required|email|unique:pessoas'];

        $mensagens = [
            'nome.required' => 'o nome é requerido',
            'cpf_cnpj.required' =>'CPF/CPNJ é requerido',
            'cpf_cnpj.unique' =>'CPF/CPNJ ja existe',
            'endereco.required' => 'o endereço é requerido',
            'email.required' =>'email é requerido',
            'email.unique' =>'email ja existe',
            'email.email' =>'email invalido'

        ];
        $request->validate($regras, $mensagens);

        $pes = new Pessoas();
        $pes->nome = $request->input('nome');
        $pes->cpf_cnpj = $request->input('cpf_cnpj');
        $pes->email  = $request->input('email');
        $pes->endereco= $request->input('endereco');
        $pes->save();
        return redirect('/pessoas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pes = Pessoas::find($id);
        if (isset($pes)) {
            return view('editarpessoa', compact('pes'));
        }
        return redirect('/pessoas');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pes = Pessoas::find($id);
        if (isset($pes)) {
            
            $pes->nome = $request->input('nome');
            $pes->cpf_cnpj = $request->input('cpf_cnpj');
            $pes->email = $request->input('email');
            $pes->endereco = $request->input('endereco');
            $pes->save();
        }
        return redirect('/pessoas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pes = Pessoas::find($id);
        if (isset($pes)) {
            $pes->delete();
        }
        return redirect('/pessoas');
    }

    public function indexJson()
    {
        $pess = Pessoas::all();
        return json_encode($pess);
    }

}
