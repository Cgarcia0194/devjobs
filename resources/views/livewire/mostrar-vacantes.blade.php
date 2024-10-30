<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    @forelse ($vacantes as $vacante)
        <div class="p-6 border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="space-y-3">
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-md text-gray-600 font-bold">
                    {{ $vacante->empresa }}
                </p>
                <p class="text-sm text-gray-500">
                    Ultimo día: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                </p>
            </div>

            <div class="flex flex-col items-stretch text-center gap-3 mt-2 md:mt-0">
                <a href="{{ route('candidatos.index', $vacante) }}"
                    class="bg-slate-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    {{ $vacante->candidatos->count() }}

                    @choice('Candidato|Candidatos', $vacante->candidatos->count())
                </a>

                <a href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Editar
                </a>

                <button wire:click="$dispatch('mostrarAlerta', { vacante: {{ $vacante }} })"
                    class="bg-red-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                    Eliminar
                </button>
            </div>
        </div>
    @empty
        <div class="p-6 border-b text-center border-gray-200">
            <p class="font-bold text-lg">No hay vacantes registradas</p>
        </div>
    @endforelse
    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacante => {
            Swal.fire({
                title: 'Eliminar vacante',
                text: `¿Deseas eliminar la vacante ${vacante.vacante.titulo}?`,
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
            }).then(result => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarVacante', vacante);

                    Swal.fire(
                        'Éxito!',
                        'La vacante fue eliminada correctamente.',
                        'success'
                    )
                }
            });
        });
    </script>
@endpush
