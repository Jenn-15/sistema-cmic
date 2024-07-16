<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Exports\EquiposExport;
use Maatwebsite\Excel\Facades\Excel;

class ResguardosTotal extends Component
{
    public $equipos;
    public $termino;

    public function mount()
    {
        $this->equipos = Equipo::all();
        $this->termino = '';
    }

    public function submit()
    {
        $query = Equipo::query();

        if ($this->termino) {
            $query->where(function ($q) {
                $q->where('numero_inventario', 'like', '%' . $this->termino . '%')
                    ->orWhere('modelo', 'like', '%' . $this->termino . '%')
                    ->orWhere('serie', 'like', '%' . $this->termino . '%')
                    ->orWhere('fecha_resguardo', 'like', '%' . $this->termino . '%')
                    ->orWhereYear('fecha_resguardo', $this->termino) // Para buscar por año
                    ->orWhereHas('marca', function ($q) {
                        $q->where('marca', 'like', '%' . $this->termino . '%');
                    })
                    ->orWhereHas('empleado', function ($q) {
                        $q->where('nombre', 'like', '%' . $this->termino . '%')
                            ->orWhere('apellido_paterno', 'like', '%' . $this->termino . '%')
                            ->orWhere('apellido_materno', 'like', '%' . $this->termino . '%');
                    });
            });
        }

        $this->equipos = $query->get();
    }

    public function generatePDF()
    {
        $equipos = $this->equipos;

        $pdf = PDF::loadView('pdf.total', [
            'equipos' => $equipos,
        ])->setPaper('a4', 'landscape'); // Aquí especificamos la orientación horizontal

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'equipos_seleccionados.pdf');
    }

    public function generateExcel()
    {
        // Aplicar filtro si hay un término de búsqueda
        if ($this->termino) {
            $query = Equipo::query();
    
            $query->where(function ($q) {
                $q->where('numero_inventario', 'like', '%' . $this->termino . '%')
                    ->orWhere('modelo', 'like', '%' . $this->termino . '%')
                    ->orWhere('serie', 'like', '%' . $this->termino . '%')
                    ->orWhere('fecha_resguardo', 'like', '%' . $this->termino . '%')
                    ->orWhereYear('fecha_resguardo', $this->termino)
                    ->orWhereHas('marca', function ($q) {
                        $q->where('marca', 'like', '%' . $this->termino . '%');
                    })
                    ->orWhereHas('empleado', function ($q) {
                        $q->where('nombre', 'like', '%' . $this->termino . '%')
                            ->orWhere('apellido_paterno', 'like', '%' . $this->termino . '%')
                            ->orWhere('apellido_materno', 'like', '%' . $this->termino . '%');
                    });
            });
    
            $equiposFiltrados = $query->get();
    
            // Descargar Excel con los datos filtrados
            return (new EquiposExport($equiposFiltrados))->download('equipos_filtrados.xlsx');
        } else {
            // Si no hay término de búsqueda, descargar Excel con todos los equipos
            $equipos = Equipo::all();
    
            // Descargar Excel con todos los equipos
            return (new EquiposExport($equipos))->download('equipos.xlsx');
        }
    }
    

    public function render()
    {
        return view('livewire.resguardos-total');
    }
}
