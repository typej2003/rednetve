<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Facturas</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h1 { text-align: center; color: #333; }
    </style>
</head>
<body>
    <h1>Reporte de Facturas - Pagos</h1>

    @if($fechaDesde && $fechaHasta)
        <p>Periodo: {{ \Carbon\Carbon::parse($fechaDesde)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fechaHasta)->format('d/m/Y') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Emisión</th>
                <th>Monto Total</th>
                <th>Concepto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y') }}</td>
                    <td>${{ number_format($factura->monto, 2) }}</td>
                    <td>{{ $factura->concepto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>