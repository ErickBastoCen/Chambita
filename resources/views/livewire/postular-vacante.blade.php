<div class="bg-white-600 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-2xl text-center my-4 font-bold">Postulate a la chambita</h3>

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 p-2 my-5">
            {{ session('mensaje') }}
        </div>

    @else 
        <form wire:submit.prevent='postularme' clas="w-96 mt-5">
            <div class="mb-4">
                <x-label for = "cv" :value="__('Hoja de presentación o CV (PDF)')" />
                <x-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message">
            @enderror

            <x-button class="my-5">
                {{__('Quiero la chambita')}}
            </x-button>
        </form>
    @endif
</div>
