<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-600 mb-12 sm:text-center">
                Nuestras vacantes disponibles
            </h3>

            <div class="bg-white shadow-sm rounded-xl p-6 divide-y divide-gray-200">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center p-3 border border-gray-200">
                        <div class="md:flex-1 my-5 md:my-0">
                            <p class="text-2xl font-extrabold text-gray-600">
                                {{ $vacante->titulo }}
                            </p>
                            <p class="text-base text-gray-600 my-2">
                                {{ $vacante->empresa }}
                            </p>
                            <p class="text-gray-600 my-2 text-xs">
                                {{ $vacante->categoria->categoria }}
                            </p>
                            <p class="text-gray-600 my-2 text-xs">
                                {{ $vacante->salario->salario }}
                            </p>

                            <p class="font-bold text-xs text-gray-600">
                                Último día para postularse:
                                <span class="font-normal">
                                    {{ $vacante->ultimo_dia->format('d-m-Y') }}
                                </span>
                            </p>
                        </div>

                        <div class="">
                            <a class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-xl block text-center"
                                href="{{ route('vacantes.show', $vacante->id) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="">
                        No hay vacantes diposnibles
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
