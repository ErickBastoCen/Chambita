<div class="bg-red-600 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-2xl text-center my-4 font-bold">Postulate a la chambita</h3>

    <form clas="w-96 mt-5">
        <div class="mb-4">
            <x-label for = "cv" :value="__('Hoja de presentación o CV (PDF)')" />
            <x-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>
        </div>

        <x-button class="my-5">
            {{__('Quiero la chambita')}}
        </x-button>
    </form>
</div>
