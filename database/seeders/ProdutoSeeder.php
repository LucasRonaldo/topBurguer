<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lanches = [
            [
                'nome' => 'Burguer 1',
                'preco' => 17.99,
                'ingredientes' => 'fosemweaplf',
                'imagem' => 'images/hamburgao.jpeg'
            ],

            [
                'nome' => 'Burguer 2',
                'preco' => 17.99,
                'ingredientes' => 'fosemweaplf',
                'imagem' => 'images/hamburgao.jpeg'
            ],

            [
                'nome' => 'Burguer 3',
                'preco' => 17.99,
                'ingredientes' => 'fosemweaplf',
                'imagem' => 'images/hamburgao.jpeg'
            ],

            [
                'nome' => 'Burguer 4',
                'preco' => 17.99,
                'ingredientes' => 'fosemweaplf',
                'imagem' => 'images/hamburgao.jpeg'
            ],
        ];

        foreach($lanches as $lanche){

                DB::table('produtos')-> insert([
                    'nome' => $lanche['nome'],
                    'preco' => $lanche['preco'],
                    'ingredientes' => $lanche['ingredientes'],
                    'imagem' => $lanche['imagem'],
                    'created_at' => now(),
                    'updated_at'=> now(),
                ]);

        }
    }
}
