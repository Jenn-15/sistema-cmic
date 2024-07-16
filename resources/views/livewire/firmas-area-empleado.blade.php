<!-- Firmas para los resguardos de area/empleado segun su busqueda
    *agregar position: fixed; bottom: 0; left: 0; en caso de que se requiera que las firmas estén hasta abajo-->

<!-- Firmas *agregar position: fixed; bottom: 0; left: 0; en caso de que se requiera que las firmas estén hasta abajo-->
<div class="signature-container">
    <div class="footer-signatures">
        <!-- Columna izquierda -->
        <div style="float: left; width: 45%;">
            <div class="firma">
                <p class="text-black my-1 smaller-text bold-text" style="flex: 1;">
                    FECHA DE ENTREGA:
                    <p class="firma-puesto smaller-text firma-puesto normal-case font-normal normal-text">
                        @if (!$area)
                            {{ $equipos->isNotEmpty() ? Carbon\Carbon::parse($equipos->first()->fecha_resguardo)->translatedFormat('d F Y') : '' }}
                        @endif
                        <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                    </p>
                </p>
                <br>
                <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
            <div class="firma">
                <p class="firma-nombre smaller-text normal-text">RECIBE</p>
                <p class="firma-puesto smaller-text normal-text">
                    @if (!$area)
                        {{-- Mostrar el nombre del responsable solo si no se está buscando por área --}}
                        {{ $responsable ? $responsable->nombre . ' ' . $responsable->apellido_paterno . ' ' . $responsable->apellido_materno : '' }}
                        <span style="display: block; border-bottom: 1px solid black; width: 100%; margin-top: -10px;"></span>
                    @endif
                </p>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <!-- Columna derecha -->
        <div style="float: right; width: 45%;">
            <div class="firma">
                <p class="firma-nombre smaller-text bold-text p-5" style="margin-bottom: 10px;">FECHA DE DEVOLUCIÓN</p>
                <p class="normal-case font-normal normal-text signature-space smaller-text" style="margin-bottom: 10px; border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></p>
                <br>
                <p class="firma-nombre smaller-text normal-text">ENTREGA</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
            <div class="firma">
                <p class="firma-nombre smaller-text normal-text">RECIBE</p>
                <div class="signature-space smaller-text normal-text" style="border-bottom: 1px solid black; width: 100%; margin: 10px 0;"></div>
                <p class="firma-puesto smaller-text normal-text">(NOMBRE Y FIRMA)</p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
