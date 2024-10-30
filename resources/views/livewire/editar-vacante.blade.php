<form class="md:w1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <!-- Title -->
    <div>

        <x-input-label for="titulo" :value="__('Título')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Título vacante" />

        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Salary -->
    <div>

        <x-input-label for="salario" :value="__('Salario')" />
        <select id="salario" wire:model="salario"
            class="w-full border-gray-300 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm">
            <option value="">Selecciona un salario</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">
                    {{ $salario->salario }}
                </option>
            @endforeach
        </select>

        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Category -->
    <div>

        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" wire:model="categoria"
            class="w-full border-gray-300 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm">
            <option value="">Selecciona una categoria</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->categoria }}
                </option>
            @endforeach
        </select>

        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Enterprise -->
    <div>

        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Uber" />

        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Last day -->
    <div>

        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />

        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Description -->
    <div>

        <x-input-label for="descripcion" :value="__('Descripción de la vacante')" />
        <textarea id="descripcion"
            class="block mt-1 w-full border-gray-300 focus:border-blue-700 focus:ring-blue-700 rounded-md shadow-sm h-72"
            wire:model="descripcion"></textarea>

        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <!-- Image -->
    <div>

        <x-input-label for="imagen_nueva" :value="__('Imagen')" />
        <x-text-input id="imagen_nueva" class="block mt-1 w-full" type="file" wire:model="imagen_nueva" accept="image/*" />


        <div class="my-3">
            <x-input-label :value="__('Imagen actual')" />

            <img src="{{ asset('storage/vacantes/'. $imagen) }}" alt="Imagen vacante"
                    class="w-80 border rounded-xl border-gray-300" />
        </div>

        <div class="my-3">
            @if ($imagen_nueva)
                <img src="{{ $imagen_nueva->temporaryUrl() }}" alt=""
                    class="w-80 border rounded-xl border-gray-300" />
            @endif
        </div>

        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror

    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('guardar cambios') }}
    </x-primary-button>
</form>
