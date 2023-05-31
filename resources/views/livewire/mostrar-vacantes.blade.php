<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if(count($vacantes)>0)
            @foreach($vacantes as $vacante)

                <div class ="p-6 bg-red-200 border-double rounded-lg">
                    <div class="text-center">
                        <a href="{{route ('vacantes.show', $vacante->id )}}" class="text-xl font-bold">
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
                        <a href="{{ route('candidatos.index', $vacante) }}">
                            {{ $vacante->candidatos->count() }}
                        </a>

                        <a href="{{route('vacantes.edit', $vacante->id)}}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                            Editar
                        </a>

                        <!-- para pasar la id del vacante  -->
                        <button
                            wire:click="$emit('alertaEliminar', {{ $vacante->id}})"
                            class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center">
                            Eliminar
                        </button>
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
</div>

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Livewire.on('alertaEliminar', vacanteId=>{
            Swal.fire({
                title: '¿Estas seguro de eliminar?',
                text: "Luego no lo podrás recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminar',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {

                    //elimanamos
                    Livewire.emit('eliminarVacante', vacanteId);
                    Swal.fire(
                    'Hasta luego trabajito',
                    'Ya lo borre mi pana',
                    'success'
                    )
                }
            })
        })
    </script>
@endpush
