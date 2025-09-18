<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Comprobante {{ $venta->serie }}-{{ $venta->correlativo }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .ticket {
            width: 240px;
            margin: 0 auto;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 2px 0;
            vertical-align: top;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .totales td {
            padding: 3px 0;
        }
    </style>
</head>

<body>
    <div class="ticket">
        {{-- ENCABEZADO EMPRESA --}}
        <div class="center">
            <img src="{{ public_path('assets/img/logos.png') }}" alt="Logo" style="width:150px; margin-bottom:5px;">

            <h3 class="bold">{{ $empresa->razon_social }}</h3>
            <p>{{ $empresa->direccion }}</p>
            <p>RUC: {{ $empresa->ruc }}</p>
            <p class="bold">{{ $venta->comprobante_tipo_codigo == '01' ? 'FACTURA ELECTRÓNICA' : 'BOLETA ELECTRÓNICA' }}</p>
            <p class="bold">{{ $venta->serie }}-{{ str_pad($venta->correlativo,8,'0',STR_PAD_LEFT) }}</p>
        </div>
        <div class="line"></div>
        {{-- DATOS CLIENTE --}}
        <p><strong>Cliente:</strong> {{ $venta->cliente->razon_social }}</p>
        <p><strong>Documento:</strong> {{ $venta->cliente->documentoTipo->descripcion }} {{ $venta->cliente->numero_documento }}</p>
        <p><strong>Dirección:</strong> {{ $venta->cliente->direccion ?? '-' }}</p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y H:i') }}</p>
        <div class="line"></div>
        {{-- DETALLE PRODUCTOS --}}
        <table>
            {{-- ENCABEZADO --}}
            <tr class="bold">
                <td style="width: 45%;">Descripción</td>
                <td style="width: 15%; text-align: center;">Cant.</td>
                <td style="width: 20%; text-align: right;">P. Unit.</td>
                <td style="width: 20%; text-align: right;">Total</td>
            </tr>
            <tr>
                <td colspan="4" style="border-top: 1px solid #000; padding: 1px 0;"></td>
            </tr>

            {{-- PRODUCTOS --}}
            @foreach($venta->detalles as $detalle)
            <tr>
                <td style="width: 45%;">{{ $detalle->producto->nombre }}</td>
                <td style="width: 15%; text-align: center;">{{ $detalle->cantidad }}</td>
                <td style="width: 20%; text-align: right;">{{ number_format($detalle->precio_unitario,2) }}</td>
                <td style="width: 20%; text-align: right;">{{ number_format($detalle->total,2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="border-top: 1px solid #000; padding: 1px 0; margin-top: 3px;"></td>
            </tr>

        </table>

        {{-- TOTALES --}}
        <table class="totales">
            <tr>
                <td>OP. GRAVADAS:</td>
                <td style="text-align: right;">S/ {{ number_format($venta->op_gravada,2) }}</td>
            </tr>
            <tr>
                <td>OP. EXONERADAS:</td>
                <td style="text-align: right;">S/ {{ number_format($venta->op_exonerada,2) }}</td>
            </tr>
            <tr>
                <td>OP. INAFECTAS:</td>
                <td style="text-align: right;">S/ {{ number_format($venta->op_inafecta,2) }}</td>
            </tr>
            <tr>
                <td>Impuesto (18%):</td>
                <td style="text-align: right;">S/ {{ number_format($venta->impuesto,2) }}</td>
            </tr>
            <tr class="bold">
                <td>TOTAL:</td>
                <td style="text-align: right;">S/ {{ number_format($venta->total,2) }}</td>
            </tr>
        </table>
        <div class="line"></div>
        {{-- QR SUNAT --}}
        @if(isset($qrDataUri))
        <div style="text-align:center; margin-top:10px;">
            <img src="{{ $qrDataUri }}" width="120">
        </div>
        @elseif(isset($qr))
        <div style="text-align:center; margin-top:10px;">
            <img src="data:image/png;base64,{{ $qr }}" width="120">
        </div>
        @endif
        <div class="center">
            <p>¡Gracias por su compra!</p>
        </div>
    </div>
</body>

</html>