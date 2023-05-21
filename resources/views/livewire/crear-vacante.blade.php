{{-- md:w-1/2: centra el formulario en la pantalla no toma todo el ancho --}}
{{-- space-y-5: separa cada div dentro del formulario --}}
<form class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            name="titulo" 
            :value="old('titulo')"  
            placeholder="Título Vacante"
        />        
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select 
            id="salario"
            name="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
        >    
            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id}}">{{ $salario->salario }}</option>
            @endforeach    
        </select>        
    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select 
            id="categoria"
            name="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
        >  
        <option>-- Seleccione --</option>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id}}">{{ $categoria->categoria }}</option>
        @endforeach       
        </select>      
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            name="empresa" 
            :value="old('empresa')"  
            placeholder="Nombre de la empresa"
        />        
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último dia para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            name="ultimo_dia" 
            :value="old('ultimo_dia')"              
        />     
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
        <textarea 
            name="descripcion" 
            placeholder="Descripción general del puesto, experiencia"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72" 
        >
        </textarea>  
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            name="imagen"             
        />        
    </div>

    <div>
        <x-primary-button>
            Crear Vacante
        </x-primary-button>
    </div>

</form>