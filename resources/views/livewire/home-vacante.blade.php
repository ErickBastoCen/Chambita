<div>
    <div class="py-12 bg-yellow-300">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12">
                Pasele, pasele, llevele lo que buscaba
            </h3>
            <div class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center p-5">
                        <div class="md:flex-1">
                            <a class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50"
                                href="{{ route('vacantes.show', $vacante->id) }}">{{ $vacante->titulo }}</a>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">{{ $vacante->empresa }}</p>
                            @php
                                $ultimoDia = \Carbon\Carbon::parse($vacante->ultimo_dia);
                            @endphp
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">Postulaciones antes del: {{ $ultimoDia->format('d/m/Y') }}</p>
                            <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">{{ $vacante->salario->salario }}</p></div>
                        <div class="mt-5 md:mt-0">
                            <a class="inline-block rounded bg-red-700 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                href="{{ route('vacantes.show', $vacante->id) }}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún </p>
                @endforelse
            </div>
        </div>
    </div>
    <livewire:filtrar-vacantes />
</div>