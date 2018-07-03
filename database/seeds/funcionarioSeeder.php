<?php

use Illuminate\Database\Seeder;

class funcionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcionarios')->insert([
            'name'  => 'Marcos Vinicius',
            'cpf'   =>  '16324851761',
            'email' =>  'marcos@gmail.com',
            'cargo' =>  'Gerente',
            'DataDeNascimento' => '1997-13-05',
            'DataDeContratacao' =>  '2018-07-02',
            'password'  =>  bcrypt('admin')
        ]);
    }
}
