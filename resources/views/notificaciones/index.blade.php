<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-3xl font-bold text-center my-10">Mis notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div>

                                <p class="">
                                    Tienes un nuevo candidato en la vacante:
                                    <span class="font-bold">
                                        {{ $notificacion->data['nombreVacante'] }}
                                    </span>
                                </p>
                                <p class="">
                                    <span class="font-bold text-gray-400">
                                        {{ $notificacion->created_at->diffForHumans() }}
                                    </span>
                                </p>
                            </div>

                            <div class="mt-5">
                                <a href="{{ route('candidatos.index', $notificacion->data['idVacante']) }}"
                                    class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-xl">
                                    Ver candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-600">
                            No tienes notificaciones nuevas
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
