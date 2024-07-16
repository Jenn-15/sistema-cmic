<!--ESTO NO SIRVE -->

<!-- <div id="content-section">
    <livewire:filtrar-mantenimientos />

    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-extrabold text-2xl text-gray-700 mb-12">MANTENIMIENTOS REALIZADOS</h2>

            <div class="bg-gray-100 shadow-sm rounded-lg p-6 divide-y divide-g">
                <table
                    class="min-w-full bg-white border-gray-200 divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-300 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> No.Inventario</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> Marca</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> Modelo</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> Serie</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> CATEGORIA</th>
                            <th scope="col" class="px-6 text-center py-3 text-xs font-bold text-black uppercase tracking-wider"> EXPORTAR</th>
                         </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($equipos as $equipo)
                            <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border:gray-700">
                                <td class="px-6 py-4">{{ $equipo->numero_inventario }}</td>
                                <td class="px-6 py-4">{{ $equipo->marca->marca }}</td>
                                <td class="px-6 py-4">{{ $equipo->modelo }}</td>
                                <td class="px-6 py-4">{{ $equipo->serie }}</td>
                                <td class="px-6 py-4">{{ $equipo->categoria->categoria }} </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col sm:flex-row justify-center items-center gap-2">

                                        <form wire:submit.prevent="generatePDF">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                                                  </svg>
                                                PDF
                                            </button>
                                        </form>
                                        <form wire:submit.prevent="generateExcel">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M2 2v16h16V2H2zm5.5 14H4V4h3.5v3H7V7h1.5v1H7v1h1.5v1H7v1h1.5v1H7v1h1.5v1zm3.5 0H8V4h2.5a2.5 2.5 0 0 1 2.5 2.5c0 .9-.45 1.7-1.12 2.2l.12.3c.22.6.33 1.2.33 1.7 0 .5-.1 1.1-.3 1.7l-.12.3c.67.5 1.12 1.3 1.12 2.2a2.5 2.5 0 0 1-2.5 2.5zM8 13h2.5c.3 0 .5-.2.5-.5s-.2-.5-.5-.5H8v1zm5.5-8H12V4h1.5v3h-1.5V7H12v1h1.5v1h-1.5v1H12v1h1.5v1h-1.5a2.5 2.5 0 0 1-2.5-2.5c0-.9.45-1.7 1.12-2.2l-.12-.3c-.22-.6-.33-1.2-.33-1.7 0-.5.1-1.1.3-1.7l.12-.3C9.45 4.5 9 3.7 9 2.8A2.5 2.5 0 0 1 11.5.5z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                EXCEL
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="padding: 12px; text-align: center; font-weight: 300;">
                                    NO EXISTEN COINCIDENCIAS.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $mantenimientos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Script para el desplazamiento suave -->
<script>
    document.getElementById('scroll-button').addEventListener('click', function() {
        document.getElementById('content-section').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
-->