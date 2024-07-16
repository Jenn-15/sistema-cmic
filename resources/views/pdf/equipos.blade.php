<!--BUSCAR SOLO POR UN EQUIPO -->

<!-- resources/views/pdf/total.blade.php -->

<link rel="stylesheet" href="{{ public_path('css/styles.css') }}">

<div class="header">
    <div class="header-center">
        <img class="h-25 w-auto" src="{{ asset('img/cmic_tabasco.png') }}" alt="Logo de la Empresa">
    </div>
    <div class="header-center text-center">
        <p class="text-black smaller-text bold-text">
            CÁMARA MEXICANA DE LA INDUSTRIA DE LA CONSTRUCCIÓN
        </p>
        <p class="text-black my-1 smaller-text normal-text">
            FORMATO DE RESGUARDO DE EQUIPOS DE COMPUTO Y ACCESORIOS
        </p>
    </div>
</div>

<!-- Resto del contenido del PDF -->
<div class="content">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. INVENTARIO</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 6px;">CANT.</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">DESCRIPCIÓN</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MARCA</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">MODELO</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">No. DE SERIE</th>
                <th class="smaller-text" style="border: 1px solid black; padding: 8px;">OBSERVACIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipos as $equipo)
                <tr>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">
                        {{ $equipo->numero_inventario }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">1</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->descripcion }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->marca->marca }}
                    </td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->modelo }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->serie }}</td>
                    <td class="smaller-text" style="border: 1px solid black; padding: 8px;">{{ $equipo->observacion }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (isset($equipos[0]))
        <p class="text-black my-1 smaller-text">DEPARTAMENTO SOLICITANTE:
            <span class="text-black my-1">{{ $equipos[0]->empleado->area->area }}.</span>
        </p>

        <p class="text-black my-1 normal-text">
            FECHA DE ENTREGA:______________________________
        </p>
    @endif
</div>
<br>

<!-- Bloque de firmas -->
<div class="footer-signatures" style="text-align: center;">
    <div style="display: inline-block; width: 40%;">
        <div class="firma">
            <p class="firma-nombre  normal-text">RECIBE</p>
            <p class="firma-puesto smaller-text normal-text">
                @if (isset($equipos[0]))
                    {{ $equipos[0]->empleado->nombre }} {{ $equipos[0]->empleado->apellido_paterno }}
                    {{ $equipos[0]->empleado->apellido_materno }}
                @endif
                <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
            </p>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
    </div>
    <div style="display: inline-block; width: 40%;">
        <div class="firma">
            <p class="firma-nombre  normal-text">ENTREGA</p>
            <div class="signature-space smaller-text normal-text"></div>
            <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
        </div>
    </div>
</div>
