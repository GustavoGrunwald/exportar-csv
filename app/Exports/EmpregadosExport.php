<?php

namespace App\Exports;

use App\Models\Empregado;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmpregadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Empregado::all();
    }

    public function headings(): array
    {
        return [
            'CÓDIGO',
            'COLABORADOR',
            'E-MAIL CORPORATIVO',
            'DEPARTAMENTO',
            'SALÁRIO MENSAL',
            'SITUAÇÃO',
            'DATA DE ADMISSÃO',
        ];
    }
    public function map($empregado): array
    {
        $statusLabels = [
            'ativo' => 'ATIVO',
            'em_licenca' => 'EM LICENÇA',
            'desligado' => 'DESLIGADO',
        ];

        return [
            'EMP-' . str_pad($empregado->id, 4, '0', STR_PAD_LEFT),
            $empregado->nome,
            $empregado->email,
            $empregado->departamento,
            'R$ ' . number_format($empregado->salary, 2, ',', '.'),
            $statusLabels[$empregado->status] ?? $empregado->status,
            $empregado->contratado_em ? $empregado->contratado_em->format('d/m/Y') : 'N/A',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 11,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '1E3A8A'], // Navy Blue
                ],
            ],
        ];
    }
}
