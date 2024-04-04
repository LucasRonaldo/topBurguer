<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    
    public function cadastroCliente(Request $request){
        $cliente = Cliente::create([
            'nome'=> $request->nome,
            ''
        ])
    }
}
