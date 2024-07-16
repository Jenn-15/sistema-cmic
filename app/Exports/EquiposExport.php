<?php

namespace App\Exports;

use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class EquiposExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    protected $equipos;

    public function __construct($equipos)
    {
        $this->equipos = $equipos;
    }

    public function collection()
    {
        return $this->equipos;
    }

    public function headings(): array
    {
        return [
            'No.INVENTARIO',
            'DESCRIPCIÓN',
            'MARCA',
            'MODELO',
            'SERIE',
            'UBICACIÓN',
            'RESPONSABLE',
            'FECHA DE RESGUARDO',
            'OBSERVACIONES'
        ];
    }

    public function map($equipo): array
    {
        return [
            $equipo->numero_inventario,
            $equipo->descripcion,
            optional($equipo->marca)->marca, // Usar optional para manejar casos donde marca sea null
            $equipo->modelo,
            $equipo->serie,
            $equipo->area->area,
            $equipo->empleado->nombre . ' ' . $equipo->empleado->apellido_paterno . ' ' . $equipo->empleado->apellido_materno,
            $equipo->fecha_resguardo,
            $equipo->observacion,
        ];
    }
}
