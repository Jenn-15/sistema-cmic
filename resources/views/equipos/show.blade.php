<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            EQUIPO
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <livewire:mostrar-equipo :equipo="$equipo">
                    <!-- Agregar los botones para descargar los PDFs -->
                    <!--<div class="text-center justify-center">
                        <a href="{{ route('equipos.pdf', $equipo->id) }}" type="button"
                            class="px-3 py-2 text-xs font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            IMPRIMIR RESGUARDO
                        </a>
                    </div> -->
            </div>
        </div>
    </div>
</x-app-layout>
