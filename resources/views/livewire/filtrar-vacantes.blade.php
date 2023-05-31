<div class="bg-red-600 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-900 text-center font-extrabold my-5">Si no viste lo que buscas entonces preguntame</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-900 uppercase font-bold " for="termino">
                        Sobre que buscas una chambita
                    </label>
                    <input wire:model="termino" id="termino" type="text" placeholder="Buscar por Término: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" />
                    <br>
                    <br>
                    <label class="block mb-1 text-sm text-gray-900 uppercase font-bold">Salario Mensual</label>
                    <select wire:model="salario" class="border-gray-300 p-2 w-full">
                        <option>-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="justify-end">
                <input type="submit"
                    class="inline-block rounded bg-yellow-900 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                    value="Buscar" />
            </div>
            <p>Luego de preguntar ve si tenemos la respuesta que esperabas</p>
        </form>
    </div>
</div>