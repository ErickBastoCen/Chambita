<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            {{-- validar con livewire cambiar name por wire:model --}}
            {{-- name="titulo"  --}}
            wire:model="titulo" 
            :value="old('titulo')"  
            placeholder="Título Vacante"
        />   
        {{-- el nombre definido con wire:model="titulo" --}}
        @error('titulo')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror     
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            id="salario"
            wire:model="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
        >    
            <option></option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id}}">{{ $salario->salario }}</option>
            @endforeach    
        </select>    

        @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            id="categoria"
            wire:model="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
        >  
        <option></option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id}}">{{ $categoria->categoria }}</option>
        @endforeach       
        </select>      

        @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')"  
            placeholder="Nombre de la empresa"
        />        

        @error('empresa')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último dia para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')"              
        />     

        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
        <textarea 
            wire:model="descripcion" 
            placeholder="Descripción general del puesto, experiencia"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72" 
        >
        </textarea>  

        @error('descripcion')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="nueva_imagen"  
            accept="image/*"          
        />        
        <div class="my-6 w-100">
            <x-label :value="__('Imagen Actual')" />
            <img src="{{ asset('storage/vacantes/' . $imagen.'png' )}}" alt="{{'Imagen vacante '. $titulo}}">
        </div>

        @error('nueva_imagen')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror   

        <div class="my-5 w-100">
            @if ($nueva_imagen)
                Imagen: 
                <img src="{{ $nueva_imagen->temporaryUrl() }}" alt="">    
            @endif
        </div>
    </div>

    <div>
        <x-primary-button class="bg-red-500">
            Actualizar datos
        </x-primary-button>
    </div>

</form>