<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RH - Quadro de Colaboradores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-lg">
        
        <!-- Cabeçalho da Página -->
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Quadro de Colaboradores</h1>
                <p class="text-sm text-gray-500">Gestão de RH e exportação de dados corporativos</p>
            </div>
            
            <!-- Botões de Ação -->
            <div class="flex gap-3">
                <a href="{{ route('empregados.export.excel') }}" 
                   class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition duration-150 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Exportar Excel (.xlsx)
                </a>

                <a href="{{ route('empregados.export.csv') }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg shadow-sm transition duration-150 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Exportar CSV (.csv)
                </a>
            </div>
        </div>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-900 text-white text-sm">
                        <th class="p-3 rounded-l-lg">Código</th>
                        <th class="p-3">Nome</th>
                        <th class="p-3">E-mail</th>
                        <th class="p-3">Departamento</th>
                        <th class="p-3">Salário</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 rounded-r-lg">Admissão</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                    @foreach($empregados as $empregado)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 font-mono text-xs">EMP-{{ str_pad($empregado->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="p-3 font-semibold text-gray-900">{{ $empregado->name }}</td>
                        <td class="p-3 text-gray-600">{{ $empregado->email }}</td>
                        <td class="p-3">{{ $empregado->department }}</td>
                        <td class="p-3 font-medium">R$ {{ number_format($empregado->salary, 2, ',', '.') }}</td>
                        <td class="p-3">
                            <span class="px-2.5 py-1 text-xs rounded-full font-semibold
                                {{ $empregado->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $empregado->status === 'on_leave' ? 'bg-amber-100 text-amber-800' : '' }}
                                {{ $empregado->status === 'terminated' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $empregado->status === 'active' ? 'ATIVO' : ($empregado->status === 'on_leave' ? 'EM LICENÇA' : 'DESLIGADO') }}
                            </span>
                        </td>
                        <td class="p-3">{{ $empregado->hired_at ? $empregado->hired_at->format('d/m/Y') : 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>