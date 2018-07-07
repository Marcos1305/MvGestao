<?php

use Illuminate\Database\Seeder;

class ProdutosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Geladeira',
            'descricao' => 'FREEZER FREEZER',
            'preco' => 2010.00,
            'CodBarra' =>  58489548
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Fogão',
            'descricao' => 'Fogão Fogão',
            'preco' => 1504.00,
            'CodBarra' =>  58489574
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Tenis',
            'descricao' => 'Tenis Tenis',
            'preco' => 100.00,
            'CodBarra' =>  8459875
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Prato',
            'descricao' => 'Prato Prato',
            'preco' => 10.00,
            'CodBarra' =>  5484456
        ]);
        DB::table('produtos')->insert([
            'nome' => 'Doce',
            'descricao' => 'Doce Doce',
            'preco' => 1.00,
            'CodBarra' =>  884598
        ]);
    }
}
