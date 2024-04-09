<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();

        $clientesComImagem = $clientes->map(function ($clientes) {

            return [
                'nome' => $clientes->nome,
            'telefone' => $clientes->telefone,
            'endereco' => $clientes->endereco,
            'email' => $clientes->email,
            'cpf'=> $clientes->cpf,
                'imagem' => asset('storage/' . $clientes->imagem),

            ];
        });


        return response()->json($clientesComImagem);
    }

    public function cadastrarCliente(Request $request){

        $clienteData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/clientes', $nomeImagem, 'public');
            $clienteData['imagem'] = $caminhoImagem;
        }

        $cliente = Cliente::create($clienteData);
        return response()->json(['produto'=>$cliente]);

    }
}
