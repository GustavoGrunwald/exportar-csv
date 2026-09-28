<?php

namespace App\Http\Controllers;

use App\Exports\EmpregadosExport;
use App\Models\Empregado;
use Maatwebsite\Excel\Facades\Excel;

class EmpregadoController extends Controller
{
    public function index()
    {
        $empregados = Empregado::all();
        return view('empregados.index', compact('empregados'));
    }

    public function exportExcel()
    {
        $fileName = 'relatorio-colaboradores-' . now()->format('Y-m-d') . '.xlsx';
        return Excel::download(new EmpregadosExport, $fileName);
    }

    // Download no formato CSV (.csv)
    public function exportCsv()
    {
        $fileName = 'relatorio-colaboradores-' . now()->format('Y-m-d') . '.csv';
        return Excel::download(new EmpregadosExport, $fileName, \Maatwebsite\Excel\Excel::CSV);
    }
}
