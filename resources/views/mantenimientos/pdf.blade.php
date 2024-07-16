<link rel="stylesheet" href="css/styles.css"> <!-- Vincula tu archivo CSS externo -->
<div class="header-center">
    <img class="h-25 w-auto" src="{{ public_path('img/cmic_tabasco.png') }}" alt="Logo de la Empresa">  
</div> 
<br>
<div class="bold-text text-4xl" style="text-align: center;">REPORTE DE MANTENIMIENTO Y CONTROL DE EQUIPOS DE CÓMPUTO</div><br>

<div class="content">
    <!-- <h4 class=" text-gray-800 my-3 smaller-text bold-text">INFORMACIÓN DEL EQUIPO:</h4> -->
    <div class="md:grid md:grid-cols-2 bg-gray-200 p-4 my-10 smaller-text">
        <p class="bold-text uppercase text-gray-800 my-3">EQUIPO:
            <span class="normal-case normal-text">
                {{ $mantenimiento->equipo->numero_inventario }}
            </span>
        </p>
        <p>
            <span class="bold-text text-sm uppercase text-gray-800 my-3">RESPONSABLE:
                <span class="normal-case normal-text">
                    {{ $mantenimiento->equipo->empleado->nombre }}
                    {{ $mantenimiento->equipo->empleado->apellido_paterno }}
                    {{ $mantenimiento->equipo->empleado->apellido_materno }}
                </span>
            </p>

        <p>
            <span class="bold-text uppercase text-gray-800 my-3">UBICACIÓN:
                <span class="normal-case normal-text"> {{ $mantenimiento->equipo->area->area }} </span>
            </span>
        </p>
        <p class="bold-text uppercase text-gray-800 my-3">CATEGORIA DEL EQUIPO:
            <span class="normal-case normal-text">{{ $mantenimiento->equipo->categoria->categoria }} </span>
        </p>
        <p class="bold-text uppercase text-gray-800 my-3">TIPO DE MANTENIMIENTO:
            <span class="normal-case normal-text">{{ $mantenimiento->tipo->tipo }} </span>
        </p>
        
        <p class="bold-text uppercase text-gray-800 my-3">COSTO:
            <span class="normal-case normal-text">{{ $mantenimiento->costo }} </span>
        </p>
        <p class="bold-text uppercase text-gray-800 my-3">ÚLTIMO MANTENIMIENTO:
            <span
                class="normal-case normal-text">{{ \Carbon\Carbon::parse($mantenimiento->fecha)->toFormattedDateString() }}</span>
        </p>
    </div>
    <div class="content">
        <!-- Texto y Fecha -->
        <div class="flex-container" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <p class="text-black my-1 smaller-text" style="margin: 0;">
                DEPARTAMENTO SOLICITANTE: <span class="text-black my-1">{{ $area->area }}</span>
            </p>
            <a class="firma-nombre smaller-text bold-text" style="margin: 0;">
                FECHA DE ENTREGA:_____________________________
            </a>
        </div>
    
        <!-- Firmas -->
        <div class="signature-container" style="text-align: center; margin-top: 20px;">
            <div class="footer-signatures" style="display: inline-block; width: auto;">
                <!-- Firma izquierda -->
                <div class="firma" style="display: inline-block; margin-right: 20px; vertical-align: top;">
                    <div class="signature-space" style="height: 50px; border-bottom: 1px solid #000;"></div>
                    <p class="firma-nombre smaller-text normal-text">RECIBE</p>
                    <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
                </div>
                <!-- Firma derecha -->
                <div class="firma" style="display: inline-block; margin-left: 20px; vertical-align: top;">
                    <div class="signature-space" style="height: 50px; border-bottom: 1px solid #000;"></div>
                    <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
                    <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
                </div>
            </div>
        </div>
    </div>
    