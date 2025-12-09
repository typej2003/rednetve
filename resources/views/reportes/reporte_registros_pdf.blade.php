<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Pagos</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h1 { text-align: center; color: #333; }
    </style>
</head>
<body>
    <h1>Reporte de Registros - Pagos</h1>

    @if($fechaDesde && $fechaHasta)
        <p>Periodo: {{ \Carbon\Carbon::parse($fechaDesde)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaHasta)->format('d/m/Y') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Operación</th>
                <th>Fecha</th>
                <th>Bs</th>
                <th>Usd</th>
                <th>Origen</th>
                {{-- NUEVAS COLUMNAS --}}
                <th>Cliente</th>
                <th>Identificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->operacion }}</td>
                    <td>{{ \Carbon\Carbon::parse($registro->fecha)->format('d/m/Y') }}</td>
                    <td>{{ number_format($registro->bs, 2) }}</td>
                    <td>{{ number_format($registro->usd, 2) }}</td>
                    <td>{{ $registro->origen }}</td>
                    
                    {{-- ACCESO A LAS PROPIEDADES DEL USUARIO --}}
                    {{-- Usamos '?' para manejo seguro de registros sin usuario asignado --}}
                    <td>{{ $registro->user?->name }}</td> 
                    <td>{{ $registro->user?->identificationNumber }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>