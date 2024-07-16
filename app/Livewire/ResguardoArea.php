<?php

namespace App\Livewire;

use App\Models\Area;
use App\Models\Equipo;
use Livewire\Component;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ResguardoArea extends Component
{
    public $selectedArea;
    public $selectedEmpleado;
    public $areas;
    public $empleados;
    public $equipos;

    public function mount()
    {
        $this->areas = Area::all();
        $this->empleados = Empleado::all();
        $this->equipos = collect();
    }

    public function submit()
    {
        $query = Equipo::query();

        if ($this->selectedArea) {
            $query->where('area_id', $this->selectedArea);
        }

        if ($this->selectedEmpleado) {
            $query->where('empleado_id', $this->selectedEmpleado);
        }

        $this->equipos = $query->get();
    }

    public function generatePDF()
    {
        $equipos = $this->equipos;
        $responsable = $this->selectedEmpleado ? Empleado::find($this->selectedEmpleado) : null;

        $pdf = PDF::loadView('pdf.areas', [ 
            'equipos' => $equipos,
            'responsable' => $responsable,
        ])->setPaper('a4', 'landscape'); // Aquí especificamos la orientación horizontal

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'equipos_seleccionados.pdf');
    }

    public function generateAreaPDF()
    {
        if ($this->selectedArea) {
            $area = Area::find($this->selectedArea);
            $equipos = Equipo::where('area_id', $this->selectedArea)->get();

            $pdf = PDF::loadView('pdf.equipos_area', [
                'area' => $area,
                'equipos' => $equipos,
            ])->setPaper('a4', 'landscape'); // Aquí especificamos la orientación horizontal

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, 'equipos_por_area.pdf');
        }
    }

    public function render()
    {
        return view('livewire.resguardo-area');
    }
}
