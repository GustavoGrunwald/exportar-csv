<?php

namespace Database\Seeders;

use App\Models\Empregado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpregadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        Empregado::create([
            'nome' => 'Ana Beatriz Ramos',
            'email' => 'ana.ramos@empresa.com',
            'departamento' => 'Tecnologia da Informação',
            'salario' => 8500.00,
            'status' => 'ativo',
            'contratado_em' => '2022-03-15',
        ]);

        Empregado::create([
            'nome' => 'Lucas Andrade',
            'email' => 'lucas.andrade@empresa.com',
            'departamento' => 'Recursos Humanos',
            'salario' => 5200.00,
            'status' => 'em_licenca',
            'contratado_em' => '2021-08-10',
        ]);

        Empregado::create([
            'nome' => 'Mariana Costa',
            'email' => 'mariana.costa@empresa.com',
            'departamento' => 'Marketing',
            'salario' => 6100.50,
            'status' => 'ativo',
            'contratado_em' => '2023-01-20',
        ]);

        Empregado::create([
            'nome' => 'Roberto Mendes',
            'email' => 'roberto.mendes@empresa.com',
            'departamento' => 'Financeiro',
            'salario' => 7300.00,
            'status' => 'desligado',
            'contratado_em' => '2019-11-01',
        ]);
    }
}
