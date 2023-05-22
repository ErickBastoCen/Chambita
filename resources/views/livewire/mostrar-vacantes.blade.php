
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if(count($vacantes)>0)
        @foreach($vacantes as $vacante)

            <div class ="p-6 bg-red-200 border-double rounded-lg">
                <div class="text-center">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacante -> titulo }}
                    </a>
                    @php
                        $ultimoDia = \Carbon\Carbon::parse($vacante->ultimo_dia);
                    @endphp
                    <p>Postulaciones antes del: {{ $ultimoDia->format('d/m/Y') }}</p>
                    <p> {{ $vacante -> empresa }}</p>
                </div>
                <br>
                <div class="flex flex-col gap-3 items-stretch ">
                    <a href="#" class="bg-yellow-400 py-2 px-4 rounded-lg text-black text-xs font-bold text-center">
                        Candidatos
                    </a>

                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Editar
                    </a>

                    <a href="#" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                        Eliminar
                    </a>
                </div>
            </div>
            <br>

        @endforeach

    @else
        <p class="text-center text-xl text-black font-bold">Calma, si aun no has registrado nada</p>

    @endif
</div>

<div class="flex justify-center mt-10">
    {{ $vacantes->links() }}
</div>