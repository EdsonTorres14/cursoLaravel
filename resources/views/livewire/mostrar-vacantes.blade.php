<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white boder-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold"> {{ $vacante->empresa }} </p>
                    <p class="text-sm text-gray-500"> Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }} </p>
                </div>
                <div class="flex flex-col md:flex-row items-strech gap-3 mt-5 md:mt-0">
                    <a href="#"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-xs text-white font-bold uppercase text-center">
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-xs text-white font-bold uppercase text-center">
                        Editar
                    </a>
                    <button 
                        wire:click="$emit('prueba', {{ $vacante->id}})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-xs text-white font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes para mostrar</p>
        @endforelse
    </div>

    <div class="mt-10"">
        {{ $vacantes->links() }}
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('prueba', vacanteId => {
                alert(vacanteId);
            })
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "Una vacante eliminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, ¡Eliminar!",
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        </script>
    @endpush
</div>
