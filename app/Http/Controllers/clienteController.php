<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class clienteController extends Controller
{
    
    public function cadastrarCliente(Request $request){
        $clientes = Cliente::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            "status" => true,
            "message" => "Cliente foi cadastrado com sucesso.",
            "data" => $clientes
        ], 200);
    }
}
