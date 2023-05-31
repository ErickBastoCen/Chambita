<div>
    <div class="mt-5 bg-gray-400 p-4 rounded-lg">
        <p class="font-bold text-sm uppercase text-blue-800 my-3">Empresa:
            <span class="text-gray-800">
                {{$vacante->empresa}}
            </span>
        </p>

        <p class="font-bold text-sm uppercase text-blue-800 my-3">Postulaciones antes del:
            @php
                $ultimoDia = \Carbon\Carbon::parse($vacante->ultimo_dia);
            @endphp
        <span class="text-gray-800">{{ $ultimoDia->format('d/m/Y') }}</span>
        </p>

        <div>
            <p class="font-bold text-sm uppercase text-blue-800 my-3">Categoria:
                <span class="text-gray-800">
                    {{$vacante->categoria->categoria}}
                </span>
            </p>

            <p class="font-bold text-sm uppercase text-blue-800 my-3">Salario:
                <span class="text-gray-800">
                    {{$vacante->salario->salario}}
                </span>
            </p>
        </div>

        <div>
            <div>

            </div>
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ 'Imagen Vacante ' . $vacante->titulo }}" />
            <div>

                <h2 class="text-2x1 font-bold">Descripción de la chambita</h2>
                <p>
                    {{$vacante->descripcion}}
                </p>
            </div>

        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-100 border border-dashed p-5 text-center">
            <p>
                ¿Quieres esta chambita? <a class=" font-bold text-red-600" href="{{ route('register')}}"> Yes, esto puede ser un ticket</a></p>
            </p>
        </div>
    @endguest
    
    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot
    @endauth
        


</div>
